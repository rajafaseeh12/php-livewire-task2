<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Networkconnection extends Component
{
    public $tabmode="suggestions";
    public $suggestionscount = 0;
    public $usersconnectons = [];
    public $sentrequests = [];
    public $receivedrequests = [];

    //public $mode="sent";
    // public function sentrequests(){
    //     $this->mode="sent";
    // }
    // public function recievedrequests(){
    //     $this->mode="recieved";
    // }
    public function render()
    {
        $this->usersconnectons = auth()->user()->connectionsids->pluck('connection_id')->toArray();
        $this->sentrequests = auth()->user()->sentRequestids->pluck('request_to')->toArray();
        $this->receivedrequests =  auth()->user()->receivedRequestids->pluck('request_from')->toArray();
        $this->idsarray=array_unique(array_merge($this->usersconnectons,$this->sentrequests,$this->receivedrequests), SORT_REGULAR);
        $this->suggestionscount = User::whereNotIn('id', $this->idsarray)->where('id','<>',auth()->user()->id)->count();
        return view('livewire.networkconnection');
    }
}
