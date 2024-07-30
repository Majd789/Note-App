<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Note;
use Illuminate\Http\Request;
use PhpParser\Node\Scalar\String_;

class FolderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $folders = Folder::where('user_id' ,$request->user()->id)->get();
//        $NO_Note =Folder::find(6)->notes->count();
//        dd($NO_Note);

        return view('Folder.index' ,['folders'=>$folders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Folder.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $folder = Folder::create([
            'user_id'=>$request->user()->id,
            'name'=>$request->name,
            'description'=>$request->description
        ]);

        return to_route('folder.index' ,$folder);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $folder = Folder::find($id);

        $notes = Folder::find($id)->notes;
        return view('Folder.show' , compact( 'notes' , 'folder'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $folder = Folder::find($id);
        return view('Folder.edit' , compact('folder'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string  $id)
    {
        $folder = Folder::find($id)->update([
            'name'=>$request->name,
            'description'=>$request->description
        ]);
        return to_route('folder.show',$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Folder::find($id)->delete();
        return to_route('folder.index');
    }


    public function folder_content (Request $request){

        $folder_id = $request->id;
        $notes = Note::where('folder_id' , $folder_id)->get();
        return view('Folder.folder_content',['notes'=>$notes]);
    }
}
