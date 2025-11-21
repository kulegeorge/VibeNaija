<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Badges;
use Illuminate\Support\Facades\Validator;
use App\Models\Tasks;
use DB;

class TasksController extends Controller
{
    public function createTasks(){
        $badge = DB::table('Badges')->get();
        $level = DB::table('Levels')->get();

        return view('Admin.Tasks', compact('badge','level'));
    }

    public function store(Request $request)
    {


        // -----------------------------
        // 1. VALIDATION
        // -----------------------------
        $validator = Validator::make($request->all(), [
            'taskname' => 'required|string|max:255',
            'task_description' => 'required|string|max:500',
            'category' => 'required|string|max:255',
            'url' => 'nullable|url|max:255',
            'task_points' => 'required|integer|min:0',

            'badge_name' => 'required|string',
            'badge_image' => 'array',

            'level_id' => 'required|string',
            'level_image' => 'array',

            'duration' => 'required|string',

            'submission_instruction' => 'nullable|string',

            'files.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
        ]);

        // Validation failed
        if ($validator->fails()) {

    $errors = implode('<br>', $validator->errors()->all());

    $notification = [
        'message' => $errors . '<br>Please correct the errors in the form.',
        'alert-type' => 'error'
    ];

    return redirect()->back()
        ->withInput()
        ->with($notification);
}

        // -----------------------------
        // 2. HANDLE MULTIPLE IMAGES
        // -----------------------------
        $uploadedImages = [];

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                if ($file) {
                    $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('uploads/tasks/'), $filename);
                    $uploadedImages[] = $filename;
                }
            }
        }

        // -----------------------------
        // 3. STORE TASK IN DATABASE
        // -----------------------------
        $task = new Tasks();
        $task->taskname = $request->taskname;
        $task->task_description = $request->task_description;
        $task->category = $request->category;
        $task->url = $request->url;
        $task->task_points = $request->task_points;

        $task->badge_name = $request->badge_name;
        $task->badge_icon = $request->badge_image[$request->badge_name] ?? null;

        $task->task_level = $request->level_id;
        $task->level_image = $request->level_image[$request->level_name] ?? null;

        $task->duration = $request->duration;
        $task->status = 1;
        $task->submission_instruction = $request->submission_instruction;

        // Save images as JSON
        $task->images = json_encode($uploadedImages);

        $task->save();

        // -----------------------------
        // 4. SUCCESS NOTIFICATION
        // -----------------------------

         $notification = array(
                    'message' => "Task '{$task->taskname}' was successfully created!",
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
        
    }

//Task Listing
   public function editTask($id){
    
 $task = Tasks::findOrFail($id);
  $badge = DB::table('badges')->get();
  $level = DB::table('levels')->get();
    return view('admin.edit-task', compact('task','badge','level'));

   }

public function showTask(){
    $tasks = Tasks::all();
   
 
    return view('admin.show-tasks', compact('tasks'));


}

//Task delete

   public function taskDestroy($id){
  $task = Tasks::findOrFail($id);

    // Delete task images from server
    $images = json_decode($task->images, true);
    if($images){
        foreach($images as $image){
            $image_path = public_path('uploads/tasks/' . $image);
            if(file_exists($image_path)){
                unlink($image_path);
            }
        }
    }

    $task->delete();

    return response()->json(['success' => 'Task deleted successfully']);

   }


    // Update task
public function updateTask(Request $request, $id)
{
    $task = Tasks::findOrFail($id);

    // Validate inputs
    $request->validate([
        'taskname' => 'required|string|max:255',
        'task_description' => 'nullable|string',
        'category' => 'required|string|max:255',
        'task_points' => 'required|numeric',
        'badge_name' => 'required|string',
        'task_level' => 'required|integer',
        'duration' => 'required|string',
        'url' => 'nullable|string|max:255',
        'submission_instruction' => 'nullable|string',
        'files.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048'
    ]);

    // Update basic fields
    $task->taskname = $request->taskname;
    $task->task_description = $request->task_description;
    $task->category = $request->category;
    $task->task_points = $request->task_points;
    $task->badge_name = $request->badge_name;
    $task->task_level = $request->task_level;
    $task->duration = $request->duration;
    $task->url = $request->url;
    $task->submission_instruction = $request->submission_instruction;

    // Handle multiple file upload
    if($request->hasFile('files')) {
        // Delete old images from storage
        if($task->images) {
            $oldImages = json_decode($task->images);
            foreach($oldImages as $oldImg) {
                $oldPath = public_path('uploads/tasks/'.$oldImg);
                if(file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }
        }

        $imageNames = [];
        foreach($request->file('files') as $file){
            $filename = time().'_'.uniqid().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/tasks'), $filename);
            $imageNames[] = $filename;
        }
        $task->images = json_encode($imageNames);
    }

    $saved = $task->save();
    if($saved){

        $notification = array(
                    'message' => "Task '{$task->taskname}' was successfully updated!",
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
    }else{
        $notification = array(
                    'message' => "Task '{$task->taskname}' update failed!",
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
    }

    
}

//Preview Task

public function previewTask($id){
    $userid = Auth::id();
     $task = Tasks::findOrFail($id);
     $joinedAlready = DB::table('JoinTask')->where('userID',$userid)->where('taskID',$id)->first();

    return view('admin.preview', compact('task','joinedAlready'));

}



}