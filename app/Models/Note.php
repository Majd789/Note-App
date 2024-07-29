<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'folder_id',
        'title',
        'body',
        'favorite',
    ];

    public function folder (){
        return $this->belongsTo(Folder::class);
    }

}
