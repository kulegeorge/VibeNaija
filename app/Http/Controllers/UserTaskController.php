<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\Tasks;
use App\Models\JoinTask;
use App\Models\Topic;
use App\Models\Result;
use App\Models\UserTaskSubmission;

class UserTaskController extends Controller
{
    /*----------------------------------------------------------
        LIST ALL TASKS
    ----------------------------------------------------------*/
    public function Tasklisting()
    {
        $tasks = Tasks::all();
        $user_id = Auth::id();
        $enrolled = DB::table('join_tasks')
                ->where('userID', $user_id)
                ->pluck('taskID');   // VERY IMPORTANT
  // VERY IMPORTANT

        return view('frontend.all-task', compact('tasks','enrolled'));
    }

    /*----------------------------------------------------------
        SHOW TASK PREVIEW
    ----------------------------------------------------------*/
    public function showTask($encryptedId)
{
    $id = decrypt($encryptedId);
    $task = Tasks::findOrFail($id);

    $topic = Topic::find($task->topic_id); // avoids crash if missing

    $userId = Auth::id();

    $joinedAlready = false;

    if ($userId) {
        $joinedAlready = JoinTask::where('userID', $userId)
            ->where('taskID', $id)
            ->exists();
    }
    

    return view('frontend.preview', compact('task', 'topic', 'joinedAlready'));
}


    /*----------------------------------------------------------
        SHOW SUBMISSION PAGE
    ----------------------------------------------------------*/
    public function showSubmitPage($taskID)
    {
        $user_id = Auth::id();
        $task = Tasks::findOrFail($taskID);
        $checkAlreadySubmitted = DB::table('user_task_submissions')
                                            ->where('user_id',$user_id )
                                            ->where('task_id', $taskID)
                                            ->first();
        if($checkAlreadySubmitted){
            return redirect()->route('editSubmission.task', ['id' => $checkAlreadySubmitted->id]);           

        }
        return view('frontend.submit-task', compact('task'));
    }

