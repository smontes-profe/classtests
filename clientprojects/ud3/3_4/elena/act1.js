
let numeros = [4.7, 2.3, 9.8, 6.5];

// a) Redondear hacia arriba
let redondeados = numeros.map(Math.ceil);
console.log("a) Redondeados: ", redondeados);

// b) Convertir a strings y mostrar su longitud
let longitudes = numeros.map(n => n.toString().length);
console.log("b) Longitudes: ", longitudes);

// c) Mayor y menor valor
let mayor = Math.max(...numeros);
let menor = Math.min(...numeros);
console.log("c) Mayor: ", mayor, "Menor: ", menor);


// String
let texto = "JavaScript";

// a) Mayúsculas
console.log("a) Mayúsculas: ", texto.toUpperCase());

// b) 4 primeros caracteres
console.log("b) Primeros 4: ", texto.slice(0, 4));

// c) Contiene la letra "S"
console.log("c) Contiene 'S': ", texto.includes("S"));


