<x-app-layout title="Pagina de Post show" content-Information="Model tu sabe">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold mb-4">Number: {{ $post->id }}</h1>
        <h2 class="text-2xl font-semibold mb-4">{{ $post->title }}</h2>
        <p class="text-lg">{{ $post->body }}</p>
        <a href="{{route('posts.index')}}" class="text-blue-500 hover:text-blue-700 hover:underline">volver</a>
        
    </div>
</x-app-layout>