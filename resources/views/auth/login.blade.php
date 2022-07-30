<base href="/public">
@extends('layouts.base')
@section('content')

    <x-guest-layout>
        <div class="container" style=" display: flex; align-items: center; margin-top: 100px; flex-direction: column;">
        <x-auth-card>
            <x-slot name="logo">
                <a href="/">
                    <x-application-logo />
                </a>
            </x-slot>
    
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
    
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <div class="container" >
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('login')}}" method="post">
                                @csrf
                                <h2 class="text-success text-center">Login</h2><hr class="text-dark">
                                <div>
                                    <label class="" for="email">Email</label>
                                    <input class="form-control" id="email" type="email" name="email" required autofocus>
                                </div>
                                
                                <div>
                                    <label class="" for="password">Password</label>
                                    <input class="form-control" id="password"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password">
                                </div>
    
                                <div class="mt-2">
                                    <center><button class="btn btn-success" type="submit">Login</button></center>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    
            {{-- <form method="POST" action="{{ route('login') }}">
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
        </div>
    </x-guest-layout>
@endsection
