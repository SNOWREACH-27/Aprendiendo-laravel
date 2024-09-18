<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    // En Laravel, la convención es que el nombre de la tabla sea plural y el nombre de la clase sea singular.
    // Si no se especifica explícitamente qué tabla se va a usar, se asume que el nombre de la tabla es el nombre de la clase del modelo en plural.
    protected $table = 'post';
    //con fillable se especifican los atributos que se pueden insertar en la base de datos con asignación masiva.
    protected $fillable = [
        'title',
        'body',
        'published_at',
        'slug'
    ];
    
    // El atributo $hidden se utiliza para especificar qué columnas del modelo NO se incluirán en la serialización de JSON.
    // Por otro lado, el atributo $guarded se utiliza para especificar qué columnas del modelo NO se podrán asignar en masa.
    // Por defecto, el valor de $guarded es un array vacío, lo que significa que se pueden asignar en masa todas las columnas.
    // Por otro lado, el valor predeterminado de $hidden es un array que contiene las columnas 'password', 'remember_token' y 'created_at' y 'updated_at'.
    // Si se desea ocultar columnas extras, se pueden agregar a este array.
    protected $hidden = [ 'created_at', 'updated_at'];
    protected $guarded = ['created_at','isAlive'];
    
    // el set es un mutator, es decir, una función que se encarga de modificar el valor de un atributo antes de guardarlo en la base de datos.
    // el get es un accessor, es decir, una función que se encarga de modificar el valor de un atributo antes de devolverlo.
    protected function title(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => strtoupper($value),
            get: fn ($value) => strtoupper($value)
        );
    }
    
    // Esta función se encarga de definir los castings que se van a utilizar en el modelo.
    // Un casting es una función que se encarga de modificar el valor de un atributo antes de guardarlo en la base de datos o antes de devolverlo.
    // En este caso, estamos definiendo que el atributo published_at se va a casting a un objeto de tipo DateTime.
    //
    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
            'isAlive' => 'boolean'
        ];
    }
    
    public function getRouteKeyName()
    {
        return 'slug';
    }

}
