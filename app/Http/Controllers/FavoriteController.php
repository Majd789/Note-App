<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index( Request $request){
        $notes = Note::Where('user_id' , $request->user()->id)
            ->where('favorite' ,1)
            ->get();
        return view('Favorite.index', compact('notes'));
    }
}
