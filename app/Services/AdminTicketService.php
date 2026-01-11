<?php
namespace App\Services;

use App\Models\Ticket;

class AdminTicketService
{
    public function list()
    {
        return Ticket::with('user')->latest()->get();
    }

    public function updateStatus(Ticket $ticket, string $status): Ticket
    {
        $ticket->update([
            'status' => $status
        ]);

        return $ticket;
    }
}
