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

        <!-- Admin Shortcut Buttons -->
        <div class="flex justify-center gap-4 mt-12 mb-8">
            <a href="{{ route('admin.projects.index') }}" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-full shadow-lg transition-transform transform hover:scale-105 flex items-center">
                <i class="fas fa-project-diagram mr-2"></i> Kelola Project
            </a>
            <a href="{{ route('admin.skills.index') }}" class="px-6 py-2 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-full shadow-lg transition-transform transform hover:scale-105 flex items-center">
                <i class="fas fa-star mr-2"></i> Kelola Keahlian
            </a>
        </div>
    </div>
@endsection
