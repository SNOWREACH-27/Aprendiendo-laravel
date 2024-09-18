Route::get('prueba', function () {
$post = Post::find(4)->orderBy('id', 'desc')->select('title', 'body')->take(2)->get();
return $post;
});

<!-- para el eliminar se usa el delete y el find busca por id y el delete elimina el registro, el findOrFail trae el registro y el delete elimina el registro. -->

Route::get('prueba', function () {
$post = Post::find(1);
$post->delete();
return "eliminado";
});
<!-- 
para traer solo unos campos en especifico usamos select('columna1', 'columna2') y el get trae solo los campos seleccionados, con take se traen el numero de registros que queramos. -->

Route::get('prueba', function () {
$post = Post::orderBy('id', 'desc')->select('title', 'body')->take(2)->get();
return $post;
});
<!-- 
con orderby('columna') se ordena por la columna seleccionada, tiene varias configuraciones como asc o desc o random en este caso. -->

Route::get('prueba', function () {
$post = Post::orderBy('id', 'desc')->get();
return $post;
});
<!--     
get por si solo funciona como el método all() trae todos los registros -->

Route::get('prueba', function () {
$post = Post::get();
return $post;
});
<!-- 
buscar todos con filtro en el where('columna', 'operador', 'valor'), con el método get() trae todos. -->

Route::get('prueba', function () {
$post = Post::where('id','>=', 2)->get();
return $post;
});
<!-- 
buscar varios registros -->

Route::get('prueba', function () {
$post = Post::all();
return $post;
});
<!-- 
actualizar un valor en las bases de datos -->
Route::get('prueba', function () {
$post = Post::where('title', 'prueba como estas mi bother')->first();
$post->body = "buenas";
$post->save();
return $post;
});

<!-- busca por columna y valor y el método first trae el primer registro con esa búsqueda -->

Route::get('prueba', function () {
$post = Post::where('title', 'prueba como estas mi bother')->first();
return $post;
});

<!-- buscar por id -->

Route::get('prueba', function () {
$post = Post::find(1);
return $post;
});

