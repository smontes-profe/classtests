<?php phpinfo();?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Actividad 2</title>
  </head>
  <body></body>
  <header>
    <h1>Actividad 2</h1>
  </header>
  <body>
    <h2>Parte 1</h2>
    <li>
      <ul>
        Versión de PHP: 8.2.4
      </ul>
      <ul>
        Loaded Configuration File: /Applications/XAMPP/xamppfiles/etc/php.ini

      </ul>
      <ul>
        memory_limit: 512M	
      </ul>
      <ul>
        DOCUMENT_ROOT: /Applications/XAMPP/xamppfiles/htdocs
      </ul>
      
    </li>
    <h4>Datos dinámicos</h4>
    <?php
    $fechaHoraActual = date('d-m-y H:i:s');
    echo "La fecha y hora actual es: " . $fechaHoraActual;
    ?>
    <h2>Parte 2</h2>
        <li>
            <ul>file_uploads: Esta propiedad habilita o deshabilita la capacidad de subir archivos vía HTTP.
                <br>Impacto:
                <br>On: tu aplicación podrá recibir archivos desde formularios.
                <br>Off: $_FILES siempre vacío; cualquier funcionalidad de subida fallará.
            </ul>
            <ul>max_execution_time: Define el tiempo máximo en segundos que un script PHP puede ejecutarse antes de ser detenido por el servidor.
                <br>Impacto:
                <br>Valores bajos (20–60): evitan que procesos colgados consuman CPU.
                <br>Valores altos (90–300): necesarios para tareas pesadas (procesar PDFs, importar CSV grandes).
            </ul>
            <ul>short_open_tag: Permite el uso de etiquetas cortas en lugar de las etiquetas estándar.
                <br>Impacto:
                <br>Off: es más portable y evita conflictos con XML/HTML
                <br>On: ejecutará código con etiquetas cortas antiguas.
            </ul>
        </li>

        <h3>Comparativa propiedades </h3>
          <p>Comparativa de los valores modificados del archivo php.ini</p>       
          <p>Dado los valores modificados, podemos ver el impacto de cada uno de ellos en el apartado de arriba.</p>
          <img src="comparativas.png" alt="Comparativa de datos sobre propiedades."><br><br><br><br><br><br><br><br><br><br>

        <h3>Comparativa php.ini-development y php.ini-production</h3>
        <table border="1" cellspacing="0" cellpadding="6">
  <thead>
    <tr>
      <th>Directiva</th>
      <th>Development (desarrollo)</th>
      <th>Production (producción)</th>
      <th>Comentario</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>display_errors</td>
      <td><b>On</b></td>
      <td><b>Off</b></td>
      <td>Muestra errores en pantalla en desarrollo; en producción se ocultan para no exponer información sensible.</td>
    </tr>
    <tr>
      <td>display_startup_errors</td>
      <td><b>On</b></td>
      <td><b>Off</b></td>
      <td>Controla si se muestran errores durante el arranque de PHP.</td>
    </tr>
    <tr>
      <td>error_reporting</td>
      <td><code>E_ALL</code></td>
      <td><code>E_ALL &amp; ~E_DEPRECATED &amp; ~E_STRICT</code></td>
      <td>En desarrollo se reporta todo; en producción se evitan avisos menos críticos.</td>
    </tr>
    <tr>
      <td>html_errors</td>
      <td><b>On</b></td>
      <td><b>Off</b></td>
      <td>Muestra errores con formato HTML (útil para debug, no recomendable en producción).</td>
    </tr>
    <tr>
      <td>log_errors</td>
      <td><b>On</b></td>
      <td><b>On</b></td>
      <td>En ambos casos se registran errores en logs, pero en producción es la única fuente visible.</td>
    </tr>
    <tr>
      <td>expose_php</td>
      <td><b>On</b></td>
      <td><b>Off</b></td>
      <td>En producción se recomienda desactivar para no revelar la versión de PHP en cabeceras HTTP.</td>
    </tr>
    <tr>
      <td>track_errors (obsoleto)</td>
      <td><b>On</b></td>
      <td><b>Off</b></td>
      <td>Almacena el último error en <code>$php_errormsg</code>; útil al depurar, pero inseguro en producción.</td>
    </tr>
    <tr>
      <td>variables_order / request_order</td>
      <td>Más permisivo</td>
      <td>Más restrictivo</td>
      <td>En producción se fuerza un orden de entrada más seguro y predecible.</td>
    </tr>
  </tbody>
</table>

  </body>
  <footer></footer>
</html>
