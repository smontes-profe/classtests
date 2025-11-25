let numeros = [4.7, 2.3, 9.8, 6.5];

let redondeados = numeros.map(n => Math.ceil(n));
console.log(redondeados);

let comoTexto = numeros.map(n => n.toString());
let longitudes = comoTexto.map(t => t.length);
console.log(longitudes);

let mayor = Math.max(...numeros);
let menor = Math.min(...numeros);
console.log(`Mayor: ${mayor}, Menor: ${menor}`);

let palabra = "JavaScript";

console.log(palabra.toUpperCase());

console.log(palabra.substring(0, 4));

console.log(palabra.includes("S"));