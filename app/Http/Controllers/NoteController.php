<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $notes = Note::where('user_id', $request->user()->id)->get();
        return view('Note.home',['notes'=>$notes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Note.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $note = Note::create([
            'user_id'=>$request->user()->id,
            'title'=>$request->title,
            'body'=>$request->description
        ]);

        return to_route('home' ,$note);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request , string $id)
    {
        $folders= Folder::where('user_id' ,$request->user()->id)->get();
        $note = Note::find($id);
        return view('Note.show',['note'=>$note , 'folders'=>$folders]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)

    {
        $note = Note::find($id);
        return view('Note.edit',['note'=>$note]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $note = Note::find($id)->update([
            'title'=>$request->title,
            'body'=>$request->description
        ]);
        return to_route('note.show',$id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Note::find($id)->delete();
        return redirect('home');

    }

    public function addToFolder(string $note_id , string $folder_id ){
      $note = Note::find($note_id)->update([
          'folder_id'=>$folder_id
       ]);

        return to_route('note.show',$note_id);
    }
}
