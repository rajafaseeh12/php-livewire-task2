<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    public function connections()
    {
        return $this->hasMany(UserConnection::class, 'user_id', 'id');
    }
    public function connectionsids()
    {
        return $this->hasMany(UserConnection::class, 'user_id', 'id')->select(['connection_id']);
    }
    public function receivedRequests()
    {
        return $this->hasMany(UserRequest::class, 'request_to', 'id')->where('status', 'pending');
    }
    public function sentRequests()
    {
        return $this->hasMany(UserRequest::class, 'request_from', 'id')->where('status', 'pending');
    }
    public function sentRequestids()
    {
        return $this->hasMany(UserRequest::class, 'request_from', 'id')->select(['request_to']);
    }
    public function receivedRequestids()
    {
        return $this->hasMany(UserRequest::class, 'request_to', 'id')->select(['request_from']);
    }
    public  function mutualconnection()
    {
        $connections = auth()->user()->connectionsids->pluck('connection_id');
        return $this->hasMany(UserConnection::class, 'user_id', 'id')->whereIn('connection_id',$connections);
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
