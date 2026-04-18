@extends('layouts.admin')

@section('title', 'Skills')
@section('page_title', 'Skills')

@section('header_actions')
<a href="{{ route('admin.skills.create') }}" class="btn btn-primary">+ Add Skill</a>
@endsection

@section('content')
<div class="table-wrapper">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Order</th>
                <th>Name</th>
                <th>Category</th>
                <th>Proficiency</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($skills as $skill)
            <tr>
                <td>{{ $skill->order }}</td>
                <td><strong>{{ $skill->name }}</strong></td>
                <td><span class="badge badge-category">{{ $skill->category }}</span></td>
                <td>
                    <div class="inline-bar">
                        <div class="inline-fill" style="width: {{ $skill->proficiency }}%"></div>
                        <span>{{ $skill->proficiency }}%</span>
                    </div>
                </td>
                <td>
                    <div class="table-actions">
                        <a href="{{ route('admin.skills.edit', $skill) }}" class="action-btn action-edit">Edit</a>
                        <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" onsubmit="return confirm('Delete this skill?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-btn action-delete">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="table-empty">No skills yet. <a href="{{ route('admin.skills.create') }}">Add your first skill →</a></td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
