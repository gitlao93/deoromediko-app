<?php

namespace App\Http\Controllers;
use App\Models\Note;
use Illuminate\Http\Request;

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
        // Validate the request data
        $request->validate([
            'body' => 'required',
        ]);

        // Create a new note
        $note = new Note();
        $note->body = $request->body;
        $note->save();

        // Redirect back to the index page
        session()->flash('success', 'Note added successfully.');

        // Redirect back to the index page
        return back();
    }

    public function update(Request $request, $id)
    {
        $note = Note::findOrFail($id);
        $note->body = $request->body;
        $note->save();
        return redirect()->back()->with('success', 'Note updated successfully.');
    }

       // DELETE Notes
       public function delete($id)
       {
           $note = Note::findOrFail($id);
           $note->delete();
           return redirect()->back()->with('success', 'Note deleted successfully.');
       }

}
