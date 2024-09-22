<!DOCTYPE html>
<html>
<head>
    <title>Documento PDF con Múltiples Páginas</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        h1 { color: #3490dc; }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .page-break {
            page-break-before: always; /* Forzar un salto de página */
        }
    </style>
</head>
<body>
    <h1>Primera Página</h1>
    <p>Este es el contenido de la primera página. Dompdf generará múltiples páginas automáticamente si el contenido es demasiado largo.</p>

    <table>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
        </tr>
        <tr>
            <td>Juan Pérez</td>
            <td>juan@example.com</td>
        </tr>
        <tr>
            <td>Ana Gómez</td>
            <td>ana@example.com</td>
        </tr>
    </table>

    <div class="page-break"></div> <!-- Forzar salto de página -->

    <h1>Segunda Página</h1>
    <p>Contenido de la segunda página.</p>

    <table>
        <tr>
            <th>Producto</th>
            <th>Precio</th>
        </tr>
        <tr>
            <td>Producto A</td>
            <td>$10.00</td>
        </tr>
        <tr>
            <td>Producto B</td>
            <td>$20.00</td>
        </tr>
    </table>
    <img src="https://api.nasa.gov/planetary/apod" alt="Imagen de la NASA">
    <div class="page-break"></div> <!-- Otro salto de página -->

    <h1>Tercera Página</h1>
    <p>Este es el contenido de la tercera página.</p>
</body>
</html>
