@extends('layouts.admin')

@section('title', 'Add Project')
@section('page_title', 'Add New Project')

@section('header_actions')
<a href="{{ route('admin.projects.index') }}" class="btn btn-outline">← Back</a>
@endsection

@section('content')
<div class="form-card">
    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.projects._form', ['project' => null])
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Create Project</button>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-outline">Cancel</a>
        </div>
    </form>
</div>
@endsection
