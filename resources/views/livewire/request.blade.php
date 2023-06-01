<div>
    @php
        if ($mode == 'sent') {
          $userrequests=auth()->user()->sentRequests->take($limitPerPage);
          $userrequestscount=auth()->user()->sentRequests->count();
        } else {
          $userrequests=auth()->user()->receivedRequests->take($limitPerPage);
          $userrequestscount=auth()->user()->receivedRequests->count();
        }
    @endphp
    @forelse ($userrequests as $request)
        <div class="my-2 shadow text-white bg-dark p-1" id="">
            <div class="d-flex justify-content-between">
                <table class="ms-1">
                    <td class="align-middle">{{ ucfirst($request->receiver->name) }}</td>
                    <td class="align-middle"> - </td>
                    <td class="align-middle">{{ $request->receiver->email }}</td>
                    <td class="align-middle">
                </table>
                <div>
                    @if ($mode == 'sent')
                        <button id="cancel_request_btn_" class="btn btn-danger me-1"
                            wire:click='withdraw("{{ $request->id }}")'>Withdraw
                            Request</button>
                    @else
                        <button id="accept_request_btn_" class="btn btn-primary me-1"
                            wire:click='acceptConnection("{{ $request->id }}")'>Accept</button>
                    @endif
                </div>
            </div>
        </div>
         
    @empty
        <div class="my-2 shadow text-white bg-dark p-1" id="">
            <div class="d-flex justify-content-between">
                <table class="ms-1">
                    <td class="align-middle"> No Request</td>
                </table>
               
            </div>
        </div>
    @endforelse

@if($limitPerPage<>$userrequestscount &&  $limitPerPage < $userrequestscount)
 <div class="d-flex justify-content-center mt-2 py-3 {{-- d-none --}}" id="load_more_btn_parent">
          <a class="btn btn-primary" wire:click="loadMore" >Load more</a>
        </div>
@endif
</div>