<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRequest extends Model
{
   protected $guarded=['id'];
    public function sender()
    {
        return $this->belongsTo(User::class, 'request_from', 'id');
    }
    public function receiver()
    {
        return $this->belongsTo(User::class, 'request_from', 'id');
    }
}
