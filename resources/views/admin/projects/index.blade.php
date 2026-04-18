@extends('layouts.admin')

@section('title', 'Projects')
@section('page_title', 'Projects')

@section('header_actions')
<a href="{{ route('admin.projects.create') }}" class="btn btn-primary">+ Add Project</a>
@endsection

@section('content')
<div class="table-wrapper">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Order</th>
                <th>Title</th>
                <th>Category</th>
                <th>Technologies</th>
                <th>Featured</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($projects as $project)
            <tr>
                <td>{{ $project->order }}</td>
                <td>
                    <strong>{{ $project->title }}</strong>
                    <div class="table-sub">{{ Str::limit($project->description, 60) }}</div>
                </td>
                <td><span class="badge badge-category">{{ $project->category }}</span></td>
                <td>
                    @if($project->technologies)
                        <div class="tech-chips">
                            @foreach(array_slice($project->technologies, 0, 3) as $tech)
                            <span class="tech-chip">{{ $tech }}</span>
                            @endforeach
                            @if(count($project->technologies) > 3)
                            <span class="tech-chip">+{{ count($project->technologies) - 3 }}</span>
                            @endif
                        </div>
                    @endif
                </td>
                <td>
                    @if($project->featured)
                        <span class="badge badge-success">✨ Yes</span>
                    @else
                        <span class="badge badge-muted">No</span>
                    @endif
                </td>
                <td>
                    <div class="table-actions">
                        <a href="{{ route('admin.projects.edit', $project) }}" class="action-btn action-edit">Edit</a>
                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Delete this project?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-btn action-delete">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="table-empty">No projects yet. <a href="{{ route('admin.projects.create') }}">Add your first project →</a></td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
