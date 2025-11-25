//Array
let numeros = [4.7, 2.3, 9.8, 6.5];

//Redondeo hacia arriba 
let redondeados = numeros.map(n => Math.ceil(n));
console.log("Redondeados:", redondeados);

//Convierto a string y muestro la longitud
let comoTexto = numeros.map(n => n.toString());
let longitudes = comoTexto.map(t => t.length);
console.log("Textos:", comoTexto);
console.log("Longitudes:", longitudes);

//Calculo el mayor y el menor
let mayor = Math.max(...numeros);
let menor = Math.min(...numeros);
console.log("Mayor:", mayor, "Menor:", menor);

//String:
let palabra = "JavaScript";

//Convierto las letras a mayusculas
console.log("Mayusculas:", palabra.toUpperCase());

//Muestro los primeros 4 caracteres
console.log("Primeros 4:", palabra.substring(0, 4));

//Verifico si tiebne la letra s
console.log("Contiene S:", palabra.includes("S"));