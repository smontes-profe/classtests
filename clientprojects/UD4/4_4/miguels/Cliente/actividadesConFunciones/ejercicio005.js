"use strict";

let productos = [
  { nombre: "Teclado", precio: 50, stock: 10 },
  { nombre: "Ratón", precio: 20, stock: 0 },
  { nombre: "Monitor", precio: 200, stock: 5 },
  { nombre: "USB", precio: 10, stock: 25 },
];

// Crea una función productosConStock(arr) que devuelva solo los productos con stock > 0.
function productosConStock(array) {
  return array.filter((producto) => producto.stock > 0);
}

// Crea una función incrementarPrecio(arr, porcentaje) que devuelva un nuevo array aumentando el precio en ese %.
function incrementarPrecio(array, porcentaje) {
  const porcentajeFix = porcentaje < 0 ? porcentaje : porcentaje / 100;
  return array.map(producto => ({
    ...producto,
    precio: (producto.precio * (1 + porcentajeFix))
  }));
}

// Crea una función calcularValorTotalInventario(arr) que use reduce() y devuelva el valor total del inventario disponible.
function calcularValorTotalInventario(array) {
  return array.reduce(
    (total, producto) => total + producto.stock * producto.precio,
    0
  );
}

// Encadenamiento de funciones
console.log(productosConStock(productos));
console.log(incrementarPrecio(productos, 10));
console.log(calcularValorTotalInventario(productos));

// Uso de todas juntas (no aconsejable pero posible)
let arrayModify = calcularValorTotalInventario(productosConStock(incrementarPrecio(productos, 10)));
console.log(arrayModify);

// Las cantidades son diferentes al pasar los resultados directamente como argumentos y guardar el resultado de sus iteraciones en una variable