<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\JsonResponse;

class ProjectController extends Controller
{
    public function index(): JsonResponse
    {
        $projects = Project::ordered()->get();
        return response()->json($projects);
    }

    public function show(Project $project): JsonResponse
    {
        return response()->json($project);
    }
}
