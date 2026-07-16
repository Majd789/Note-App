<?php

namespace App\Http\Controllers;

use App\Http\Requests\Note\AddNoteToFolderRequest;
use App\Http\Requests\Note\StoreNoteRequest;
use App\Http\Requests\Note\UpdateNoteRequest;
use App\Models\Folder;
use App\Models\Note;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NoteController extends Controller
{
    public function index(Request $request): View
    {
        $this->authorize('viewAny', Note::class);

        $notes = Note::query()
            ->forUser($request->user()->id)
            ->latest()
            ->get();

        return view('Note.home', compact('notes'));
    }

    public function create(): View
    {
        $this->authorize('create', Note::class);

        return view('Note.create');
    }

    public function store(StoreNoteRequest $request): RedirectResponse
    {
        $request->user()->notes()->create($request->validated());

        return to_route('home')->with('success', 'Note created successfully.');
    }

    public function show(Request $request, Note $note): View
    {
        $this->authorize('view', $note);

        $note->load('folder');

        $folders = Folder::query()
            ->forUser($request->user()->id)
            ->orderBy('name')
            ->get();

        $folderName = $note->folder?->name ?? 'None';

        return view('Note.show', [
            'note' => $note,
            'folders' => $folders,
            'folder_name' => $folderName,
        ]);
    }

    public function edit(Note $note): View
    {
        $this->authorize('update', $note);

        return view('Note.edit', compact('note'));
    }

    public function update(UpdateNoteRequest $request, Note $note): RedirectResponse
    {
        $note->update($request->validated());

        return to_route('note.show', $note)->with('success', 'Note updated successfully.');
    }

    public function destroy(Note $note): RedirectResponse
    {
        $this->authorize('delete', $note);

        $note->delete();

        return to_route('home')->with('success', 'Note deleted successfully.');
    }

    public function addToFolder(AddNoteToFolderRequest $request, Note $note): RedirectResponse
    {
        $folder = Folder::query()
            ->forUser($request->user()->id)
            ->findOrFail($request->validated('folder_id'));

        $note->update([
            'folder_id' => $folder->id,
        ]);

        return to_route('note.show', $note)->with('success', 'Note added to folder.');
    }

    public function toggleFavorite(Note $note): RedirectResponse
    {
        $this->authorize('update', $note);

        $note->toggleFavorite();

        return back()->with('success', $note->favorite ? 'Added to favorites.' : 'Removed from favorites.');
    }
}
