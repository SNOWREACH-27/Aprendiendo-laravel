<nav class="bg-white shadow-lg">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <!-- Logo -->
        <div class="text-2xl font-bold text-gray-800">
            <a href="#" class="hover:text-gray-600">Mi Logo</a>
        </div>

        <!-- Links -->
        <ul class="flex space-x-8 text-lg font-medium">
            <li><a href="{{route('home')}}" class="text-gray-700 hover:text-gray-500 transition duration-300">Inicio</a></li>
            <li><a href="{{route('posts.index')}}" class="text-gray-700 hover:text-gray-500 transition duration-300">Posts</a></li>
            <li><a href="#" class="text-gray-700 hover:text-gray-500 transition duration-300">Sobre Nosotros</a></li>
            <li><a href="#" class="text-gray-700 hover:text-gray-500 transition duration-300">Contacto</a></li>
        </ul>
    </div>
</nav>
{{$slot}}