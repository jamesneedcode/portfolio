@extends('layouts.admin')

@section('title', 'Edit Project')
@section('page_title', 'Edit: ' . $project->title)

@section('header_actions')
<a href="{{ route('admin.projects.index') }}" class="btn btn-outline">← Back</a>
@endsection

@section('content')
<div class="form-card">
    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.projects._form', ['project' => $project])
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Update Project</button>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-outline">Cancel</a>
        </div>
    </form>
</div>
@endsection
