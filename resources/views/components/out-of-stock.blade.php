 <!-- Modal out of stock-->
 {{-- @props(['list'])
 <div class="modal fade" id="outofstock{{ $list->product_ID }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ $list->product_ID }} {{$list->generic_name}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('updatestock', $list->product_ID) }}">
            @csrf
            
            <label for="status">Option:</label>
            <select id="status" name="status">
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
            
            <button type="submit">Submit</button>
        </form>
        
        </div>
    
      </div>
    </div>
  </div> --}}