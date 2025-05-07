<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Afficher le formulaire de contact
    public function index()
    {
        return view('contact');
    }

    // Gérer la soumission du formulaire de contact
    public function submit(Request $request)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
            'email' => 'required|email',
            'telephone' => 'nullable|string|max:20',
            'sujet' => 'nullable|string|max:255',
            'message' => 'required|min:10',
        ]);

        // Traitement du formulaire (envoi d'email, enregistrement en DB, etc.)
        // Exemple : \Mail::to($email)->send(new ContactFormMail($validatedData));

        // Retourner une réponse après traitement
        return back()->with('success', 'Votre message a été envoyé avec succès !');
    }
}
