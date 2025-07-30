<?php

namespace App\Models;

use App\Models\User;
use App\Models\Conversation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['conversation_id', 'sender_id', 'message', 'read'];

    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public static function UserUnreadCount()
    {
        return self::where('read', false)
            ->whereHas('conversation', function ($query) {
                $query->where('patient_id', Auth::user()->id)
                    ->orWhere('doctor_id', Auth::user()->id);
            })
            ->count();
    }
}
