<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Badges;
use DB;

class BadgesController extends Controller
{
    /**
     * Display all badges
     */
    public function createBadges()
    {
        $badges = DB::table('badges')->get();
        return view('Admin.badges', compact('badges'));
    }

    /**
     * Handle badge upload (Create)
     */
    public function badgeUpload(Request $request)
    {
        $validated = $request->validate([
            'badge_name' => ['required', 'string', 'max:255'],
            'badge_description' => ['nullable', 'string', 'max:555'],
            'points' => ['nullable', 'string', 'max:555'],
            'file' => ['required','file','mimes:jpg,jpeg,png,pdf','max:2048'],
        ]);

        try {

            // Ensure directory exists
            if (!File::exists(public_path('uploads'))) {
                File::makeDirectory(public_path('uploads'), 0777, true, true);
            }

            // Get file and unique name
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();

            // Move file into public/uploads
            $file->move(public_path('uploads'), $filename);

            // Public URL path
            $fileUrl = '/uploads/' . $filename;

            // Save to database
            Badges::create([
                'badge_name' => $validated['badge_name'],
                'badge_description' => $validated['badge_description'] ?? null,
                'points' => $validated['points'] ?? null,
                'badge_image' => $fileUrl,
            ]);
$notification = array(
                    'message' => 'Badge uploaded and saved successfully!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
           
        } catch (\Exception $e) {
            

            $notification = array(
                    'message' => 'Failed to upload badge',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
        }
    }

    /**
     * Show Edit Badge Form
     */
    public function editBadge($id)
    {
        $badge = Badges::findOrFail($id);
        return view('Admin.edit-badge', compact('badge'));
    }

    /**
     * Update Badge
     */
    public function updateBadge(Request $request, $id)
    {
        $validated = $request->validate([
            'badge_name' => ['required', 'string', 'max:255'],
            'badge_description' => ['nullable', 'string', 'max:555'],
            'points' => ['nullable', 'string', 'max:555'],
            'file' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],
        ]);

        try {
            $badge = Badges::findOrFail($id);

            // If new image is uploaded
            if ($request->hasFile('file')) {

                // Remove old image if exists
                if ($badge->badge_image && File::exists(public_path($badge->badge_image))) {
                    File::delete(public_path($badge->badge_image));
                }

                // Create upload directory if missing
                if (!File::exists(public_path('uploads'))) {
                    File::makeDirectory(public_path('uploads'), 0777, true, true);
                }

                $file = $request->file('file');
                $filename = time() . '_' . $file->getClientOriginalName();

                // Move new file into public/uploads
                $file->move(public_path('uploads'), $filename);

                // Save file URL
                $badge->badge_image = '/uploads/' . $filename;
            }

            // Update text fields
            $badge->badge_name = $validated['badge_name'];
            $badge->badge_description = $validated['badge_description'] ?? null;
            $badge->points = $validated['points'] ?? null;

            $badge->save();
             $notification = array(
                    'message' => 'Badge updated successfully!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);


           

        } catch (\Exception $e) {
            
            $notification = array(
                    'message' => 'Failed to update badge',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
        }
    }

    /**
     * Delete Badge
     */
    public function deleteBadge($id)
    {
        try {
            $badge = Badges::findOrFail($id);

            // Delete file from public/uploads
            if ($badge->badge_image && File::exists(public_path($badge->badge_image))) {
                File::delete(public_path($badge->badge_image));
            }

            $badge->delete();
             $notification = array(
                    'message' => 'Badge deleted successfully!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);

            

        } catch (\Exception $e) {
            return back()->with('error', 'Failed to delete badge: ' . $e->getMessage());
        }
    }
}
