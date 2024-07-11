<section>
    <header>
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                <button class="btn btn-primary">Retour</button>
            </x-responsive-nav-link>
        </div>
        
        <h1 class="display-6">MON PROFIL</h1>
        {{-- <p class=" text-sm text-gray-600">
            {{ $entreprise }}
        </p> --}}
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        <h2 ><b>INFORMATIONS PERSONNELLES</b></h2>
        <div>
            <x-input-label for="name" :value="__('Nom')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
                required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"
                required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>
        <div>
            <x-input-label for="telephone" :value="__('Telephone')" />
            <x-text-input id="telephone" name="telephone" type="tel" class="mt-1 block w-full" :value="old('telephone', $user->telephone)" />
            <x-input-error class="mt-2" :messages="$errors->get('telephone')" />
        </div>

        <h2 class="mt-5"><b>INFORMATIONS ENTREPRISE</b></h2>
        <div>
            <x-input-label for="entreprise" :value="__('Entreprise')" />
            <x-text-input id="entreprise" name="entreprise" type="text" class="mt-1 block w-full"
                :value="old('entreprise', $user->entreprise)" />
            <x-input-error class="mt-2" :messages="$errors->get('entreprise')" />
        </div>

        <div>
            <x-input-label for="adresse" :value="__('Adresse')" />
            <x-text-input id="adresse" name="adresse" type="text" class="mt-1 block w-full" :value="old('adresse', $user->adresse)" />
            <x-input-error class="mt-2" :messages="$errors->get('adresse')" />
        </div>

        <div>
            <x-input-label for="telephoneE" :value="__('Telephone Entreprise')" />
            <x-text-input id="telephoneE" name="telephoneE" type="tel" class="mt-1 block w-full"
                :value="old('telephoneE', $user->telephoneE)" />
            <x-input-error class="mt-2" :messages="$errors->get('telephoneE')" />
        </div>
        <h2 class="mt-5"><b>RESEAUX</b></h2>

        <div>
            <x-input-label for="UrlFacebook" :value="__('Facebook')" />
            <x-text-input id="UrlFacebook" name="UrlFacebook" type="text" class="mt-1 block w-full"
                :value="old('UrlFacebook', $user->UrlFacebook)" />
            <x-input-error class="mt-2" :messages="$errors->get('UrlFacebook')" />
        </div>

        <div>
            <x-input-label for="UrlInstagram" :value="__('Instagram')" />
            <x-text-input id="UrlInstagram" name="UrlInstagram" type="text" class="mt-1 block w-full"
                :value="old('UrlInstagram', $user->UrlInstagram)" />
            <x-input-error class="mt-2" :messages="$errors->get('UrlInstagram')" />
        </div>

        <div>
            <x-input-label for="UrlGoogle" :value="__('Google')" />
            <x-text-input id="UrlGoogle" name="UrlGoogle" type="text" class="mt-1 block w-full" :value="old('UrlGoogle', $user->UrlGoogle)" />
            <x-input-error class="mt-2" :messages="$errors->get('UrlGoogle')" />
        </div>
        <div>
            <x-input-label for="UrlSite" :value="__('Site')" />
            <x-text-input id="UrlSite" name="UrlSite" type="text" class="mt-1 block w-full" :value="old('UrlSite', $user->UrlSite)" />
            <x-input-error class="mt-2" :messages="$errors->get('UrlSite')" />
        </div>




        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Enregistrer') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
