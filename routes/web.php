<?php
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\homeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Response;
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
