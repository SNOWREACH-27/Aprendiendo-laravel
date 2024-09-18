<x-app-layout title="Pagina de video" content-Information="Post index">
    <div class="flex items-center justify-center w-full h-screen bg-gray-200 dark:bg-gray-800">
        <video controls class="w-full h-full max-w-3xl max-h-[70vh] rounded-lg overflow-hidden shadow-lg">
            <source src="{{ asset('video/v.mp4') }}" type="video/mp4">
            Tu navegador no soporta el formato de video.
        </video>
    </div>
</x-app-layout>


