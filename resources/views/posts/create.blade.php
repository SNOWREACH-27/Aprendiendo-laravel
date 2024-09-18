<x-app-layout title="Pagina de Post create" content-Information="Model tu sabe">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold mb-4">Crear tu posts</h1>
        <form action="{{ route('posts.store') }}" method="POST" class="space-y-6">
            @csrf
            <div class="space-y-2">
                <label for="title" class="block text-sm font-medium text-gray-700">title</label>
                <input type="text" name="title" id="title"
                    class="mt-1 block w-full border border-gray-300 shadow-sm sm:text-sm rounded-md"
                    value="{{ old('title') }}">
                {{-- el metodo old sirve para cuando mando un formulario y verfica que hay un error, si el error no es del campo donde esta puesto dejara el texto anterior --}}

                {{-- esta directiva muestra el mensaje de error si exite --}}
                @error('title')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="space-y-2">
                <label for="body" class="block text-sm font-medium text-gray-700">body</label>
                <textarea onresize="" name="body" id="body" cols="30" rows="10"
                    class="mt-1 block w-full border border-gray-300 shadow-sm sm:text-sm rounded-md">{{ old('body') }}</textarea>
                {{-- esta directiva muestra el mensaje de error si exite --}}
                @error('body')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit"
                class="w-full bg-blue-500 text-white text-sm font-bold py-2 px-4 rounded">Enviar</button>
        </form>
        <a href="{{ route('posts.index') }}"></a>
    </div>


    {{-- variable errors es la contiene todos los errores ->any() sirve para ver si hay errores y errores->all() los devuelve todos --}}
    {{-- @if ($errors->any()) --}}
    {{-- <div>
            <h2>Errores:</h2>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div> --}}

    {{-- @endif --}}


</x-app-layout>
