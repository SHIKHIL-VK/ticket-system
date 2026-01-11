<?php

namespace App\Services;

use App\Models\Reply;
use App\Models\Ticket;
use App\Models\User;

class ReplyService
{
    public function store(User $user, Ticket $ticket, string $message): Reply
    {
        // only admin or ticket owner can reply
        if ($user->role !== 'admin' && $ticket->user_id !== $user->id) {
            abort(403, 'You are not allowed to reply to this ticket');
        }

        if ($ticket->status === 'closed') {
            abort(422, 'Cannot reply to a closed ticket');
        }

        return Reply::create([
            'ticket_id' => $ticket->id,
            'user_id'   => $user->id,
            'message'   => $message,
        ]);
    }
}
