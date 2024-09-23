@extends('layouts.app')
@section('title', 'home')
@section('content')

    <nav class="bg-white shadow-lg">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <!-- Logo -->
            <div class="text-2xl font-bold text-gray-800">
                <a href="#" class="hover:text-gray-600">Mi Logo</a>
            </div>

            <!-- Links -->
            <ul class="flex space-x-8 text-lg font-medium">
                <li><a href="{{ route('home') }}" class="text-gray-700 hover:text-gray-500 transition duration-300">Inicio</a>
                </li>
                <li><a href="{{ route('posts.index') }}"
                        class="text-gray-700 hover:text-gray-500 transition duration-300">Post</a></li>
                <li><a href="#" class="text-gray-700 hover:text-gray-500 transition duration-300">Sobre Nosotros</a>
                </li>
                <li><a href="#" class="text-gray-700 hover:text-gray-500 transition duration-300">Contacto</a></li>
            </ul>
        </div>
    </nav>

    <div class="max-w-2xl mx-auto p-4 md:p-6">
        <h1 class="text-3xl font-bold text-gray-900 mb-4">Buenas</h1>
        <p class="text-gray-600 leading-relaxed text-justify">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus odit eos enim magni iste dolor
            sequi
            perspiciatis veniam quod maiores, incidunt veritatis eaque repellendus ullam! Magnam repellat
            necessitatibus

        </p>
        <p class="text-gray-600 leading-relaxed text-justify"
            style="display: flex; align-items: center; justify-content: center;">
            <span id="reloj" style="font-size: 4rem; font-weight: bold; color: rgba(75, 85, 99, 1);"></span>
        </p>
        <script src="{{ asset('js/reloj.js') }}"></script>

        <x-alert2 type="warning">
            <x-slot name=title>
                este es el otro slot prr
            </x-slot>
            Esta alerta es burda de perrona
        </x-alert2>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Logout</button>
        </form>
    </div>
    <p>{{ Auth::user() }}</p>
@endsection
