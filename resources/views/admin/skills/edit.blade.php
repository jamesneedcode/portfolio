@extends('layouts.admin')

@section('title', 'Edit Skill')
@section('page_title', 'Edit: ' . $skill->name)

@section('header_actions')
<a href="{{ route('admin.skills.index') }}" class="btn btn-outline">← Back</a>
@endsection

@section('content')
<div class="form-card">
    <form action="{{ route('admin.skills.update', $skill) }}" method="POST">
        @csrf
        @method('PUT')
        @include('admin.skills._form', ['skill' => $skill])
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Update Skill</button>
            <a href="{{ route('admin.skills.index') }}" class="btn btn-outline">Cancel</a>
        </div>
    </form>
</div>
@endsection
