<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientConversationController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Assuming Patient model has `user_id` foreign key
        $patient = $user->patient;

        if (!$patient) {
            abort(403, 'You are not registered as a patient.');
        }

        $conversations = $patient->conversations()->latest()->get();

        return view('patient.conversations.index', compact('conversations'));
    }

    public function reply(Request $request, Conversation $conversation)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $conversation->messages()->create([
            'message' => $request->message,
            'sender_id' => Auth::id(),
        ]);

        return back()->with('success', 'Reply sent successfully.');
    }

    public function show($id)
    {
        $conversation = Conversation::with('messages')->findOrFail($id);

        if ($conversation->patient->user->id !== auth()->id()) {
            abort(403); // Forbidden
        }

        $conversation->messages()
            ->where('sender_id', $conversation->doctor_id)
            ->where('read', false)
            ->update(['read' => true]);

        return view('patient.conversations.show', compact('conversation'));
    }
}
