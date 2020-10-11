<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactNotification;
use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('site.contact');
    }

    public function sendContact(Request $request)
    {
        $data = $request->validate([
            'name'      => 'required|string',
            'phone'     => 'sometimes|nullable|numeric',
            'email'     => 'required|email',
            'message'   => 'required|string|min:10'
        ]);

        Contact::create($data);
        ContactNotification::create([
            'name'  => $data['name'],
            'content'=> ' ' . __('admin.sent_message'),
            'status'=> 0
        ]);
        $this->sendEmail(env('MAIL_FROM_ADDRESS'), $data['name'], setting('email'), $data);
        session()->flash('success', trans('home.sent_successfully'));
        return redirect()->back();
    }

    public function sendEmail($fromMail, $toName, $toMail, $contactInfo)
    {
        $data = array('name' => $toName, 'body' => $contactInfo['message'], 'from' => $fromMail, 'phone' => $contactInfo['phone']);

        Mail::send('dashboard.emails.mail', $data, function($message) use ($toName, $toMail, $fromMail) {
            $message->to($toMail, $toName)->subject(__('home.contact_notification'));
            $message->from($fromMail ,__('home.from'));
        });
    }
}
