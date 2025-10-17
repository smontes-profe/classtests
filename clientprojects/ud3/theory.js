// function multiplicarpor2(numero, callback) {
//     const resultado = numero * 2;
//     callback(resultado);
// }

// function mostrarResultado(valor) {
//     console.log("El resultado es: " + valor);
// }

// // Aquí usamos una función flecha dentro de multiplicarpor4 
// function multiplicarpor4(numero, callback) {
//     multiplicarpor2(numero, (resultado1) => {
//         multiplicarpor2(resultado1, (resultado2) => {
//             callback(resultado2);
//         });
//     });
// }
// multiplicarpor2(5, mostrarResultado); // El resultado es: 10
// multiplicarpor4(5, mostrarResultado); // El resultado es: 20

// let numeros = [10, 20, 30, 40];

// // for tradicional
// for (let i = 0; i < numeros.length; i++) {
//     console.log(numeros[i]);
// }

// // for...of
// for (let num of numeros) {
//     console.log(num);
// }

// // forEach
// numeros.forEach(function(num, index) {
//     console.log(`Índice ${index}: ${num}`);
// });

// // forEach con flecha
// numeros.forEach(num => console.log(num * 2));

// // Transformar objetos
// let usuarios = [
//     { nombre: "Ana", edad: 25 },
//     { nombre: "Luis", edad: 30 }
// ];

// let nombres = usuarios.map(u => u.nombre);
// console.log(nombres); // ["Ana", "Luis"]

// // Formatear strings
// let palabras = ["hola", "mundo"];
// let mayusculas = palabras.map(p => p.toUpperCase());
// console.log(mayusculas); // ["HOLA", "MUNDO"]
// mayusculas.forEach(p => console.log(p));

const personas = [
 {edad: 25}, {edad: 30}, {edad: 25}
];
const grupos = personas.reduce(
 (acc, p) => {
  acc[p.edad] = (acc[p.edad] || 0) + 1;
  return acc;
 }, {}
);
console.log(grupos); // { '25': 2, '30': 1 }

// Orden alfabético
let nombres = ["Carlos", "Ana", "Luis"];
nombres.sort();
console.log(nombres); // ["Ana", "Carlos", "Luis"]