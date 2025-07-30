<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Patient;
use App\Models\Conversation;
use Illuminate\Http\Request;
use App\Models\PatientCareStep;
use Illuminate\Support\Facades\Auth;

class ConversationController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $conversations = Conversation::where('doctor_id', $user->id)
            ->orWhereHas('patient', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->latest()
            ->get();

        return view('conversations.index', compact('conversations'));
    }

    // Show specific conversation
    // public function show(Conversation $conversation)
    // {
    //     $this->authorizeView($conversation);

    //     $messages = $conversation->messages()->with('sender')->get();

    //     return view('conversations.show', compact('conversation', 'messages'));
    // }

    // Send a message inside a conversation
    public function storeMessage(Request $request, Conversation $conversation)
    {
        $this->authorizeView($conversation);

        if ($request->message) {
            $request->validate(['message' => 'required|string']);
        } else {
            $request->message = 'You missed your scheduled appointment. Please reply with your reason.';
        }



        Message::create([
            'conversation_id' => $conversation->id,
            'sender_id' => Auth::id(),
            'message' => $request->message,
            'read' => false,
        ]);

        return redirect()->back()->with('success', 'Message sent.');
    }

    // Doctor sends initial reminder (creates conversation)
    public function remindPatient(Patient $patient, Request $request)
    {
        $conversation = Conversation::firstOrCreate(
            ['patient_id' => $patient->id, 'doctor_id' => Auth::id()]
        );

        Message::create([
            'conversation_id' => $conversation->id,
            'sender_id' => Auth::id(),
            'message' => 'You missed your scheduled appointment. Please reply with your reason.',
            'read' => false,
        ]);

        return redirect()->route('conversations.index')->with('success', 'Reminder sent.');
    }

    // Doctor decides to skip AN/PN form after patient reply
    public function skipForm(Conversation $conversation)
    {
        $this->authorizeView($conversation);

        PatientCareStep::create([
            'patient_id' => $conversation->patient_id,
            'type' => $conversation->patient->CareSteps->count() <= 8 ? 'ANC' : 'PNC',
            'step_number' => $conversation->patient->CareSteps->count() + 1,
        ]);

        return redirect()->route('conversations.show', $conversation)->with('success', 'AN/PN step skipped.');
    }

    // Shared access check (can doctor or patient view this?)
    protected function authorizeView(Conversation $conversation)
    {
        $user = Auth::user();

        $isDoctor = $conversation->doctor_id == $user->id;
        $isPatient = $conversation->patient && $conversation->patient->user_id == $user->id;

        abort_unless($isDoctor || $isPatient, 403);
    }

    public function show($id)
    {
        $conversation = Conversation::with('messages')->findOrFail($id);

        foreach ($conversation->messages as $msg) {
            if ($msg->receiver_id == auth()->id() && !$msg->is_read) {
                $msg->update(['is_read' => true]);
            }
        }

        return view('conversations.show', compact('conversation'));
    }
}
