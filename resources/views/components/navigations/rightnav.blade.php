<div class="right-section">
    <div class="btn-icons">
        <i id="resize-btn" class="fa-solid fa-arrow-right"></i>
        <i id="add-btn" class="fa-solid fa-plus" data-toggle="modal" data-target="#add-notes"></i>

        <x-notes.add-notes />

    </div>
    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#rightnav">
        <i class="fa-solid fa-arrow-right"></i> See Notes
    </button> --}}

    @if (isset($notes))
        <div class="parent-notes">
            @foreach ($notes as $note)
                <div class="notes">
                    @if (auth()->user()->id === $note->user_id)
                    <div class="dropdown show edits" style="text-align: right;">
                        <a class="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fa-solid fa-ellipsis-vertical"></i>

                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" class="btn btn-success" data-toggle="modal"
                                data-target="#updatenotes{{ $note->id }}">
                                Edit Notes
                            </a>
                            <a class="dropdown-item" class="btn btn-danger" data-toggle="modal"
                                data-target="#deletenotes{{ $note->id }}">
                                Delete
                            </a>


                        </div>

                    </div>
                    @endif
                    <p><b>{{ $note->body }}</b></p>
                   <small><i>-Created by {{ $note->user->name }}</i></small>
                    {{-- <button type="button" class="btn btn-success" data-toggle="modal"
                        data-target="#updatenotes{{ $note->id }}"><i class="fa-solid fa-pen t text-white"></i>
                    </button>
                    <button type="button" class="btn btn-danger" data-toggle="modal"
                        data-target="#deletenotes{{ $note->id }}"><i
                            class="fa-solid fa-trash text-white"></i></button> --}}

                </div>
                <x-notes.update-notes :note="$note" />
                <x-notes.delete-notes :note="$note" />
            @endforeach
        </div>
    @endif



    {{-- <x-rightnav-mod /> --}}



</div>
