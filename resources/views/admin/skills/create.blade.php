@extends('layouts.admin')

@section('title', 'Add Skill')
@section('page_title', 'Add New Skill')

@section('header_actions')
<a href="{{ route('admin.skills.index') }}" class="btn btn-outline">← Back</a>
@endsection

@section('content')
<div class="form-card">
    <form action="{{ route('admin.skills.store') }}" method="POST">
        @csrf
        @include('admin.skills._form', ['skill' => null])
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Add Skill</button>
            <a href="{{ route('admin.skills.index') }}" class="btn btn-outline">Cancel</a>
        </div>
    </form>
</div>
@endsection
