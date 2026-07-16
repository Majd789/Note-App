<?php

namespace App\Http\Controllers;

use App\Http\Requests\Folder\StoreFolderRequest;
use App\Http\Requests\Folder\UpdateFolderRequest;
use App\Models\Folder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FolderController extends Controller
{
    public function index(Request $request): View
    {
        $this->authorize('viewAny', Folder::class);

        $folders = Folder::query()
            ->forUser($request->user()->id)
            ->withCount('notes')
            ->latest()
            ->get();

        return view('Folder.index', compact('folders'));
    }

    public function create(): View
    {
        $this->authorize('create', Folder::class);

        return view('Folder.create');
    }

    public function store(StoreFolderRequest $request): RedirectResponse
    {
        $request->user()->folders()->create($request->validated());

        return to_route('folder.index')->with('success', 'Folder created successfully.');
    }

    public function show(Folder $folder): View
    {
        $this->authorize('view', $folder);

        $notes = $folder->notes()->latest()->get();

        return view('Folder.show', compact('notes', 'folder'));
    }

    public function edit(Folder $folder): View
    {
        $this->authorize('update', $folder);

        return view('Folder.edit', compact('folder'));
    }

    public function update(UpdateFolderRequest $request, Folder $folder): RedirectResponse
    {
        $folder->update($request->validated());

        return to_route('folder.show', $folder)->with('success', 'Folder updated successfully.');
    }

    public function destroy(Folder $folder): RedirectResponse
    {
        $this->authorize('delete', $folder);

        $folder->delete();

        return to_route('folder.index')->with('success', 'Folder deleted successfully.');
    }
}
