<!-- Modal for update -->
@props(['note'])

<div class="modal fade" id="updatenotes{{ $note->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Update Note: {{ $note->id }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
   
                
                <form action="{{ route('notes.update', $note->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $note->id }}">
                
                    <div class="add-form-wrapper">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Update Notes</label>
                            <textarea  class="form-control"  rows="5" id="body" type="textarea"
                            class="form-control @error('body') is-invalid @enderror" name="body"
                            value="{{ old('body') }}" autocomplete="body" autofocus>{{ $note->body }}</textarea>
                            @error('body')
                                <span class="invalid-feedback" role="alert" style="color: red;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <input type="hidden" name="user_type" value="{{ Auth::user()->user_type }}">
                        
                
                        <div class="submit-btn">
                            <button type="submit" class="btn btn-primary">Update Notes</button>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>