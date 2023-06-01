<div class="row justify-content-center mt-5">
  <div class="col-12">
    <div class="card shadow  text-white bg-dark">
      <div class="card-header">Coding Challenge - Network connections </div>
      <div class="card-body">
        <div class="btn-group w-100 mb-3" role="group" aria-label="Basic radio toggle button group">
          <input type="radio" class="btn-check"  value="suggestions"   id="btnradio1" autocomplete="off" wire:model="tabmode"  wire:key="time().'suggestions'"  checked>
          <label class="btn btn-outline-primary" for="btnradio1"  id="get_suggestions_btn">Suggestions ({{ $suggestionscount }})</label>

          <input type="radio" class="btn-check" name="btnradio" id="btnradio2" value="sentrequests" wire.click="sentrequests" wire:model="tabmode" wire:key="time().'sentrequest'"  autocomplete="off">
          <label class="btn btn-outline-primary"  for="btnradio2" id="get_sent_requests_btn">Sent Requests ({{ count($sentrequests) }})</label>

          <input type="radio" class="btn-check" name="btnradio" value="recievedrequests" wire.click="recievedrequests" wire:model="tabmode" wire:key="time().'recievedkey'" id="btnradio3"  autocomplete="off">
          <label class="btn btn-outline-primary"  for="btnradio3" id="get_received_requests_btn">Received
            Requests({{ auth()->user()->receivedRequests->count() }})</label>

          <input type="radio" class="btn-check"  name="btnradio" value="connections" wire:model="tabmode" wire:key="time().'connections'"  id="btnradio4" autocomplete="off">
          <label class="btn btn-outline-primary"  for="btnradio4" id="get_connections_btn">Connections ({{ count($usersconnectons) }})</label>
        </div>
        <hr>
        <div wire:loading>
        <div id="connections_in_common_skeleton" class="{{-- d-none --}}">
  <br>
 
  <div class="px-8">
   
      <livewire:skeleton />
   
  </div>
</div>
    </div>
        <div id="content"  wire:loading.remove>
          @if($tabmode=='suggestions')
            
                 <livewire:suggestion />
        @elseif($tabmode=='connections')
                    <livewire:connection />
        @elseif($tabmode=='sentrequests')
            
        <livewire:request :mode="'sent'" /> 
        @elseif($tabmode=='recievedrequests')
         
        <livewire:request :mode="'received'" />
        @else
       
            @endif
        </div>

        {{-- Remove this when you start working, just to show you the different components --}}
       

       

        

        
        {{-- Remove this when you start working, just to show you the different components --}}

        

        
    
      </div>
    </div>
  </div>
</div>

{{-- Remove this when you start working, just to show you the different components --}}


