<section class="bg-gradient-to-br from-yellow-50 via-pink-50 to-blue-50 p-6 rounded-xl shadow-md border border-yellow-100">
    <header>
        <h2 class="text-lg font-semibold text-amber-700 flex items-center gap-2">
            🧳 {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-teal-800">
            {{ __("Update your travel profile and ensure your contact info is current for smoother island adventures.") }}
        </p>
    </header>

    <!-- Verification Form -->
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <!-- Profile Update Form -->
    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" class="text-amber-700"/>
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full border-yellow-100 focus:ring-amber-400" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-amber-700"/>
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full border-yellow-100 focus:ring-amber-400" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            <!-- Unverified Email Notice -->
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2 text-sm text-teal-900">
                    {{ __('Your email address is unverified.') }}
                    <button
                        form="send-verification"
                        class="underline text-sm text-pink-600 hover:text-pink-800 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-300">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Save Button -->
        <div class="flex items-center gap-4">
            <x-primary-button class="bg-amber-500 hover:bg-amber-600 focus:ring-amber-300">
                🌺 {{ __('Save') }}
            </x-primary-button>

            <!-- Saved Message -->
            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-teal-700"
                >🌴 {{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
