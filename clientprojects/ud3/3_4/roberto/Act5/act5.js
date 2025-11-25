console.log("---  Ejercicio 5: Gestión de Inventario ---");

let productos = [
  { nombre: "Teclado", precio: 50, stock: 10 },
  { nombre: "Ratón", precio: 20, stock: 0 },
  { nombre: "Monitor", precio: 200, stock: 5 },
  { nombre: "USB", precio: 10, stock: 25 }
];

// 1. Función productosConStock (devuelve solo con stock > 0)
const productosConStock = arr => arr.filter(p => p.stock > 0);
console.log("Productos con stock:", productosConStock(productos));

// 2. Función incrementarPrecio (devuelve nuevo array)
const incrementarPrecio = (arr, porcentaje) => {
  return arr.map(p => ({
    ...p, // Copia todas las propiedades del producto
    precio: p.precio * (1 + porcentaje / 100) // Sobrescribe el precio
  }));
};
console.log("Precios +10%:", incrementarPrecio(productos, 10));

// 3. Función calcularValorTotalInventario (stock * precio)
const calcularValorTotalInventario = arr => {
  return arr.reduce((acc, p) => acc + (p.precio * p.stock), 0);
};
console.log("Valor total inventario actual:", calcularValorTotalInventario(productos));
// (50*10) + (20*0) + (200*5) + (10*25) = 1750

// 4. Encadenar: valor total tras aumento del 10%
const productosAumentados = incrementarPrecio(productos, 10);
const valorTotalAumentado = calcularValorTotalInventario(productosAumentados);

console.log("Valor total del inventario (con 10% aumento):", valorTotalAumentado);
// (55*10) + (22*0) + (220*5) + (11*25) = 1925