/*Ejercicio 1: Funciones predefinidas y manipulación básica
Objetivo: Practicar funciones predefinidas de JavaScript.

Dado el array de números [4.7, 2.3, 9.8, 6.5]:

a) Redondea todos los números hacia arriba usando una función predefinida.

b) Convierte todos los números a strings y muestra su longitud.

c) Calcula el mayor y el menor valor usando funciones Math.

Dado el string "JavaScript":

a) Convierte todas las letras a mayúsculas.

b) Obtén los 4 primeros caracteres usando un método de string.

c) Verifica si contiene la letra "S" (mayúscula).

Puntuación: 1. */



const nums = [4.7, 2.3, 9.8, 6.5];


const redondeados = nums.map(Math.ceil);


const long = nums.map(n => n.toString().length);

const max = Math.max(...nums);
const min = Math.min(...nums);

const texto = "JavaScript";



const mayus = texto.toUpperCase();


const prim4 = texto.slice(0, 4);


const contieneS = texto.includes("S");