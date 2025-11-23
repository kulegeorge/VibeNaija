<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
   public function index()
    {
        $topics = Topic::all();
        return view('admin.topics.index', compact('topics'));
    }

    public function create()
    {
        return view('admin.topics.create');
    }

     // List all topics
    public function allTopics()
    {
        $topics = Topic::latest()->get();
        return view('admin.topics.allTopics', compact('topics'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);

        Topic::create($request->only('name', 'description'));

        $notification = array(
                    'message' => 'Topic created! successfully',
                    'alert-type' => 'success'
                );
         
        return redirect()->route('topics.index')->with($notification);

       
    }


    // ▶ SHOW TOPIC DETAILS
    public function show($id)
    {
        $topic = Topic::findOrFail($id);
        return view('admin.topics.show', compact('topic'));
    }

    // ▶ EDIT TOPIC
    public function edit($id)
    {
        $topic = Topic::findOrFail($id);
        return view('admin.topics.edit', compact('topic'));
    }

    // ▶ UPDATE TOPIC
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $topic = Topic::findOrFail($id);
        $topic->name = $request->name;
        $topic->save();
        $notification = array(
                    'message' => 'Topic updated successfully',
                    'alert-type' => 'success'
                );
         
        return redirect()->route('topics.index')->with($notification);
    }

    // ▶ DELETE TOPIC
    public function destroy($id)
    {
        $topic = Topic::findOrFail($id);
        $topic->delete();

 $notification = array(
                    'message' => 'Topic deleted! successfully',
                    'alert-type' => 'success'
                );
         
        return redirect()->route('topics.index')->with($notification);
     
    }
}
