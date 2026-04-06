<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stat;
use Illuminate\Http\Request;

class StatController extends Controller
{
    public function index()
    {
        $stats = Stat::ordered()->get();
        return view('admin.stats.index', compact('stats'));
    }

    public function create()
    {
        return view('admin.stats.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'icon'       => 'required|string|max:100',
            'value'      => 'required|string|max:50',
            'label'      => 'required|string|max:100',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        Stat::create($validated);

        return redirect()->route('admin.stats.index')->with('success', 'Stat created successfully.');
    }

    public function edit(Stat $stat)
    {
        return view('admin.stats.edit', compact('stat'));
    }

    public function update(Request $request, Stat $stat)
    {
        $validated = $request->validate([
            'icon'       => 'required|string|max:100',
            'value'      => 'required|string|max:50',
            'label'      => 'required|string|max:100',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        $stat->update($validated);

        return redirect()->route('admin.stats.index')->with('success', 'Stat updated.');
    }

    public function destroy(Stat $stat)
    {
        $stat->delete();
        return redirect()->route('admin.stats.index')->with('success', 'Stat deleted.');
    }
}
