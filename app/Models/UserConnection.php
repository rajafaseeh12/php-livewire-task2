<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserConnection extends Model
{
    use HasFactory;
 
     
    public function user(){
        return $this->belongsTo(User::class, 'connection_id', 'id');
    }
}
