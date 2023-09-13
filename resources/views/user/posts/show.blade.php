@extends('layouts.main')

@section('page.title', "Просмотр поста")

@section('main.content')
    <x-title>
        {{ __('Просмотр поста.') }}
    </x-title>

    <h2 class="h4">
        {{ $post->title }}
    </h2>

    <div class="small text-muted">
        {{ now()->format('d.m.Y H:i:s') }}
    </div>

    <div class="pt-3">
        {!! $post->content !!}
    </div>

@endsection
