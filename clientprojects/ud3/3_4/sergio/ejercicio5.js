//Array
let productos = [
  { nombre: "Teclado", precio: 50, stock: 10 },
  { nombre: "Raton", precio: 20, stock: 0 },
  { nombre: "Monitor", precio: 200, stock: 5 },
  { nombre: "USB", precio: 10, stock: 25 }
];

//Funcion que me devuelve los productos con stock>0
 function productosConStock(arr) {
  return arr.filter(p => p.stock > 0);
}

//Funcion que me devuelve un nuevo array aumentado el precio en ese %
function incrementarPrecio(arr, porcentaje) {
  return arr.map(p => ({ ...p, precio: p.precio * (1 + porcentaje / 100) }));
}

//Funcion con reduce para que me devuelve el valor total del inventario disponible
function calcularValorTotalInventario(arr) {
  return arr.reduce((total, p) => total + (p.precio * p.stock), 0);
}

//Encadeno las funciones para obtener el valor total del inventario tras un aumento del 10% de los precios
let valorTotal = calcularValorTotalInventario(
  incrementarPrecio(productosConStock(productos), 10)
);
console.log("Valor total inventario +10%:", valorTotal);