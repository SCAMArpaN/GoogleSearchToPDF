<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSearch extends Model
{
    use HasFactory;

    protected $table = "user_search";

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
}
