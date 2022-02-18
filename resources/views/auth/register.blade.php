 
@extends('layouts.header')

@section('title','menu')

@if (Auth::check())
@include('layouts.navbar2')
@else
@include('layouts.navbar')
@endif


@section('content')

            <!-- Validation Errors -->
            <x-auth-validation-errors class="my-5" :errors="$errors" />

            <div class="container w-50 mx-auto my-5">
                <h1 class="text-center mb-5">Register</h1>
                <form method="POST" action=" /register ">
                    @csrf

                    <!-- Name -->

                    <div class="row">
                        <div class="col">
                            <x-label for="name_mei" :value="__('First Name')" />
                            <x-input id="name_mei" class="form-control" type="text" name="name_mei" :value="old('name_mei')" required autofocus />
                        </div>
                        <div class="col">
                            <x-label for="name_sei" :value="__('last Name')" />
                            <x-input id="name_sei" class="form-control" type="text" name="name_sei" :value="old('name_sei')" required />
                        </div>
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-label for="email" :value="__('Email')" />

                        <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required />
                    </div>

                    <!-- Phone Number-->
                    <div class="mt-4">
                        <x-label for="phone" :value="__('Phone Number')" />
                        <div class="row col-12 mx-auto">
                            <x-input id="phone" class="form-control col" type="number" name="phone_number1" :value="old('phone_number1')" required />&nbsp;ー&nbsp; 
                            <x-input id="phone" class="form-control col" type="number" name="phone_number2" :value="old('phone_number2')" required />&nbsp;ー&nbsp;
                            <x-input id="phone" class="form-control col" type="number" name="phone_number3" :value="old('phone_number3')" required />
                        </div>
                    </div>

                    <!-- Post Code -->
                    <div class="mt-4">
                        <x-label for="post" :value="__('Post Code')" />
                        <div class="row col-12 mx-auto">
                            <x-input id="post" class="form-control col" type="number" name="post_code1" :value="old('post_code1')" required />&nbsp;ー&nbsp;
                            <x-input id="post" class="form-control col" type="number" name="post_code2" :value="old('post_code2')" required />
                        </div>
                    </div>

                    <!-- Adress -->
                    <div class="mt-4">
                        <x-label for="adress" :value="__('Adress')" />

                        <x-input id="adress" class="form-control" type="text" name="adress" :value="old('adress')" required />
                    </div>

                    <!-- Birthday -->
                    <div class="mt-4">
                        <x-label for="birthday" :value="__('Date of birth')" />

                        <x-input id="birthday" class="form-control" type="date" name="birthday" :value="old('birthday')" required />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-label for="password" :value="__('Password')" />

                        <x-input id="password" class="form-control"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-input id="password_confirmation" class="form-control"
                                        type="password"
                                        name="password_confirmation" required />
                    </div>

                    <div class="mt-5 text-center">
                        <x-button class="w-25 btn btn-success form-control">
                            {{ __('Register') }}
                        </x-button>
                    </div>
                    <div class="mt-3 text-center">
                        <a class="" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                    </div>
                </form>
                <br><br>
            </div>
            
@endsection

@extends('layouts.footer')