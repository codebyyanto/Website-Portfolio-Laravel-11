@extends('layouts.app')

@section('title', 'Biodata - Yanto')

@section('content')
    <div class="container mx-auto pt-24 pb-8">
        <x-hero />
        <x-education />
        <x-organization />
        <x-activities />
        <x-projects :projects="$projects" />
        <x-skills :skills="$skills" />
    </div>
@endsection
