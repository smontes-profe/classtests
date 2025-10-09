<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$Nombre = "Francisco";
$Apellidos = "Montes Belloso";
$edad = 30;
$edad10 = $edad + 10;
$edad20 = $edad + 20;
$edadx2 = $edad * 2;
echo $edad33 //! Es para comprobar si funciona; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>UD-2 Act-1</title>
</head>
<body>
<div>
<h1>Mostrar la fecha y hora actuales</h1>
<p>
<?php echo "Fecha y hora actuales: " . date("Y-m-d H:i:s"); ?>
</p>
</div>
<div>
<h1>Mostrar los datos</h1>
<p>
<?php
echo "Nombre: " . $Nombre . "<br>";
echo "Apellidos: " . $Apellidos . "<br>";
echo "Edad: " . $edad . "<br>";
?>
</p>
</div>
<div>
<h1>Mostrar Operaciones de la Edad</h1>
<p id="texto1">
<?php
echo "Edad + 10: " . $edad10 . "<br>";
echo "Edad + 20: " . $edad20 . "<br>";
echo "Edad x 2: " . $edadx2 . "<br>";
?>
</p>
</div>
<div>
<h1>Mostar la edad con botones</h1>
<button id="btn10">Hacer pasar 10 años</button>
<button id="btn20">Hacer pasar 20 años</button>
<button id="btnx2">Que pase el doble de años</button>
</div>
<script>
//! Pasar las constantes de PHP a JS 
const edad10 = <?php echo $edad10; ?>;
const edad20 = <?php echo $edad20; ?>;
const edadx2 = <?php echo $edadx2; ?>;
//! Función común para todos los botones
function mostrarResultado(opcion) {
switch (opcion) {
case "10":
document.getElementById("texto1").innerHTML = `Dentro de 10 años tendré ${edad10} años.`;
break;
case "20":
document.getElementById("texto1").innerHTML = `Dentro de 20 años tendré ${edad20} años.`;
break;
case "doble":
document.getElementById("texto1").innerHTML = `El doble de mi edad es ${edadx2} años.`;
break;
}
}
//! Accion para Evento de Botones 
document.getElementById("btn10").addEventListener("click", () => mostrarResultado("10"));
document.getElementById("btn20").addEventListener("click", () => mostrarResultado("20"));
document.getElementById("btnx2").addEventListener("click", () => mostrarResultado("doble"));
</script>


<!-- Puntos Extra -->
<div id="PuntosExtras">
<!--Botón para abrir el video -->
<button id="openVideo">Ver video en grande</button>
<!-- Modal -->
<div id="myModal" class="modal">
<span class="close">&times;</span>
<video class="modal-content" controls>
<source src="https://i.makeagif.com/media/8-31-2019/jZFC03.mp4" type="video/mp4">
Tu navegador no soporta video.
</video>
</div>
<script>
const modal = document.getElementById("myModal");
const btn = document.getElementById("openVideo");
const span = document.querySelector(".close");
btn.onclick = function () {
modal.style.display = "block";
const video = modal.querySelector("video");
video.currentTime = 0; // opcional: empieza desde el principio
video.play(); // esto fuerza que arranque
}
span.onclick = function () {
const video = modal.querySelector("video");
video.pause(); // pausa al cerrar
modal.style.display = "none";
}
window.onclick = function (event) {
if (event.target == modal) {
const video = modal.querySelector("video");
video.pause();
modal.style.display = "none";
}
}
function aplicarEstiloFinal() {
const coloresNeon = ["#FF00FF", "#00FFFF", "#FFFF00", "#FF1493", "#00FF00", "#FF4500"];
let i = 0;
// Limpiamos cualquier intervalo previo
if (window.neonInterval) clearInterval(window.neonInterval);
// Intervalo que cambia los colores cada 500ms
window.neonInterval = setInterval(() => {
document.body.style.backgroundColor = coloresNeon[i];
document.body.style.color = "#FFFFFF"; // texto blanco para contraste
document.body.style.transition = "all 0.3s";
i = (i + 1) % coloresNeon.length;
}, 500);
}
// Evento de cierre del modal
span.onclick = function () {
const video = modal.querySelector("video");
video.pause();
modal.style.display = "none";
aplicarEstiloFinal(); // aplica estilo al cerrar
}
// Clic fuera del modal
window.onclick = function (event) {
if (event.target == modal) {
const video = modal.querySelector("video");
video.pause();
modal.style.display = "none";
aplicarEstiloFinal(); // aplica estilo al cerrar
}
}
// Evento cuando el video termina
const video = modal.querySelector("video");
video.addEventListener("ended", () => {
modal.style.display = "none";
aplicarEstiloFinal(); // aplica estilo cuando termina
});
</script>
</div>
</body>
<style>
/* Estilo del modal */
.modal {
display: none;
position: fixed;



z-index: 1000;
padding-top: 60px;
left: 0;
top: 0;
width: 100%;
height: 100%;
overflow: auto;
background-color: rgba(0, 0, 0, 0.8);
}
.modal-content {
margin: auto;
display: block;
width: 80%;
max-width: 800px;
}
.close {
position: absolute;
top: 20px;
right: 35px;
color: #fff;
font-size: 40px;
font-weight: bold;
cursor: pointer;
}
</style>
</html>