<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    // Afficher le formulaire de contact
    public function index()
    {
        return view('contact');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'telephone' => 'nullable|string|max:20',
            'sujet' => 'required|string|max:100',
            'message' => 'required|min:10',
        ]);

        // Enregistrement en base
        ContactMessage::create($validated);

        // Envoi d'email
        Mail::send('emails.contact', ['data' => $validated], function ($message) use ($validated) {
            $message->to('alshahoudmohamed95@gmail.com')
                    ->subject('Message du site : ' . $validated['sujet']);
        });

        return redirect()->back()->with('success', 'Votre message a bien été envoyé !');
    }
}
