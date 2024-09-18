<x-app-layout title="Models" content-Information="Model tu sabe">
    <p class="text-lg font-bold mb-4">Accesors</p>
    <p class="text-gray-600 mb-8">
        Son métodos que se pueden llamar en el modelo y que se encargan de modificar el valor de un atributo antes de devolverlo.
        Por ejemplo, si se necesita mostrar una fecha en un formato determinado, se puede crear un accessor que formatee la fecha.
        Los Accesors deben llamarse con el prefijo get y el nombre del atributo, por ejemplo: getNombreCompletoAttribute.
    </p>

    <p class="text-lg font-bold mb-4">Mutators</p>
    <p class="text-gray-600 mb-8">
        Son métodos que se pueden llamar en el modelo y que se encargan de modificar el valor de un atributo antes de guardarlo en la base de datos.
        Por ejemplo, si se necesita que el atributo password se encripte antes de guardarlo, se puede crear un mutador que lo haga.
        Los mutadores deben llamarse con el prefijo set y el nombre del atributo, por ejemplo: setPasswordAttribute.
    </p>

    <p class="text-lg font-bold mb-4">Relaciones</p>
    <p class="text-gray-600 mb-8">
        Son métodos que se pueden llamar en el modelo y que se encargan de obtener los registros de una tabla relacionada.
        Por ejemplo, si se tiene una tabla users y una tabla posts, se puede crear una relación en el modelo User que obtenga todos los posts de un usuario.
        Las relaciones deben llamarse con el prefijo has y el nombre del atributo, por ejemplo: hasManyPosts.
    </p>

    <p class="text-lg font-bold mb-4">Scopes</p>
    <p class="text-gray-600 mb-8">
        Son métodos que se pueden llamar en el modelo y que se encargan de filtrar los registros de la base de datos.
        Por ejemplo, si se necesita obtener todos los usuarios que tengan una edad mayor de 18 años, se puede crear un scope que lo haga.
        Los scopes deben llamarse con el prefijo scope y el nombre del atributo, por ejemplo: scopeAdultos.
    </p>

    <p class="text-lg font-bold mb-4">Casts</p>
    <p class="text-gray-600 mb-8">
        Son métodos que se pueden llamar en el modelo y que se encargan de convertir el valor de un atributo en un tipo de datos determinado.
        Por ejemplo, si se necesita que el atributo created_at se guarde como un timestamp, se puede crear un cast que lo haga.
        Los casts deben llamarse con el prefijo cast y el nombre del atributo, por ejemplo: castCreatedAt.
    </p>

    <p class="text-lg font-bold mb-4">Observers</p>
    <p class="text-gray-600">
        Son métodos que se pueden llamar en el modelo y que se encargan de realizar acciones cuando se guardan o eliminan registros.
        Por ejemplo, si se necesita enviar un correo electrónico cuando se crea un nuevo usuario, se puede crear un observer que lo haga.
        Los observers deben llamarse con el prefijo observe y el nombre del atributo, por ejemplo: observeUserCreated.
    </p>
</x-app-layout>