'use strict';

/**
 * Tu Misión (en script.js):
Escribe el código para seleccionar y guardar en una variable:
El elemento que tiene el ID "logo".
1. Todos los elementos que tienen la clase "menu-item".
2. El primer párrafo (<p>) que se encuentre dentro del <article>.
3. Todos los enlaces (<a>) que están dentro de la etiqueta <nav>.4.
 */


const elementoLogo = document.getElementById("logo");
const elementosMenu = document.getElementsByClassName("menu-item");

const parrafoPrimero = document.querySelector('article p');

const enlacesHTML = document.querySelectorAll('nav a');


