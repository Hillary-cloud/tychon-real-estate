<base href="/public">
@extends('layouts.base')
@section('content')
<br><br><br>
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <div class="container" style=" display: flex; margin-top: 5%; align-items: center; flex-direction: column;">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('login')}}" method="POST">
                            @csrf
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control m-2" :value="old('email')" required autofocus >
                            <label for="password">Password</label>
                            <input id="password" class="form-control m-2"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
                            <label for="remember_me">Remember me</label>
                            <input type="checkbox" name="remember" class="form-control mt-2">
                            @if (Route::has('password.request'))
                            <a class="btn btn-primary" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                            @endif
                            <button class="btn btn-success" type="submit">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

{{-- 
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
         
        </form> --}}
    </x-auth-card>
</x-guest-layout>
@endsection
