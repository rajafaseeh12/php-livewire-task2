<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Connectionincommon extends Component
{
    public $limitPerPage = 10;
    public $user ;
    public $usersconnections = [];
    public $commonconnections=[] ;


    protected $listeners = [
        'load-more' => 'loadMore'
    ];
    public function mount($user)
    {
        $this->user=$user;
    }
    public function loadMore()
    {
        $this->limitPerPage = $this->limitPerPage + 10;
    }
    public function render()
    {
        
        return view('livewire.connectionincommon');
    }
}
