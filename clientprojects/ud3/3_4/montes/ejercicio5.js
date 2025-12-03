// Ejercicio 5: Gestión de Inventario con funciones avanzadas
// Objetivo: Diseño modular con funciones que transforman y consultan arrays de objetos.

// Dado el array:
let productos = [
  { nombre: "Teclado", precio: 50, stock: 10 },
  { nombre: "Ratón", precio: 20, stock: 0 },
  { nombre: "Monitor", precio: 200, stock: 5 },
  { nombre: "USB", precio: 10, stock: 25 },
];

// Crea una función productosConStock(arr) que devuelva solo los productos con stock > 0.
// Crea una función incrementarPrecio(arr, porcentaje) que devuelva un nuevo array aumentando el precio en ese %.
// Crea una función calcularValorTotalInventario(arr) que use reduce() y devuelva el valor total del inventario disponible.
// Encadena las funciones anteriores para obtener el valor total del inventario tras un aumento del 10% en los precios.
// Puntuación: 1,5.

function productosConStock(arr) {
  return arr.filter((elemento) => elemento.stock > 0);
}

function incrementarPrecio(arr, porcentaje) {
  return arr.map((elemento) => ({
    nombre: elemento.nombre,
    precio: elemento.precio * (1 + porcentaje),
    stock: elemento.stock,
  }));
}

// function calcularValorTotalInventario(arr) { //? Forma primera con varios Return a evitar.
//   return arr.reduce((acumulado, valorActual) => {
//     return acumulado +=valorActual.precio;
//   }, 0);
// }

function calcularValorTotalInventario(arr) {
  //? Forma no es necesario el return gr
  return arr.reduce(
    (acumulado, valorActual) => (acumulado += valorActual.precio),0);
}

// Provar si funciona 
// console.log(productosConStock(productos));
// console.log(incrementarPrecio(productos, 0.1));
// console.log(calcularValorTotalInventario(productos));

console.log(calcularValorTotalInventario(incrementarPrecio(productosConStock(productos), 0.1)));



