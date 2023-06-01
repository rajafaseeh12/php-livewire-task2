<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\UserRequest;
use App\Models\UserConnection;
class Request extends Component
{   
    public $mode="sent";
    public $limitPerPage = 10;
    protected $listeners = [
        'load-more' => 'loadMore'
    ];
    public function loadMore()
    {
        $this->limitPerPage = $this->limitPerPage + 10;
    }
    // public $userrequests;
    public function acceptConnection($id)
    {
        $req=UserRequest::find($id);
        $req->update([
            'status'=>'accepted'
            ]);
        // $req->status='accepted';
        // $req->save();
        $con=new UserConnection;
        $con->user_id=auth()->user()->id;
        $con->connection_id=$id;
        $con->save();
    }
    public function withdraw($id)
    {
         $req=UserRequest::find($id)->delete();
    }
    public function render()
    {
        // if($this->mode=='sent'){
        //         $this->userrequests=auth()->user()->sentRequests->take(5);
        // }else{
        //         $this->userrequests=auth()->user()->receivedRequests->take(5);

        // }
        return view('livewire.request');
    }
}
