<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\UserRequest;
use Illuminate\Support\Collection;

class Suggestion extends Component
{
    public $suggestions=[];
    public $suggestionscount = 0;
    public $usersconnectons = [];
    public $sentrequests = [];
    public $receivedrequests = [];
    public $idsarray = [];
    public $suggestionsize = 10;
    public $request;
    public $limitPerPage = 10;
    // protected $listeners = [
    //     'load-more' => 'loadMore'
    // ];

    public function loadMore()
    {
        $this->limitPerPage = $this->limitPerPage + 10;
    }

    public function connect( $var)
    {
        $userrequest=new UserRequest;
        $userrequest->request_from=auth()->user()->id;
        $userrequest->request_to=$var;
        $userrequest->status='pending';
        $userrequest->save();
    }
    // public function mount()
    // {
        
        
    //     //$suggestions=collect($suggestions);
    // }
    public function render()
    {
        $this->usersconnectons = auth()->user()->connectionsids->pluck('connection_id')->toArray();
        $this->sentrequests = auth()->user()->sentRequestids->pluck('request_to')->toArray();
        $this->receivedrequests =  auth()->user()->receivedRequestids->pluck('request_from')->toArray();
        $this->idsarray=array_unique(array_merge($this->usersconnectons,$this->sentrequests,$this->receivedrequests), SORT_REGULAR);
        $this->suggestionscount = User::whereNotIn('id', $this->idsarray)->where('id','<>',auth()->user()->id)->count();
        $this->suggestions = User::whereNotIn('id', $this->idsarray)->where('id','<>',auth()->user()->id)->get()->take($this->limitPerPage);
        return view('livewire.suggestion');
    }
}
