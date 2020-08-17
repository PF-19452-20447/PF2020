<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\PaymentReceived;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;

class PaymentsController extends Controller
{

    public function create()
    {
        return view('rendas.index');
    }

    public function store()
    {
        request()->user()->notify(new PaymentReceived(900));

    }

}
