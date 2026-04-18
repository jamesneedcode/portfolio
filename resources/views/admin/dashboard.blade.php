@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')
<div class="dashboard-grid">
    <div class="stat-card">
        <div class="stat-card-icon">🚀</div>
        <div class="stat-card-info">
            <span class="stat-card-num">{{ $projectCount }}</span>
            <span class="stat-card-label">Total Projects</span>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-card-icon">⚙️</div>
        <div class="stat-card-info">
            <span class="stat-card-num">{{ $skillCount }}</span>
            <span class="stat-card-label">Skills Listed</span>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-card-icon">✨</div>
        <div class="stat-card-info">
            <span class="stat-card-num">{{ $featured }}</span>
            <span class="stat-card-label">Featured Projects</span>
        </div>
    </div>
</div>

<div class="dashboard-actions">
    <h3>Quick Actions</h3>
    <div class="action-cards">
        <a href="{{ route('admin.projects.create') }}" class="action-card">
            <span class="action-icon">➕</span>
            <span>Add New Project</span>
        </a>
        <a href="{{ route('admin.projects.index') }}" class="action-card">
            <span class="action-icon">📋</span>
            <span>Manage Projects</span>
        </a>
        <a href="{{ route('admin.skills.index') }}" class="action-card">
            <span class="action-icon">🛠️</span>
            <span>Manage Skills</span>
        </a>
        <a href="{{ route('home') }}" target="_blank" class="action-card">
            <span class="action-icon">🌐</span>
            <span>View Portfolio</span>
        </a>
    </div>
</div>
@endsection
