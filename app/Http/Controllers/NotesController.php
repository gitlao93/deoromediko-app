<?php

namespace App\Http\Controllers;
use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotesController extends Controller
{
    public function index(Request $request)
    {
        // Retrieve all notes from the database
        $notes = Note::all();

        // Pass the notes data to the RightNav component
        return view('admin.dashboard', ['notes' => $notes]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'body' => 'required',
        ]);

        $note = new Note();
        $note->user_id = $request->user_id;
        $note->body = $request->body;
        $note->save();

        return redirect()
            ->back()
            ->with('success', 'Note added successfully!');
    }

    public function update(Request $request, $id)
    {
        $note = Note::findOrFail($id);

        // Check if the authenticated user is the same user who created the note, or an admin
        if (
            !auth()->check() ||
            ($note->user_id !== auth()->user()->id &&
                !auth()
                    ->user()
                    ->isAdmin())
        ) {
            abort(403, 'Unauthorized action.');
        }

        $note->body = $request->body;
        $note->save();

        // Redirect back to the previous page
        return redirect()
            ->back()
            ->with('success', 'Note updated successfully!');
    }

    // DELETE Notes
    public function delete($id)
    {
        $note = Note::findOrFail($id);
        $note->delete();

        // Redirect back to the admin dashboard
        // return redirect()->route('admin.dashboard')->with('success', 'Note deleted successfully.');
        return redirect()
            ->back()
            ->with('success', 'Note deleted successfully!');
    }
}
