<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
       📩 Merci pour ton inscription ! Avant de commencer, confirme ton adresse email en cliquant sur le lien que nous venons de t’envoyer.
        <br>
        Si tu n’as pas reçu l’email, clique sur le bouton ci-dessous pour en recevoir un nouveau.
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            ✅ Un nouveau lien de vérification a été envoyé à ton adresse email.
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    Renvoyer l'email de vérification
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
