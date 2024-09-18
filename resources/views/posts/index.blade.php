<x-app-layout title="Pagina de Post index" content-Information="Post index">
    <h1 class="text-3xl font-bold mb-2 text-red-600">Lista de posts</h1>
    <a href="/posts/create" class="text-blue-500 mb-3 hover:text-blue-700 hover:underline">Crear un nuevo Post</a>
    <div class="overflow-x-auto">
        <table class="table-auto w-full text-sm">
            <thead>
                <tr>
                    <th class="px-4 py-2">Titulo</th>
                    <th class="px-4 py-2">Cuerpo</th>
                    <th class="px-4 py-2">Fecha</th>
                    <th class="px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts->sortByDesc('created_at') as $post)
                    <tr class="border-b border-gray-300">
                        <td class="px-4 py-2">{{ $post->title }}</td>
                        <td class="px-4 py-2">{{ $post->body }}</td>
                        <td class="px-4 py-2">{{ $post->published_at->format('d/m/Y H:i') }}</td>
                        <td class="px-4 py-2">
                            <a href="{{route('posts.show',$post)}}"
                                class="text-blue-500 hover:text-blue-700 hover:underline transition duration-150 ease-in-out">
                                Ver Post
                            </a>
                            <a href='{{route('posts.edit',$post)}}'
                                class="text-blue-500 hover:text-blue-700 hover:underline">Editar</a>
                            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-red-500 hover:text-red-700 hover:underline transition duration-150 ease-in-out">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $posts->onEachSide(5)->links('pagination::tailwind') }}
    </div>
</x-app-layout>
