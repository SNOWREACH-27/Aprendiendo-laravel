<x-mail::message>
<h1>Post creado</h1>
<p>El post a sido creado</p>
<x-mail::panel>
<h2>{{ $post->title }}</h2>
</x-mail::panel>
<x-mail::button :url="route('posts.show', $post)" color="green">Ver Post</x-mail::button>
</x-mail::message>
