
// Array
let productos = [
  { nombre: "Teclado", precio: 50, stock: 10 },
  { nombre: "Ratón", precio: 20, stock: 0 },
  { nombre: "Monitor", precio: 200, stock: 5 },
  { nombre: "USB", precio: 10, stock: 25 }
];

// 1. stock > 0
const productosConStock = arr => arr.filter(p => p.stock > 0);

// 2. Aumentar precio con %
const incrementarPrecio = (arr, porcentaje) =>
  arr.map(p => ({ ...p, precio: p.precio * (1 + porcentaje / 100) }));

// 3. Inventario disponible
const calcularValorTotalInventario = arr =>
  arr.reduce((total, p) => total + p.precio * p.stock, 0);

// 4. Total del inventario + 10%
let valorFinal = calcularValorTotalInventario(
  incrementarPrecio(productosConStock(productos), 10)
);

console.log("Total inventario + 10%:", valorFinal);


