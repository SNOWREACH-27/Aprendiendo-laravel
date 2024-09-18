<?php

namespace App\Http\Controllers;

use App\Models\Post;
use \Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    // la función with() es un método que se utiliza para pasar variables a la vista
    // en este caso, estamos pasando la variable $posts a la vista 'posts.index'
    // la variable se llama 'posts'
    // Otra forma de pasar variables a la vista es utilizando el método compact()
    // que devuelve un array asociativo con las variables que se le pasan como parámetros

    public function index()
    {
        // ->paginate(5) es el número de registros que se mostrará por página.
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('posts.index')->with('posts', $posts);
    }

    public function create()
    {
        return view('posts.create');
    }
    // también funciona con compact('post', 'categoria') esto crea un array.
    // en vez de hace la búsqueda con find($post) se puede hacer poniendo Post $post en la variable de la función show.
    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }
    // al crear el StorePostRequest.php para las validaciones que vienen de laravel ya no se usa el Request $request ahora se usa el StorePostRequest $request
    public function store(StorePostRequest $request)
    {
        Post::create(attributes: [
            'title' => $request->title,
            'body' => $request->body,
            'slug' => Str::slug($request->title) . '-' . substr(Str::uuid()->toString(), 0, 8),
            'published_at' => now()
        ]);
        // unique:posts,slug,{{$posts->id}} busca en la base de datos si el valor a poner es único.
        // Busca en la tabla 'posts' si el valor de la columna 'slug' es igual al valor que se va a poner.
        // Si se pone el tercer valor, se excluye ese registro de la búsqueda, en este caso el registro con el id que se le pasa como parámetro.
        // En caso de que no se pase el tercer valor, se busca si el valor es único en toda la tabla.
        // se pueden separar por , o por | 
        // slug es la palabra clave que se va a usar para hacer la búsqueda en un uri;
        // el primer array reglas de validación, el segundo array mensajes de error y el tercero array atributos
        // $request->validate(
        //     [
        //         'title' => 'required|min:5|max:100',
        //         'body' => 'required'
        //     ],
        //     [
        //         'title.required' => 'El campo :attribute es obligatorio.',
        //         'title.min' => 'El campo :attribute debe tener al menos :min caracteres.',
        //         'title.max' => 'El campo :attribute debe tener como máximo :max caracteres.',
        //         'body.required' => 'El campo :attribute es obligatorio.',
        //     ],
        //     [
        //         'title' => 'título del post',
        //         'body' => 'cuerpo del post'
        //     ]
        // );
        
        // asignación masiva
        // Post::create($request->all());

        // Str::slug() es un helper de Laravel que convierte un string en una cadena amigable para urls.
        // El primer parámetro es el string que se va a convertir y el segundo parámetro es el separador que se va a usar.
        // En este caso, estamos utilizando el guión (-) como separador.
        // Str::uuid() es un helper de Laravel que genera un UUID (Universally Unique Identifier) versión 4.
        // Un UUID es un identificador único que se utiliza para identificar objetos en una base de datos.
        // En este caso, estamos utilizando el UUID para generar un slug único para cada post.

        // asignación por valor;
        // $post = new Post();
        // $post->title = $request->title;
        // $post->body = $request->body;
        // $post->slug = $request->title . "12";
        // $post->published_at = now();
        // $post->save();
        return redirect()->route('posts.index');
    }
    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post
        ]);
    }
    public function update(Request $request, Post $post)
    {

        $request->validate([
            'title' => 'required|min:5|max:100',
            'body' => 'required'
        ]);
        $post->update(request()->only('title', 'body') + ['updated_at' => now()]);
        // $post->update([
        //     'title' => $request->title,
        //     'body' => $request->body,
        //     'updated_at' => now()
        // ]);
        /* The code `->update([...])` is updating the specified attributes of the `` object
        in the database. In this case, it is updating the `title`, `body`, and `updated_at` fields
        of the `` model with the values provided in the ``. */
        // $post->title = $request->title;
        // $post->body = $request->body;
        // $post->updated_at = now();
        // $post->save();
        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
