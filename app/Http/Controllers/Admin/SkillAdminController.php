<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillAdminController extends Controller
{
    public function index()
    {
        $skills = Skill::ordered()->get();
        return view('admin.skills.index', compact('skills'));
    }

    public function create()
    {
        return view('admin.skills.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:100',
            'icon'        => 'nullable|string|max:50',
            'category'    => 'required|string',
            'proficiency' => 'required|integer|min:0|max:100',
            'order'       => 'nullable|integer',
        ]);

        Skill::create($data);

        return redirect()->route('admin.skills.index')->with('success', 'Skill added!');
    }

    public function show(Skill $skill)
    {
        return redirect()->route('admin.skills.edit', $skill);
    }

    public function edit(Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:100',
            'icon'        => 'nullable|string|max:50',
            'category'    => 'required|string',
            'proficiency' => 'required|integer|min:0|max:100',
            'order'       => 'nullable|integer',
        ]);

        $skill->update($data);

        return redirect()->route('admin.skills.index')->with('success', 'Skill updated!');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('admin.skills.index')->with('success', 'Skill deleted.');
    }
}
