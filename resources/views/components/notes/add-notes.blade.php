<!-- Modal for add notes -->
@props(['notes'])

<div class="modal fade" id="add-notes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Add New Notes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <form action="{{ route('notes.store') }}" method="POST" enctype="multipart/form-data">
                    {{-- <input type="hidden" name="id" value="{{ $user->id }}"> --}}
                    @csrf

                    <div class="add-form-wrapper">

                        <div class="form-group">

                            <label for="exampleFormControlTextarea1">Add Notes</label>
                            <textarea class="form-control"  rows="5" id="body" type="textarea"
                            class="form-control @error('body') is-invalid @enderror" name="body"
                            value="{{ old('body') }}" autocomplete="body" autofocus></textarea>
                            @error('body')
                                <span class="invalid-feedback" role="alert" style="color: red;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                 
                        <div class="submit-btn">
                            <button type="submit" class="btn btn-primary">Add Notes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
