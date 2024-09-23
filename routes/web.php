<?php

use App\Models\User;
use App\Models\Post1;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\ValidationException;

// cambiar la ruta principal
// php artisan key:regenerate sirve para cambiar la llave de la aplicación
Route::get('/pdf', function () {
    $data = []; // Datos para pasar a la vista, si los hay

    $pdf = Pdf::loadView('vistapdf', $data);
    $pdf->setPaper('A4', 'portrait'); // Ajusta el tamaño del papel y la orientación

    return $pdf->stream('archivo.pdf'); // STREAM Para ver el PDF en el navegador, o download() para descargarlo
});

Route::get('/fetch', function () {
    try {
        $response = Http::get('https://pokeapi.co/api/v2/pokemon/?limit=600'); // Ajusta el límite según lo que necesites
        $pokemons = [];
        foreach ($response->json()['results'] as $pokemon) {
            $pokemons[] = $pokemon['name'];
        }
        return response()->json($pokemons, 200);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Ocurrió un error inesperado'], 500);
    }
});
// -> gets de las rutas login y register
Route::get("/login", function () {
    return response()->view('login.login');
})->name('login');
Route::get("/register", function () {
    return response()->view('register.register');
})->name('register');

// -> post de las rutas login y register
Route::post("/login", function () {
    // en RouteServiceProvider en la const home para poner la route donde te va a mandar si estas logged
    // session en expire_on_close se se pone si se cierra la sesión al cerrar el navegador
    // cambiar el driver en producción
    // en session en lifetime, es el tiempo de vida de una session también se puede cambiar en config/session.php o en las .env
    // filled se encarga de validar que el campo no este vacío y que si viene el checkbox del fronted con "on" lo pase a true y si no viene lo pase a false
    $credentials = request()->validate(
        // unique para único y exist para existe
        [
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required'],
        ],
    );
    $remember = request()->filled('remember');

    //  el segundo valor del Auth es para el remember me
    if (Auth::attempt($credentials, $remember)) {
        // session fixation -> refrescar el token y session
        request()->session()->regenerate();
        // -> intended() sirve para si el usuario antes intento acceder a una route protegida, luego del log, se dirigirá a ella
        return view('home');
    }    // otra manera de poner los mensajes de validation
    throw ValidationException::withMessages([
        // mensaje de que el email o la password son incorrectos
        'email' => __('auth.failed'),
    ]);
})->name('login.login');

Route::post("/register", function () {
    User::create([
        'name' => 'prueba',
        'email' => request('email'),
        'password' => bcrypt(request('password')),
    ]);
    return redirect('/login');
    // Auth::login($user); // Iniciar sesión automáticamente

})->name('register.register');

Route::post('/logout', function () {
    Auth::logout();  // Cierra la sesión del usuario
    request()->session()->regenerateToken();
    return redirect('/');  // Redirige al usuario a la página de inicio u otra ruta
})->name('logout');


Route::get('/prueba', function () {

    $post = Post1::find(1);
    $post->comments()->create([
        'content' => 'un comentario de prueba se a creado'
    ]);

    // $buenas = User::create([
    //     'name' => 'prueba',
    //     'email' => 'prueba@gmail.com',
    //     'password' => bcrypt('12345'),
    // ]);
    // $buenas = Phone::create([
    //     'number' => '12345622789',
    //     'user_id' => 12
    // ]);
    // $buenas = User::where('id',12)->with('phone')->first();
    // return $buenas;
});



// localización con php artisan lang:publish saca las diferentes respuestas de la carpeta lang
// si copias la carpeta en y le cambias el nombre a es puedes cambiar los idiomas bien, pero mejor es usar el paquete laravel langs
// también se puede hacer las traducciones con un json como es.json
// ejem: {{__("client")}} se busca con {{__{{"client"}}}}

// para cuando en una ruta se usa {valor?} que sea opcional se usa el signo ? y a la hora de usarlo como parámetro si no viene con nada devuelve null ejem: public function store($post, $categoria = null)
// si no se usa el name para nombrar las rutas se usa el nombre de la uri ejem: {{/posts}} en vez de {{/posts/index}} o {{route('posts.index')}}

Route::get('/', homeController::class)->name('home');

// usando el ->except() para restringir las rutas que se van a usar, el only() para restringir que solo las rutas que se le pase se usen, el names() para darle un nombre a las rutas, con parameters() para darle un parámetro a las rutas, con apiresource() para darle un controlador a las rutas.
// funciona bien para crear el crud y simplificar el código.
// Route::resource('articulos', PostController::class)->names('posts')->parameters(['articulos' => 'post']);

Route::resource('posts', PostController::class);
// routes/web.php

Route::get('/hora', function () {
    return response()->json(['hora_utc' => now()->utc()->format('H:i:s')]);
});

Route::get('/video', function () {
    $path = storage_path('app/videos/v.mp4');

    if (!file_exists($path)) {
        abort(404);
    }

    $file = fopen($path, 'rb');
    $response = Response::make(fread($file, filesize($path)), 200);
    $response->header('Content-Type', 'video/mp4');

    return $response;
});
Route::get('/videos', function () {
    return view('video
    ');
});

// Route::get('/posts/index', [PostController::class, 'index'])->name('posts.index');
// Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
// Route::post('/posts/create', [PostController::class, 'store'])->name('posts.store');
// Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
// Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
// Route::put('/posts/{post}/edit', [PostController::class, 'updateEdit'])->name('posts.update');
// Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

// Route::get('prueba', function () {
//     $post = Post::find(1);
//     return response()->json($post, 200);
// });

//dd() funciona para poder ver los datos de la variable en un modo depurador. 

// Route::get('prueba', function () {
//     $post = Post::find(3);
//     return $post->created_at->format("Y-m-d H:i:s");
// });

Route::get('model', function () {
    return view('model');
});
Route::fallback(function () {
    return redirect()->route('home');
});
