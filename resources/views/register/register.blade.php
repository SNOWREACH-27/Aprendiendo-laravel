<x-app-layout title="Pagina de Registro" content-Information="Model tu sabe">
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="max-w-md w-full space-y-8 p-10 bg-white rounded-xl shadow-lg">
            <div class="text-center">
                <h2 class="mt-6 text-3xl font-bold text-gray-900">
                    Registro
                </h2>
            </div>
            <form action="{{ route('register.register') }}" method="POST" class="mt-8 space-y-6">
                @csrf
                @method('POST')
                <label for="email" class="block">
                    <p class="text-sm font-medium text-gray-700">Email</p>
                    <input type="text" name="email" id="email" placeholder="email"
                        class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                </label>
                <label for="password" class="block">
                    <p class="text-sm font-medium text-gray-700">Contraseña</p>
                    <input type="password" name="password" id="password" placeholder="123456789"
                        class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                </label>
                <div class="flex-wrap items-center justify-between">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember"
                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-900">
                            Recuérdame
                        </label>
                    </div>

                    <div class="text-sm">
                        <a href="{{route('login')}}" class="font-medium text-indigo-600 hover:text-indigo-500">
                            Iniciar Seccion
                        </a>
                        

                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                        Crear cuenta
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
