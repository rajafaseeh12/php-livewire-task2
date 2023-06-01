<div>
@php
    $connectioncount=auth()->user()->connections->count();
@endphp
@forelse(auth()->user()->connections->take($limitPerPage) as $connection)
<div class="my-2 shadow text-white bg-dark p-1" id="">
  <div class="d-flex justify-content-between">
    <table class="ms-1">
      <td class="align-middle">{{ ucfirst($connection->user->name) }}</td>
      <td class="align-middle"> - </td>
      <td class="align-middle">{{ $connection->user->email }}</td>
      <td class="align-middle">
    </table>
    <div>
      <button style="width: 220px" id="get_connections_in_common_{{ $connection->user->id }}" class="btn btn-primary" type="button"
        data-bs-toggle="collapse" data-bs-target="#collapse_{{ $connection->user->id }}" aria-expanded="false" aria-controls="collapseExample">
        Connections in common ({{ $connection->user->connections->whereIn('connection_id',$usersconnections)->count() }})
      </button>
      <button  wire:click="removeconnection({{ $connection->id }})" wire:key="time().$connection->id " id="remove_connections_{{ $connection->user->id }}" class="btn btn-danger me-1">Remove Connection</button>
    </div>

  </div>
  <div class="collapse" id="collapse_{{ $connection->user->id }}">

    <div id="content_" class="p-2">
      {{-- Display data here --}}
    
      @livewire('connectionincommon', ['user' => $connection->user])
    </div>
    <div id="connections_in_common_skeletons_{{ $connection->user->id }}">
      {{-- Paste the loading skeletons here via Jquery before the ajax to get the connections in common --}}
    </div>
    
  </div>
</div>
 
@empty
    <div class="my-2 shadow text-white bg-dark p-1" id="">
  <div class="d-flex justify-content-between">
    <table class="ms-1">
      <td class="align-middle">No Connections</td>
      
    </table>

  </div>
  
</div>
@endforelse
@if(  $limitPerPage < $connectioncount)
 <div class="d-flex justify-content-center mt-2 py-3 {{-- d-none --}}" id="load_more_btn_parent">
          <a class="btn btn-primary" wire:click="loadMore" >Load more</a>
        </div>
    @endif
</div>