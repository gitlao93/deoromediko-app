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
                    <p>{{ $note->body }}</p>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#updatenotes{{ $note->id }}"><i
                            class="fa-solid fa-pen t text-white"></i>
                    </button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletenotes{{ $note->id }}"><i
                            class="fa-solid fa-trash text-white"></i></button>
                </div>
                <x-notes.update-notes :note="$note"/>
                <x-notes.delete-notes :note="$note"/>
            @endforeach
        </div>
    @endif



    {{-- <x-rightnav-mod /> --}}



</div>
