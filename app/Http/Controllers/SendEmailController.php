<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

//use Mail;

use App\Mail\NotifyMail;
use App\Mail\GuestMail;
use App\Mail\GuestReqMail;
use App\Models\Guest;


class SendEmailController extends Controller
{

  public function index()
  {

  }

  public function guestMail($id)
  {

    $guest = Guest::findOrFail($id);
    $data = [
      'name' => $guest->name,
      'title' => $guest->title,
      'email' => $guest->email
    ];
    $to = $data['email'];

    $body = [
      'name' => $data['name'],
      'title' => $data['title'],
      'url_a' => 'http://localhost:8000/welcomeguestreq/'.$id,
    ];

    /*Mail::to($to)->send(new GuestMail($body));
    if (Mail::failures()) {
      return response()->Fail('Sorry! Please try again latter');
    } else {
      return response()->success('Great! Successfully send in your mail');
    }*/

    return view('emails.guestMail', compact('data','body'));
  }

  public function guestReqMail($id)
  {

    $guest = Guest::findOrFail($id);
    $data = [
      'name' => $guest->name,
      'title' => $guest->title,
      'email' => $guest->email
    ];
    $to = $data['email'];

    $body = [
      'name' => $data['name'],
      'title' => $data['title'],
    ];

   /* Mail::to($to)->send(new GuestReqMail($body));
    if (Mail::failures()) {
      return response()->Fail('Sorry! Please try again latter');
    } else {
      return response()->success('Great! Successfully send in your mail');
    }*/

    return view('emails.guestReqMail', compact('data','body'));
  }
}
