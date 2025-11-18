let numeros = [4.7, 2.3, 9.8, 6.5];

// a) Redondear hacia arriba
let redondeados = numeros.map(n => Math.ceil(n));
console.log(redondeados); // [5, 3, 10, 7]

// b) Convertir a strings y mostrar longitud
let longitudes = numeros.map(n => n.toString().length);
console.log(longitudes);

// c) Mayor y menor valor
let maximo = Math.max(...numeros);
let minimo = Math.min(...numeros);
console.log(maximo, minimo); // 9.8 2.3


// String: "JavaScript"
let texto = "JavaScript";

// a) Mayúsculas
console.log(texto.toUpperCase());

// b) 4 primeros caracteres
console.log(texto.substring(0, 4)); // "Java"

// c) Verificar si contiene "S"
console.log(texto.includes("S")); // true
