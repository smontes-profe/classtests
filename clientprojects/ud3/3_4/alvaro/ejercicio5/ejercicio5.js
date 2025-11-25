// Ejercicio 5: Gestión de Inventario con funciones avanzadas
// Objetivo: Diseño modular con funciones que transforman y consultan arrays de objetos

// Dado el array:
let productos = [
  { nombre: "Teclado", precio: 50, stock: 10 },
  { nombre: "Ratón", precio: 20, stock: 0 },
  { nombre: "Monitor", precio: 200, stock: 5 },
  { nombre: "USB", precio: 10, stock: 25 }
];

// a) Crea una función productosConStock(arr) que devuelva solo los productos con stock > 0
const productosConStock = arr => arr.filter(p => p.stock > 0);

// b) Crea una función incrementarPrecio(arr, porcentaje) que devuelva un nuevo array aumentando el precio en ese %
const incrementarPrecio = (arr, porcentaje) =>
    arr.map(p => ({ ...p, precio: p.precio * (1 + porcentaje / 100) }));

// c) Crea una función calcularValorTotalInventario(arr) que use reduce() y devuelva el valor total del inventario disponible
const calcularValorTotalInventario = arr =>
    arr.reduce((total, p) => total + p.precio * p.stock, 0);

// d) Encadena las funciones anteriores para obtener el valor total del inventario tras un aumento del 10% en los precios
let valorTotal = calcularValorTotalInventario(
    productosConStock(incrementarPrecio(productos, 10))
);

// Mostrar resultado en consola
console.log("Valor total tras aumento del 10%:", valorTotal);
