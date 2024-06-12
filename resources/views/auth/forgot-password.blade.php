<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Mot de passe oublié ? Pas de problème. Indiquez-nous simplement votre adresse email et nous vous enverrons un lien de réinitialisation de mot de passe qui vous permettra de choisir un nouveau.
        ') }}
    </div>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('
        Nous vous avons envoyé le lien de réinitialisation de mot de passe par email.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

  
        @csrf
        <form method="POST" action="{{ route('password.email') }}">
            
        <!-- Email Address -->
        <div>
            <x-input-label for="login_by" :value="__('Nom / Email')" />
            <x-text-input id="login_by" class="block mt-1 w-full" type="text" name="login_by" :value="old('login_by')" required autofocus />
            <x-input-error :messages="$errors->get('login_by')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Envoyer le lien de réinitialisation du mot de passe') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
