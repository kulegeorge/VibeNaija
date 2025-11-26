<?php
namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use App\Models\ForumThread;
use App\Models\ForumCategory;
use App\Http\Requests\StoreThreadRequest;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }

    public function index(Request $request)
    {
        $q = $request->query('q');
        $category = $request->query('category');
        $threads = ForumThread::with(['user','category','latestPost'])
            ->when($category, fn($qB) => $qB->whereHas('category', fn($q2)=> $q2->where('slug',$category)))
            ->when($q, fn($qB) => $qB->where('title','like','%'.$q.'%')->orWhere('body','like','%'.$q.'%'))
            ->orderByDesc('is_pinned')->orderByDesc('updated_at')
            ->paginate(12);

        $categories = ForumCategory::orderBy('position')->get();
        return view('forum.threads.index', compact('threads','categories'));
    }

    public function create()
    {
        $categories = ForumCategory::orderBy('position')->get();
        return view('forum.threads.create', compact('categories'));
    }

    public function store(StoreThreadRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $thread = ForumThread::create($data);

        // award points
        auth()->user()->increment('points', 10);

        return redirect()->route('forum.threads.show', $thread->id)->with('success','Thread created — +10 points');
    }

    public function show(ForumThread $thread)
    {
        // avoid incrementing views on same user repeatedly in short time — simple approach
        $thread->increment('views');
        $thread->load(['posts.user','user','category']);
        return view('forum.threads.show', compact('thread'));
    }

    public function edit(ForumThread $thread)
    {
        $this->authorize('update', $thread);
        $categories = ForumCategory::orderBy('position')->get();
        return view('forum.threads.edit', compact('thread','categories'));
    }

    public function update(StoreThreadRequest $request, ForumThread $thread)
    {
        $this->authorize('update', $thread);
        $thread->update($request->validated());
        return redirect()->route('forum.threads.show', $thread)->with('success','Thread updated.');
    }

    public function destroy(ForumThread $thread)
    {
        $this->authorize('delete', $thread);
        $thread->delete();
        return redirect()->route('forum.threads.index')->with('success','Thread deleted.');
    }
}
