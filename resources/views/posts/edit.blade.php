<x-app-layout title="Pagina de Post editar" content-Information="Model tu sabe">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold mb-4">Edita el tu posts</h1>
        <form action="{{route('posts.update', $post)}}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div class="space-y-2">
                <label for="title" class="block text-sm font-medium text-gray-700">title</label>
                <input type="text" name="title" id="title"
                    class="mt-1 block w-full border border-gray-300 shadow-sm sm:text-sm rounded-md"
                    value="{{ $post->title }}">
            </div>
            <div class="space-y-2">
                <label for="body" class="block text-sm font-medium text-gray-700">body</label>
                <textarea onresize="" name="body" id="body" cols="30" rows="10"
                    class="mt-1 block w-full border border-gray-300 shadow-sm sm:text-sm rounded-md">{{ $post->body }}
                </textarea>
            </div>
            <button type="submit"
                class="w-full bg-blue-500 text-white text-sm font-bold py-2 px-4 rounded">Enviar</button>
        </form>
        <a href="{{route('posts.index')}}">volver</a>
    </div>
</x-app-layout>
