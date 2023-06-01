<div>
@php
    $count=$user->connections->whereIn('connection_id',$usersconnections)->count();
@endphp
@foreach($user->connections->whereIn('connection_id',$usersconnections)->take($limitPerPage) as $connection)
<div class="p-2 shadow rounded mt-2  text-white bg-dark">{{$connection->user->name}} - {{$connection->user->email}}</div>
@endforeach
@if(  $limitPerPage < $count)
 <div class="d-flex justify-content-center mt-2 py-3 {{-- d-none --}}" id="load_more_btn_parent">
          <a class="btn btn-primary" wire:click="loadMore" >Load more</a>
        </div>
    @endif
</div>