<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FavoriteController extends Controller
{
    public function index(Request $request): View
    {
        $this->authorize('viewAny', Note::class);

        $notes = Note::query()
            ->forUser($request->user()->id)
            ->favorites()
            ->latest()
            ->get();

        return view('Favorite.index', compact('notes'));
    }
}
