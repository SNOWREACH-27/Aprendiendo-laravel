<!-- Tipos de Columnas -->
// $table->bigIncrements('id') para crear un campo auto-incremental de tipo BIGINT (primary key)
// $table->increments('id') para crear un campo auto-incremental de tipo INT (primary key)
// $table->bigInteger('columna') para un campo BIGINT
// $table->integer('columna') para un campo INT
// $table->tinyInteger('columna') para un campo TINYINT
// $table->smallInteger('columna') para un campo SMALLINT
// $table->mediumInteger('columna') para un campo MEDIUMINT
// $table->decimal('columna', 8, 2) para un campo DECIMAL con precisión y escala
// $table->float('columna', 8, 2) para un campo FLOAT con precisión
// $table->double('columna', 15, 8) para un campo DOUBLE con precisión
// $table->string('columna', 255) para un campo VARCHAR (por defecto 255 caracteres)
// $table->char('columna', 4) para un campo CHAR con longitud específica
// $table->text('columna') para un campo TEXT
// $table->mediumText('columna') para un campo MEDIUMTEXT
// $table->longText('columna') para un campo LONGTEXT
// $table->binary('columna') para un campo BLOB
// $table->boolean('columna') para un campo BOOLEANO (true/false)
// $table->enum('columna', ['opcion1', 'opcion2']) para un campo ENUM
// $table->json('columna') para un campo JSON
// $table->jsonb('columna') para un campo JSONB (PostgreSQL)
// $table->date('columna') para un campo DATE
// $table->dateTime('columna') para un campo DATETIME
// $table->time('columna') para un campo TIME
// $table->timestamp('columna') para un campo TIMESTAMP
// $table->timestamps() para crear automáticamente los campos created_at y updated_at
// $table->softDeletes() para crear automáticamente el campo deleted_at para soft deletes
// $table->rememberToken() para crear un campo 'remember_token' para autenticación de usuarios
// $table->uuid('columna') para crear un campo UUID
// $table->foreignUuid('columna')->constrained('otra_tabla') para crear una clave foránea de tipo UUID

<!-- Claves e Índices -->

// $table->primary('columna') para definir la clave primaria
// $table->unique('columna') para definir un índice único
// $table->index('columna') para crear un índice
// $table->foreign('columna')->references('id')->on('otra_tabla') para crear una clave foránea
// $table->foreignId('user_id')->constrained() para crear una relación con otra tabla (foreign key)
// $table->foreignId('columna')->nullable()->constrained() para permitir valores nulos en una clave foránea
// $table->dropColumn('columna') para eliminar una columna
// $table->dropPrimary('columna') para eliminar la clave primaria
// $table->dropUnique('columna') para eliminar un índice único
// $table->dropIndex('columna') para eliminar un índice
// $table->dropForeign('columna') para eliminar una clave foránea

<!-- Modificadores de Columnas -->

// $table->nullable() para permitir que el campo acepte valores nulos
// $table->default('valor') para definir un valor por defecto
// $table->unsigned() para declarar un entero sin signo (solo positivo)
// $table->autoIncrement() para hacer que un campo se auto-incremente
// $table->useCurrent() para establecer el valor actual como predeterminado en un campo de fecha/hora
// $table->change() para modificar una columna existente
// $table->after('otra_columna') para posicionar una columna después de otra
// $table->first() para colocar una columna al principio de la tabla
// $table->comment('comentario') para añadir un comentario a la columna

<!-- Relación de Claves Foráneas Simplificada -->

// $table->foreignId('user_id')->constrained('users') para crear una relación de clave foránea con la tabla 'users'
// $table->foreignId('columna')->constrained()->onDelete('cascade') para eliminar en cascada cuando se elimina el registro padre
// $table->morphs('nombre') para crear los campos necesarios para relaciones polimórficas (morphable_id y morphable_type)