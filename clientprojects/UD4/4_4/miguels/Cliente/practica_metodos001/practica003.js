"use strict";
/**
Tienes un array de objetos con información de productos en una tienda:
const productos = [
  { nombre: "Camisa", precio: 25 },
  { nombre: "Pantalón", precio: 40 },
  { nombre: "Zapatos", precio: 60 },
  { nombre: "Gorra", precio: 15 },
  { nombre: "Chaqueta", precio: 80 }
];

✅ Instrucciones
Filtrar los productos que cuesten más de 30.
Transformar el resultado para obtener un array con solo los nombres de los productos caros.
Mostrar en consola el array final.
*/

const productos = [
  { nombre: "Camisa", precio: 25 },
  { nombre: "Pantalón", precio: 40 },
  { nombre: "Zapatos", precio: 60 },
  { nombre: "Gorra", precio: 15 },
  { nombre: "Chaqueta", precio: 80 },
];

let productosMas30 = productos
  .filter(producto => producto.precio > 30);

console.log(productosMas30);