   /*----------------------------------------------------------
    SUBMIT TASK
----------------------------------------------------------*/
public function submitTask(Request $request, $task_id)
{
    try {

        $taskPoints = Tasks::findOrFail($task_id);

        $user_id = Auth::id();
        $checkAlreadySubmitted = DB::table('user_task_submissions')
            ->where('user_id', $user_id)
            ->where('task_id', $task_id)
            ->first();

        if ($checkAlreadySubmitted) {
            return redirect()->route('editSubmission.task', ['id' => $checkAlreadySubmitted->id]);
        }

        $messages = [
            'images.*.image' => 'Only image files are allowed.',
            'images.*.mimes' => 'Allowed image formats: jpg, jpeg, png, gif.',
            'images.*.max'   => 'Each image must not exceed 4MB.',

            'documents.*.mimes' => 'Allowed document formats: pdf, doc, docx, ppt, pptx, xls, xlsx, zip.',
            'documents.*.max'   => 'Each document must not exceed 10MB.',
        ];

        $request->validate([
            'user_text'   => 'nullable|string',
            'video_url'   => 'nullable|string|max:600',
            'images.*'    => 'nullable|image|mimes:jpg,jpeg,png,gif|max:4096',
            'documents.*' => 'nullable|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,zip|max:10000',
        ], $messages);

        // Manual checks
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                if ($img->getSize() > 4 * 1024 * 1024) {
                    return back()->with([
                        'submission_failed' => true,
                        'error_message' => 'One of your images exceeds 4MB – remove it and try again.'
                    ]);
                }
            }
        }

        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $doc) {
                if ($doc->getSize() > 10 * 1024 * 1024) {
                    return back()->with([
                        'submission_failed' => true,
                        'error_message' => 'One of your documents exceeds 10MB – remove it and try again.'
                    ]);
                }
            }
        }

        // Directories
        $imgDir = public_path('uploads/task_submissions/images');
        $docDir = public_path('uploads/task_submissions/documents');

        \File::ensureDirectoryExists($imgDir);
        \File::ensureDirectoryExists($docDir);

        $imagePaths = [];
        $documentPaths = [];

        // Save images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = uniqid() . '_' . time() . '.' . $image->getClientOriginalExtension();
                $image->move($imgDir, $filename);
                $imagePaths[] = "uploads/task_submissions/images/$filename";
            }
        }

        // Save documents
        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $doc) {
                $filename = uniqid() . '_' . time() . '.' . $doc->getClientOriginalExtension();
                $doc->move($docDir, $filename);
                $documentPaths[] = "uploads/task_submissions/documents/$filename";
            }
        }

        // Save to DB
        UserTaskSubmission::create([
            'user_id'   => $user_id,
            'points'    => $taskPoints->task_points,
            'task_id'   => $task_id,
            'user_text' => $request->user_text,
            'video_url' => $request->video_url,
            'images'    => json_encode($imagePaths),
            'documents' => json_encode($documentPaths),
        ]);

        return redirect()->route('user.my.submissions')->with([
            'submission_success' => true,
            'success_message' => 'Your submission has been uploaded successfully!'
        ]);

    }
    catch (\Illuminate\Validation\ValidationException $e) {
        // Let Laravel display specific validation messages
        return back()->withErrors($e->validator)->withInput();
    }
    catch (\Exception $e) {

        \Log::error('TASK SUBMISSION ERROR: ' . $e->getMessage());

        $errorMessage = 'Something went wrong while processing your submission.';

        if (str_contains($e->getMessage(), 'No such file or directory')) {
            $errorMessage = 'File upload failed. Please try smaller files or try again.';
        } elseif (str_contains($e->getMessage(), 'disk') || str_contains($e->getMessage(), 'storage')) {
            $errorMessage = 'Storage issue detected. Please try again later.';
        } elseif (str_contains($e->getMessage(), 'timeout')) {
            $errorMessage = 'The upload took too long. Please reduce file size and try again.';
        } elseif (str_contains($e->getMessage(), 'Permission denied')) {
            $errorMessage = 'Upload permission failed. Contact support.';
        } elseif (str_contains($e->getMessage(), 'Undefined')) {
            $errorMessage = 'A system error occurred. Contact support.';
        }

        return back()->withInput()->with([
            'submission_failed' => true,
            'error_message' => $errorMessage
        ]);
    }
}



    /*----------------------------------------------------------
        LIST USER SUBMISSIONS
    ----------------------------------------------------------*/
    public function mySubmissions()
    {
        $submissions = UserTaskSubmission::where('user_id', Auth::id())
                        ->with('task')
                        ->latest()
                        ->get();
        //$cbtCheck = Result::where('user_id', Auth::id())
        return view('frontend.my_submissions', compact('submissions'));
    }

    /*----------------------------------------------------------
        EDIT SUBMISSION PAGE
    ----------------------------------------------------------*/
    public function editSubmission($submission_id)
    {
        $userID = Auth::id();

        $submission = UserTaskSubmission::where('id', $submission_id)
                        ->where('user_id', $userID)
                        ->firstOrFail();

        $task = Tasks::findOrFail($submission->task_id);

        // Prevent editing if approved or rejected
        if (in_array($submission->status, ['approved', 'rejected'])) {
            return back()->with([
                'message' => 'You cannot edit this submission anymore.',
                'alert-type' => 'warning'
            ]);
        }

        return view('frontend.edit_submission', compact('submission', 'task'));
    }

   

   /*----------------------------------------------------------
    UPDATE SUBMISSION
----------------------------------------------------------*/
public function updateSubmission(Request $request, $submission_id)
{
    $userID = Auth::id();

    $submission = UserTaskSubmission::where('id', $submission_id)
                    ->where('user_id', $userID)
                    ->firstOrFail();

    // Prevent editing approved/rejected
    if (in_array($submission->status, ['approved', 'rejected'])) {
        return back()->with([
            'message' => 'You cannot edit this submission anymore.',
            'alert-type' => 'danger'
        ]);
    }

    // VALIDATION
    $request->validate([
        'user_text'  => 'nullable|string',
        'video_url'  => 'nullable|string',

        // Images: max 2MB each
        'images.*'   => 'nullable|image|max:2048',

        // Documents: max 5MB each
        'documents.*'=> 'nullable|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,zip|max:5120',
    ],
    [
        'images.*.max' => 'Each image must not be more than 2MB.',
        'documents.*.max' => 'Each document must not exceed 5MB.',
        'documents.*.mimes' => 'Only PDF, Word, PowerPoint, Excel or ZIP files are allowed.',
    ]);

    // Prepare new arrays
    $newImages = [];
    $newDocs = [];

    // -------------------------
    // PROCESS IMAGES IF UPLOADED
    // -------------------------
    if ($request->hasFile('images')) {

        // Delete old images
        if (is_array($submission->images)) {
            foreach ($submission->images as $oldImg) {
                if (file_exists(public_path($oldImg))) {
                    @unlink(public_path($oldImg));
                }
            }
        }

        foreach ($request->file('images') as $img) {
            $path = 'uploads/task_submissions/images/';
            $filename = uniqid() . '_' . time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path($path), $filename);
            $newImages[] = $path . $filename;
        }
    } else {
        // Keep existing images
        $newImages = $submission->images ?? [];
    }

    // -------------------------
    // PROCESS DOCUMENTS IF UPLOADED
    // -------------------------
    if ($request->hasFile('documents')) {

        // Delete old docs
        if (is_array($submission->documents)) {
            foreach ($submission->documents as $oldDoc) {
                if (file_exists(public_path($oldDoc))) {
                    @unlink(public_path($oldDoc));
                }
            }
        }

        foreach ($request->file('documents') as $doc) {
            $path = 'uploads/task_submissions/documents/';
            $filename = uniqid() . '_' . time() . '.' . $doc->getClientOriginalExtension();
            $doc->move(public_path($path), $filename);
            $newDocs[] = $path . $filename;
        }
    } else {
        // Keep existing documents
        $newDocs = $submission->documents ?? [];
    }

    // -------------------------
    // SAVE TO DATABASE
    // -------------------------
    $submission->update([
        'user_text'  => $request->user_text,
        'video_url'  => $request->video_url,
        'images'     => $newImages,   // Stored as array
        'documents'  => $newDocs,     // Stored as array
    ]);

   return redirect()
        ->back()
        ->with('message', 'Submission updated successfully!')
        ->with('alert-type', 'success');
}


}
