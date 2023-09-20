@extends('layouts.auth')

@section('page.title', "Страница регистрации")


@section('auth.content')
    <x-card>

        <x-card-header>
            <x-card-title>
                {{ __('Регистрация') }}
            </x-card-title>

            <x-slot name="right">
                <a href="{{ route('login') }}">
                    {{ __('Вход') }}
                </a>
            </x-slot>
        </x-card-header>

        <x-card-body>
            <x-errors/>

            <x-form action="{{ route('register.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <x-form-item class="mb-3">
                    <x-label required>{{__('Имя')}}</x-label>
                    <x-input name="name" autofocus/>
                </x-form-item>

                <x-form-item class="mb-3">
                    <x-label required>{{__('Email')}}</x-label>
                    <x-input type="email" name="email" />
                </x-form-item>

                <x-form-item class="mb-3">
                    <x-label required>{{__('Пароль')}}</x-label>
                    <x-input type="password" name="password"/>
                </x-form-item>

                <x-form-item class="mb-3">
                    <x-label required>{{__('Пароль еще раз')}}</x-label>
                    <x-input type="password" name="password_confirmation"/>
                </x-form-item>

                <x-form-item class="mb-3">
                    <x-checkbox name="agreement" >
                        {{ __('Я согласен на обработку пользовательских данных') }}
                    </x-checkbox>
                </x-form-item>

                <x-button type="submit" color="success">{{ __('Войти') }}</x-button>
            </x-form>
        </x-card-body>
    </x-card>
@endsection
