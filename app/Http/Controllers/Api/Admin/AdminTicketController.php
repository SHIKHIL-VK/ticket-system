<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateTicketStatusRequest;
use App\Models\Ticket;
use App\Services\AdminTicketService;

class AdminTicketController extends Controller
{
    protected AdminTicketService $Service;

    public function __construct(AdminTicketService $Service)
    {
        $this->Service = $Service;
    }
    public function index()
    {
        $list=$this->Service->list();
        return response()->json([
            'status' => true,
            'data'   => $list
        ]);
    }

    public function updateStatus(UpdateTicketStatusRequest $request,Ticket $ticket) {
        $this->Service->updateStatus($ticket, $request->status);

        return response()->json([
            'status'  => true,
            'message' => 'Ticket status updated successfully'
        ]);
    }
}
