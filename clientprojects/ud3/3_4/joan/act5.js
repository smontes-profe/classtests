/* Ejercicio 5: Gestión de Inventario con funciones avanzadas
Objetivo: Diseño modular con funciones que transforman y consultan arrays de objetos.

Dado el array:

 
let productos = [
  { nombre: "Teclado", precio: 50, stock: 10 },
  { nombre: "Ratón", precio: 20, stock: 0 },
  { nombre: "Monitor", precio: 200, stock: 5 },
  { nombre: "USB", precio: 10, stock: 25 }
];
 
Crea una función productosConStock(arr) que devuelva solo los productos con stock > 0.
Crea una función incrementarPrecio(arr, porcentaje) que devuelva un nuevo array aumentando el precio en ese %.
Crea una función calcularValorTotalInventario(arr) que use reduce() y devuelva el valor total del inventario disponible.
Encadena las funciones anteriores para obtener el valor total del inventario tras un aumento del 10% en los precios.
Puntuación: 1,5. */

let productos = [
  { nombre: "Teclado", precio: 50, stock: 10 },
  { nombre: "Ratón", precio: 20, stock: 0 },
  { nombre: "Monitor", precio: 200, stock: 5 },
  { nombre: "USB", precio: 10, stock: 25 }
];



const productosConStock = array => array.filter(p => p.stock > 0);

const incrementarPrecio = (array, porcentaje) =>
  array.map(p => ({ ...p, precio: p.precio * (1 + porcentaje / 100) }));



const calcularValorTotalInventario = array =>
  array.reduce((acc, p) => acc + p.precio * p.stock, 0);


const valorFinal = calcularValorTotalInventario(
  incrementarPrecio(productosConStock(productos), 10)
);