<!-- crear varios -->
Route::get('prueba', function () {
for ($i=0; $i < 4; $i++) {
    $post=new Post;
    $post->title = "prueba como estas mi bother $i";
    $post->body = "prueba del cuerpo buenas $i";
    $post->published_at = now();
    $post->save();
    }
    return Post::all();
    });

    <!-- crear un nuevo post -->

    Route::get('prueba', function () {
    $post = new Post;
    $post->title = 'prueba como estas mi bother asdsad ';
    $post->body = 'prueba del cuerpo buenas asdasdasq312';
    $post->save();
    return $post;
    });

    Route::get('/posts/{post}/{categoria?}', [PostController::class, 'show']);

    Route::get('/posts/{post}', function ($post) {
    return "buenas como estas todo bien {$post}";
    });

    <!-- el signo ? lo vuelve opcional -->

    Route::get('/posts/{post}/{categoria?}', function ($post, $categoria = null) {
    if ($categoria) {
    return "buenas como estas todo bien {$post} y de la categoria {$categoria}";
    }
    return "buenas como estas todo bien";
    });

    // el método fallback se encarga de definir la ruta que se va a llamar cuando se ingresa una ruta que no existe en el sistema.
    // En este caso, se redirige a la ruta 'home' que es la ruta principal de la aplicación.
    // De esta forma, si el usuario ingresa una ruta que no existe, se redirigirá a la ruta principal en lugar de mostrar un error.
    Route::fallback(function () {
    return redirect()->route('home');
    });



    <!-- métodos -->

    ->format('d/m/y')
    <!-- para dar formato a fechas -->

    // Model::all() para obtener todos los registros de un modelo
    // Model::find(id) para encontrar un registro por su ID
    // Model::findOrFail(id) para encontrar un registro por su ID o lanzar una excepción si no existe
    // Model::where('campo', 'valor')->get() para obtener registros que cumplen con una condición
    // Model::first() para obtener el primer registro
    // Model::firstOrFail() para obtener el primer registro o lanzar una excepción si no existe
    // Model::create(['campo' => 'valor']) para crear un nuevo registro en la base de datos
    // Model::update(['campo' => 'valor']) para actualizar registros
    // Model::destroy(id) para eliminar un registro por su ID
    // Model::with('relación')->get() para cargar relaciones con los registros
    // Model::orderBy('campo')->get() para ordenar los resultados por un campo específico
    // Model::pluck('campo') para obtener solo un campo específico de todos los registros
    // Model::count() para contar el número de registros
    // Model::exists() para verificar si existen registros que cumplen con las condiciones
    // Model::chunk(cantidad, function($registros) { ... }) para procesar registros en bloques
    // Model::save() para guardar cambios en un modelo
    // Model::delete() para eliminar un modelo
    // Model::forceDelete() para eliminar permanentemente un modelo con soft deletes
    // Model::restore() para restaurar un modelo que ha sido eliminado con soft deletes

    // $faker->name() para generar un nombre completo
    // $faker->firstName() para generar un primer nombre
    // $faker->lastName() para generar un apellido
    // $faker->email() para generar una dirección de correo electrónico
    // $faker->phoneNumber() para generar un número de teléfono
    // $faker->address() para generar una dirección completa
    // $faker->city() para generar el nombre de una ciudad
    // $faker->state() para generar el nombre de un estado
    // $faker->postcode() para generar un código postal
    // $faker->company() para generar el nombre de una compañía
    // $faker->jobTitle() para generar un título de trabajo
    // $faker->sentence() para generar una oración aleatoria
    // $faker->paragraph() para generar un párrafo aleatorio
    // $faker->text($maxNbChars) para generar texto de hasta un número máximo de caracteres
    // $faker->date() para generar una fecha aleatoria
    // $faker->time() para generar una hora aleatoria
    // $faker->dateTime() para generar una fecha y hora aleatoria
    // $faker->randomDigit() para generar un dígito aleatorio (0-9)
    // $faker->randomNumber($nbDigits) para generar un número aleatorio con una cantidad de dígitos específica
    // $faker->boolean() para generar un valor booleano aleatorio
    // $faker->randomElement(['elemento1', 'elemento2']) para seleccionar un elemento aleatorio de un array
    // $faker->uuid() para generar un UUID aleatorio

    // Route::get('ruta', 'controlador@método') para ruta tipo GET
    // Route::post('ruta', 'controlador@metodo') para ruta tipo POST
    // Route::put('ruta', 'controlador@metodo') para ruta tipo PUT
    // Route::patch('ruta', 'controlador@metodo') para ruta tipo PATCH
    // Route::delete('ruta', 'controlador@metodo') para ruta tipo DELETE
    // Route::options('ruta', 'controlador@metodo') para ruta tipo OPTIONS
    // Route::any('ruta', 'controlador@metodo') para aceptar cualquier tipo de verbo HTTP
    // Route::match(['get', 'post'], 'ruta', 'controlador@metodo') para ruta tipo match con múltiples verbos HTTP
    // Route::resource('ruta', 'controlador') para rutas tipo RESOURCE (CRUD completo)
    // Route::apiResource('ruta', 'controlador') para rutas tipo API RESOURCE
    // Route::view('ruta', 'vista') para devolver directamente una vista
    // Route::redirect('ruta', 'ruta2') para redireccionar una ruta a otra
    // Route::name('nombre')->get('ruta', 'controlador@metodo') para asignar un nombre a la ruta
    // Route::prefix('ruta')->group(function() { ... }) para agrupar rutas bajo un prefijo
    // Route::middleware('middleware')->group(function() { ... }) para aplicar middleware a un grupo de rutas
    // Route::fallback('controlador@metodo') para manejar rutas que no coinciden con ninguna definida
    // Route::domain('subdominio.ejemplo.com')->group(function() { ... }) para agrupar rutas bajo un dominio o subdominio específico
    // Route::permanentRedirect('ruta', 'ruta2') para redireccionar permanentemente una ruta (código 301)

    <!-- validation -->

    // 'campo' => 'required' para hacer el campo obligatorio
    // 'campo' => 'string' para validar que el campo es una cadena
    // 'campo' => 'numeric' para validar que el campo es numérico
    // 'campo' => 'email' para validar que el campo es un correo electrónico
    // 'campo' => 'url' para validar que el campo es una URL
    // 'campo' => 'min:valor' para validar que el campo tiene un valor mínimo
    // 'campo' => 'max:valor' para validar que el campo tiene un valor máximo
    // 'campo' => 'between:min,max' para validar que el valor está entre dos límites
    // 'campo' => 'boolean' para validar que el campo es verdadero o falso
    // 'campo' => 'date' para validar que el campo es una fecha
    // 'campo' => 'exists:tabla,columna' para validar que el valor existe en una tabla específica
    // 'campo' => 'unique:tabla,columna' para validar que el valor es único en una tabla
    // 'campo' => 'confirmed' para validar que el campo tiene un campo de confirmación (como password_confirmation)
    // 'campo' => 'regex:/expresión_regular/' para validar con una expresión regular
    // 'campo' => 'in:valor1,valor2' para validar que el campo está dentro de un conjunto de valores
    // 'campo' => 'not_in:valor1,valor2' para validar que el campo no está en un conjunto de valores
    // 'campo' => 'nullable' para permitir que el campo sea nulo
    // 'campo' => 'file' para validar que el campo es un archivo
    // 'campo' => 'image' para validar que el campo es una imagen
    // 'campo' => 'mimes:jpeg,png' para validar tipos de archivo específicos
    // 'campo' => 'size:tamaño' para validar el tamaño de un archivo o número
    // 'campo' => 'digits:valor' para validar que el campo tiene exactamente ese número de dígitos
    // 'campo' => 'active_url' para validar que la URL es accesible
    // 'campo' => 'ip' para validar que el campo es una dirección IP válida

    <!-- REQUEST -->

    // $request->input('campo') para obtener el valor de un campo de la solicitud
    // $request->all() para obtener todos los datos de la solicitud
    // $request->only(['campo1', 'campo2']) para obtener solo campos específicos
    // $request->except(['campo1', 'campo2']) para obtener todos los campos excepto los especificados
    // $request->has('campo') para comprobar si un campo está presente en la solicitud
    // $request->filled('campo') para comprobar si un campo tiene un valor no vacío
    // $request->file('campo') para obtener un archivo de la solicitud
    // $request->isMethod('post') para comprobar si la solicitud es de tipo POST
    // $request->method() para obtener el método HTTP utilizado
    // $request->header('encabezado') para obtener un encabezado específico de la solicitud
    // $request->ip() para obtener la dirección IP del cliente
    // $request->query('parametro') para obtener un parámetro de la URL (GET)

    <!-- RESPONSE -->

    // return response() para devolver una respuesta vacía
    // return response('contenido') para devolver una respuesta con contenido
    // return response()->json(['clave' => 'valor']) para devolver una respuesta en formato JSON
    // return response()->view('vista', ['clave' => 'valor']) para devolver una vista con datos
    // return redirect('ruta') para redirigir a otra ruta
    // return redirect()->route('nombre_ruta') para redirigir a una ruta por nombre
    // return redirect()->back() para redirigir a la página anterior
    // return response()->download('ruta/archivo') para devolver un archivo descargable
    // return response()->streamDownload(function() { ... }, 'archivo.txt') para transmitir una descarga de archivo
    // return abort(404) para devolver un error 404
    // return response()->noContent() para devolver una respuesta vacía con código 204 (sin contenido)
    // return response()->setStatusCode(201) para devolver una respuesta con un código HTTP específico
    // return response()->cookie('nombre', 'valor') para devolver una respuesta con una cookie
    // return response()->file('ruta/al/archivo') para devolver un archivo como respuesta


    // middleware('auth') para restringir el acceso solo a usuarios autenticados
    // middleware('guest') para restringir el acceso solo a usuarios no autenticados
    // middleware('throttle:60,1') para limitar la cantidad de solicitudes a 60 por minuto (control de tasa)
    // middleware('verified') para restringir el acceso solo a usuarios con correos verificados
    // middleware('signed') para requerir que la URL esté firmada para mayor seguridad
    // middleware('bindings') para enlazar automáticamente los modelos a los parámetros de ruta
    // middleware('role:admin') para permitir el acceso solo a usuarios con un rol específico
    // middleware('can:permiso') para verificar permisos específicos mediante políticas de autorización
    // middleware('password.confirm') para requerir que el usuario confirme su contraseña antes de acceder a una ruta
    // middleware('bindings') para enlazar automáticamente parámetros de rutas a modelos de Eloquent
    // middleware('cache.headers:public;max_age=2628000;etag') para configurar los encabezados de caché HTTP
    // middleware('csrf') para proteger las rutas contra ataques CSRF (Cross-Site Request Forgery)