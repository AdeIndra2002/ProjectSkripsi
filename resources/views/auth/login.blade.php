<x-guest-layout>
    <div class="flex flex-col overflow-y-auto md:flex-row border-collapse">
        <div class="h-32 md:h-auto md:w-1/2">
            <img aria-hidden="true" class="object-cover w-full h-full" src="{{ asset('images/login-office.jpeg') }}" alt="Office" />
        </div>
        <div class="flex items-center justify-center dark:bg-gray-800 p-6 sm:p-12 md:w-1/2">

            <div class="w-full">
                <h1 class="mb-4 text-xl font-semibold text-gray-500">
                    Login
                </h1>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Input[ype="email"] -->
                    <div class="mt-4 relative">
                        <x-text-input placeholder=" " type="email" id="email" name="email" value="{{ old('email') }}" class="block w-full" required autofocus />
                        <x-input-label :value="__('Email')" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Input[ype="password"] -->
                    <div class="mt-4 relative">
                        <x-text-input placeholder=" " type="password" id="password" name="password" class="block w-full" />
                        <x-input-label for="password" :value="__('Password')" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="flex mt-6 text-sm">
                        <label class="flex items-center dark:text-gray-400">
                            <input type="checkbox" name="remember" class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple">
                            <span class="ml-2">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="mt-4">
                        <x-primary-button class="block w-full">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </form>

                <hr class="my-8" />

                @if (Route::has('password.request'))
                <p class="mt-4">
                    <a class="text-sm font-medium text-gray-500 hover:underline" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                </p>
                @endif
            </div>
        </div>
    </div>
</x-guest-layout>
