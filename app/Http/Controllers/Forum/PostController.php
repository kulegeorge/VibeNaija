<?php
namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use App\Models\ForumPost;
use App\Models\ForumThread;
use App\Http\Requests\StorePostRequest;
use App\Notifications\ThreadReplied;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct() { $this->middleware('auth'); }

    public function store(StorePostRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $post = ForumPost::create($data);

        // award points
        auth()->user()->increment('points', 3);

        // notify thread owner (notifying via database + mail)
        $thread = ForumThread::find($post->thread_id);
        if ($thread && $thread->user_id !== auth()->id()) {
            $thread->user->notify(new ThreadReplied($post));
        }

        return redirect()->route('forum.threads.show', $post->thread_id)->with('success','Reply posted! +3 points');
    }

    public function update(StorePostRequest $request, ForumPost $post)
    {
        $this->authorize('update', $post);
        $post->update(array_merge($request->validated(), ['is_edited' => true]));
        return redirect()->route('forum.threads.show', $post->thread_id)->with('success','Reply updated.');
    }

    public function destroy(ForumPost $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return redirect()->route('forum.threads.show', $post->thread_id)->with('success','Reply deleted.');
    }

    public function like(Request $request, ForumPost $post)
    {
        $user = $request->user();
        $exists = $post->likes()->where('user_id',$user->id)->exists();

        if ($exists) {
            $post->likes()->where('user_id',$user->id)->delete();
            return back()->with('success','Like removed.');
        } else {
            $post->likes()->create(['user_id'=>$user->id]);
            return back()->with('success','Liked.');
        }
    }
}
