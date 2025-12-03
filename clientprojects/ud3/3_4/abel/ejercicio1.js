/*
Dado el array de números [4.7, 2.3, 9.8, 6.5]:

a) Redondea todos los números hacia arriba usando una función predefinida.

b) Convierte todos los números a strings y muestra su longitud.

c) Calcula el mayor y el menor valor usando funciones Math.
*/

let numeros = [4.7, 2.3, 9.8, 6.5];

//a
let redondeo = numeros.map(Math.ceil);
console.log("Números redondeados hacia arriba:", redondeo);

//b
let long = numeros.map(num => num.toString().length);
console.log("Longitud de cada número como string:", long);

//c
let mayor = Math.max(...numeros);
let menor = Math.min(...numeros);
console.log("Mayor valor:", mayor);
console.log("Menor valor:", menor);


/*
Dado el string "JavaScript":

a) Convierte todas las letras a mayúsculas.

b) Obtén los 4 primeros caracteres usando un método de string.

c) Verifica si contiene la letra "S" (mayúscula).
*/

let texto = "JavaScript";

//a
let mayus = texto.toUpperCase();
console.log("Texto en mayúsculas:", mayus);

//b
let primeros4 = texto.slice(0, 4);
console.log("Primeros 4 caracteres:", primeros4);

//c
let tieneS = texto.includes("S");