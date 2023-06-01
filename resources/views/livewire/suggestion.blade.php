<div>

@forelse ($suggestions as $suggestion )
<div class="my-2 shadow  text-white bg-dark p-1" id="">
  <div class="d-flex justify-content-between">
    <table class="ms-1">
      <td class="align-middle">{{  ucfirst($suggestion->name)}}</td>
      <td class="align-middle"> - </td>
      <td class="align-middle">{{ $suggestion->email }}</td>
      <td class="align-middle"> 
    </table>
    <div>
      <button id="row_id_{{ $suggestion->id }}" wire:click="connect({{$suggestion->id}})"  class="btn btn-primary me-1">Connect</button>
    </div>
  </div>
</div>

@empty
    <div class="my-2 shadow  text-white bg-dark p-1" id="">
  <div class="d-flex justify-content-center">
    <table class="ms-1">
      
         <td class="align-middle">No suggestions</td>
    </table>
   
  </div>
</div>
@endforelse
@if($limitPerPage<>$suggestionscount &&  $limitPerPage < $suggestionscount)
 <div class="d-flex justify-content-center mt-2 py-3 {{-- d-none --}}" id="load_more_btn_parent">
          <a class="btn btn-primary" wire:click="loadMore" >Load more</a>
        </div>
@endif
</div>