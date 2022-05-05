<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="../logonew.png">
            </a>
        </x-slot>

        <!-- Validation Errors -->


        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Имя')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name"  required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Логин')" />

                <x-input id="email" class="block mt-1 w-full" type="text" name="login"  required />
            </div>

                <div class="mt-4">
                    <x-label for="email" :value="__('Телефон')" />

                    <x-input id="email" class="block mt-1 w-full" type="text" name="phone"  required />
                </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Пароль')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Повторить пароль')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Уже зарегестрированы?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Регистрация') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
