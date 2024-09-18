<?php

namespace App\Http\Controllers;
use App\Models\Post;
use \Illuminate\Support\Str;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {   
        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'slug' => Str::slug($request->title) . '-' . substr(Str::uuid()->toString(), 0, 8),
            'published_at' => now()
        ]);

        // Str::slug() es un helper de Laravel que convierte un string en una cadena amigable para urls.
            // El primer parámetro es el string que se va a convertir y el segundo parámetro es el separador que se va a usar.
            // En este caso, estamos utilizando el guión (-) como separador.
            // Str::uuid() es un helper de Laravel que genera un UUID (Universally Unique Identifier) versión 4.
            // Un UUID es un identificador único que se utiliza para identificar objetos en una base de datos.
            // En este caso, estamos utilizando el UUID para generar un slug único para cada post.

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
        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'updated_at' => now()
        ]);
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
