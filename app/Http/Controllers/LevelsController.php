<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Levels;
use DB;

class LevelsController extends Controller
{
     public function createLevels()
    {
        $levels = DB::table('Levels')->get();
        return view('Admin.Levels', compact('levels'));
    }


    /**
     * Handle Level  (Create)
     */
    public function levelUpload(Request $request)
    {
        $validated = $request->validate([
            'level_name' => ['required', 'string', 'max:255'],
            'level_description' => ['nullable', 'string', 'max:555'],
           
        ]);

        try {

            

            // Save to database
            Levels::create([
                'level_name' => $validated['level_name'],
                'level_description' => $validated['level_description'] ?? null,
                
            ]);
$notification = array(
                    'message' => 'Level Created and saved successfully!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
           
        } catch (\Exception $e) {
            

            $notification = array(
                    'message' => 'Failed to create Level',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
        }
    }

    /**
     * Show Edit Level Form
     */
    public function editLevel($id)
    {
        $level = Levels::findOrFail($id);
        return view('Admin.edit-level', compact('level'));
    }

    /**
     * Update Level
     */
    public function updateLevel(Request $request, $id)
    {
        $validated = $request->validate([
            'level_name' => ['required', 'string', 'max:255'],
            'level_description' => ['nullable', 'string', 'max:555'],
            
        ]);

        try {
            $level = Levels::findOrFail($id);

            // If new image is uploaded
           
            // Update text fields
            $level->level_name = $validated['level_name'];
            $level->level_description = $validated['level_description'] ?? null;
          

            $level->save();
             $notification = array(
                    'message' => 'Level Updated successfully!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);


           

        } catch (\Exception $e) {
            
            $notification = array(
                    'message' => 'Failed to updated Level',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
        }
    }

    /**
     * Delete Level
     */
    public function deleteLevel($id)
    {
        try {
            $level = Levels::findOrFail($id);

            
            $level->delete();
             $notification = array(
                    'message' => 'Level deleted successfully!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);

            

        } catch (\Exception $e) {
            return back()->with('error', 'Failed to delete level: ' . $e->getMessage());
        }
    }
}

