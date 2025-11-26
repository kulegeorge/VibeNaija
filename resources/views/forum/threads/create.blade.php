@extends('admin.admin_dashboard')
@section('admin')
<div class="container" style="padding-top:80px;">
    <h2>Create Thread</h2>
    <form method="POST" action="{{ route('forum.threads.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input name="title" value="{{ old('title') }}" class="form-control" required>
            @error('title') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="category_id" class="form-select" required>
                @foreach($categories as $c)
                    <option value="{{ $c->id }}" @selected(old('category_id') == $c->id)>{{ $c->name }}</option>
                @endforeach
            </select>
            @error('category_id') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Body</label>
            <textarea name="body" rows="7" class="form-control" required>{{ old('body') }}</textarea>
            @error('body') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <button class="btn btn-success">Publish</button>
        <a href="{{ route('forum.threads.index') }}" class="btn btn-outline-secondary">Cancel</a>
    </form>
</div>
@endsection
