let productos = [
  { nombre: "Teclado", precio: 50, stock: 10 },
  { nombre: "Ratón", precio: 20, stock: 0 },
  { nombre: "Monitor", precio: 200, stock: 5 },
  { nombre: "USB", precio: 10, stock: 25 }
];

const productosConStock = arr => arr.filter(p => p.stock > 0);

const incrementarPrecio = (arr, porcentaje) =>
  arr.map(p => ({ ...p, precio: p.precio * (1 + porcentaje / 100) }));

const calcularValorTotalInventario = arr =>
  arr.reduce((acc, p) => acc + p.precio * p.stock, 0);

let totalInventario = calcularValorTotalInventario(
  incrementarPrecio(productosConStock(productos), 10)
);

console.log(totalInventario);