<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('otp.generate') }}">
        @csrf
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <!-- Email Address -->
        <div>
            <x-input-label for="mobile_no" :value="__('Mobile No')" />
            <x-text-input id="mobile_no" class="block mt-1 w-full" type="text" name="mobile_no" :value="old('mobile_no')" required autofocus autocomplete="mobile_no" />
            <x-input-error :messages="$errors->get('mobile_no')" class="mt-2" />
        </div>



        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ms-3 mr-2">
                  {{ __('Generate OTP') }}
            </x-primary-button>

            @if (Route::has('login'))
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Login With Username') }}
            </a>
               
            @endif
        </div>
    </form>
</x-guest-layout>
