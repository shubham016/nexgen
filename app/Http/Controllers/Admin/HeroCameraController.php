<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroCamera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroCameraController extends Controller
{
    public function index()
    {
        $cameras = HeroCamera::ordered()->get();
        return view('admin.hero_cameras.index', compact('cameras'));
    }

    public function create()
    {
        return view('admin.hero_cameras.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'label'      => 'required|string|max:100',
            'video'      => 'nullable|file|mimetypes:video/mp4,video/webm,video/ogg|max:51200',
            'sort_order' => 'nullable|integer|min:0',
            'is_active'  => 'nullable|boolean',
        ]);

        $data = [
            'label'      => $validated['label'],
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active'  => $request->boolean('is_active', true),
        ];

        if ($request->hasFile('video')) {
            $data['video_path'] = $request->file('video')->store('cameras', 'public');
        }

        HeroCamera::create($data);

        return redirect()->route('admin.hero-cameras.index')->with('success', 'Camera feed added successfully.');
    }

    public function edit(HeroCamera $heroCamera)
    {
        return view('admin.hero_cameras.edit', compact('heroCamera'));
    }

    public function update(Request $request, HeroCamera $heroCamera)
    {
        $validated = $request->validate([
            'label'      => 'required|string|max:100',
            'video'      => 'nullable|file|mimetypes:video/mp4,video/webm,video/ogg|max:51200',
            'sort_order' => 'nullable|integer|min:0',
            'is_active'  => 'nullable|boolean',
        ]);

        $data = [
            'label'      => $validated['label'],
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active'  => $request->boolean('is_active'),
        ];

        if ($request->hasFile('video')) {
            if ($heroCamera->video_path) {
                Storage::disk('public')->delete($heroCamera->video_path);
            }
            $data['video_path'] = $request->file('video')->store('cameras', 'public');
        }

        $heroCamera->update($data);

        return redirect()->route('admin.hero-cameras.index')->with('success', 'Camera feed updated.');
    }

    public function destroy(HeroCamera $heroCamera)
    {
        if ($heroCamera->video_path) {
            Storage::disk('public')->delete($heroCamera->video_path);
        }
        $heroCamera->delete();

        return redirect()->route('admin.hero-cameras.index')->with('success', 'Camera feed deleted.');
    }
}
