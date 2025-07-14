<section class="space-y-6 bg-gradient-to-br from-yellow-50 via-pink-50 to-blue-50 p-6 rounded-xl shadow-md border border-yellow-100">

    <!-- Header -->
    <header>
        <h2 class="text-lg font-semibold text-amber-700 flex items-center gap-2">
            🌅 {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-teal-800">
            {{ __('Once your account is deleted, all of its resources and data will be permanently lost. Download anything you wish to keep before sailing off 🏝️.') }}
        </p>
    </header>

    <!-- Trigger Button -->
    <x-danger-button
        class="bg-red-500 hover:bg-red-600 focus:ring-red-300"
        x-data
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >
        🗑️ {{ __('Delete Account') }}
    </x-danger-button>

    <!-- Modal -->
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 bg-white rounded-xl shadow-lg text-gray-800">
            @csrf
            @method('delete')

            <!-- Modal Header -->
            <h2 class="text-lg font-bold text-red-600 flex items-center gap-2">
                ⚠️ {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-2 text-sm text-gray-600">
                {{ __('This is a permanent action. All your data and tropical footprints will be erased. Enter your password to confirm your departure from Island Portal.') }}
            </p>

            <!-- Password Input -->
            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />
                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-full border border-yellow-200 focus:ring-red-400"
                    placeholder="Enter your password"
                />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <!-- Action Buttons -->
            <div class="mt-6 flex justify-end gap-3">
                <x-secondary-button
                    x-on:click="$dispatch('close')"
                    class="bg-yellow-100 hover:bg-yellow-200 text-yellow-800"
                >
                    ✋ {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="bg-red-500 hover:bg-red-600">
                    🧨 {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
