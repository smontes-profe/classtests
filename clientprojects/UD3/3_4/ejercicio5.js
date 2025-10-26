let productos = [
  { nombre: "Teclado", precio: 50, stock: 10 },
  { nombre: "Ratón", precio: 20, stock: 0 },
  { nombre: "Monitor", precio: 200, stock: 5 },
  { nombre: "USB", precio: 10, stock: 25 }
];

function productosConStock(arr) {
  return arr.filter(p => p.stock > 0);
}

function incrementarPrecio(arr, porcentaje) {
  return arr.map(p => ({ 
    ...p, 
    precio: p.precio * (1 + porcentaje / 100) 
  }));
}

function calcularValorTotalInventario(arr) {
  return arr.reduce((acc, p) => acc + p.precio * p.stock, 0);
}

// Encadenamiento
let valorFinal = calcularValorTotalInventario(
  incrementarPrecio(productosConStock(productos), 10)
);

console.log(valorFinal);
