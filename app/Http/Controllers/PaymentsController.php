<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\PaymentReceived;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;
use App\Renda;
use App\User;

class PaymentsController extends Controller
{

    public function create()
    {
        return view('rendas.index');
    }

    public function store()
    {
        request()->user()->notify(new PaymentReceived($this->rendas->id));

    }

  /*  public function sendNotification()

    {

        $user = User::where('proprietario_id', $user->proprietario->id);


        $details = [

            'greeting' => 'Hi Artisan',

            'body' => 'This is my first notification from ItSolutionStuff.com',

            'thanks' => 'Thank you for using ItSolutionStuff.com tuto!',

            'actionText' => 'View My Site',

            'actionURL' => url('/'),

        ];

        Notification::send($user, new PaymentReceived($details));

        dd('done');

    }*/

}
