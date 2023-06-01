<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\UserConnection;

class Connection extends Component
{
     public $limitPerPage = 10;
     public $usersconnections = [];
    protected $listeners = [
        'load-more' => 'loadMore'
    ];

    public function loadMore()
    {
        $this->limitPerPage = $this->limitPerPage + 10;
    }
    public function removeconnection($id)
    {
        $con=UserConnection::find($id)->delete();
    }
    public function render()
    {
        $this->usersconnections = auth()->user()->connectionsids->pluck('connection_id')->toArray();
        return view('livewire.connection');
    }
}
