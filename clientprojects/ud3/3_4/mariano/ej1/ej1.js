"use strict"

// Array de números
const numeros = [4.7, 2.3, 9.8, 6.5];
console.log("Array original:", numeros);

// a) Redondea todos los números hacia arriba
const redondeados = numeros.map(num => Math.ceil(num));
console.log("a) Redondeados hacia arriba:", redondeados);

// b) Convierte todos los números a strings y muestra su longitud
const strings = numeros.map(num => num.toString());
const longitudes = strings.map(str => str.length);
console.log("b) Convertidos a strings:", strings);
console.log("   Longitud de cada string:", longitudes); 

// c) Calcula el mayor y el menor valor usando Math
const mayor = Math.max(...numeros);
const menor = Math.min(...numeros);
console.log("c) Mayor valor:", mayor); 
console.log("   Menor valor:", menor); 


// String "JavaScript"

const texto = "JavaScript";
console.log("\nTexto original:", texto);

// a) Convierte todas las letras a mayúsculas
const mayus = texto.toUpperCase();
console.log("a) En mayúsculas:", mayus); 

// b) Obtén los 4 primeros caracteres
const primeros4 = texto.substring(0, 4);
console.log("b) Primeros 4 caracteres:", primeros4); 

// c) Verifica si contiene la letra 'S' (mayúscula)
const contieneS = texto.includes("S");
console.log("c) ¿Contiene la letra 'S'?:", contieneS); 
