<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    public $fillable = ['name','tittle'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}