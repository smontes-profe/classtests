<?php
header("Expires: Tue, 01 Jan 1980 00:00:00 GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false); 
header("Pragma: no-cache");

echo "<h1>Esta página fuerza al navegador a solicitar el contenido al servidor en cada visita.</h1>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>evitar_cache.php</title>
</head>
<body>
    <div id="explicacion">
        <p>Recarga la página y mira la columna <strong>Status / Estado</strong>:</p>
        <ul>
        <li><strong>Si dice 200</strong> → el navegador pidió la página al servidor.<br>
            • <strong>200</strong> es un código HTTP que significa: "El servidor respondió correctamente con el contenido solicitado".<br>
            • Cuando el navegador pide la página al servidor, este envía la respuesta con 200 y el contenido.<br>
            • Si la página se carga desde la caché del navegador, no se hace la petición completa y puede aparecer 304 o (from cache).</li>

        <li><strong>Si dice (from cache)</strong> → se está usando caché.</li>
        </ul>

        <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
            <th>Estado</th>
            <th>Qué pasa</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td>200 OK</td>
            <td>El navegador pidió la página al servidor y el servidor la devolvió.</td>
            </tr>
            <tr>
            <td>304 Not Modified</td>
            <td>El navegador preguntó al servidor si había cambios; como no los hay, reutiliza caché.</td>
            </tr>
            <tr>
            <td>(from cache)</td>
            <td>El navegador no pidió nada al servidor; simplemente usó la copia guardada.</td>
            </tr>
        </tbody>
        </table>
    </div>
    <div id="imagen">
        <img src="../assets/image.png" alt="example">
        <p>Explicación obtenida mediante chatGPT.</p>
    </div>

    <style>
        #imagen{
            display:flex;
            flex-direction:column;
            align-items:center;
        }
        img{
            width: 90vw;
            padding: 10px 0px;
        }
    </style>
</body>
</html>