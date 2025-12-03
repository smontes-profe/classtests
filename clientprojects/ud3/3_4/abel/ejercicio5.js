/*
Objetivo: Diseño modular con funciones que transforman y consultan arrays de objetos.

Dado el array:

 
let productos = [
  { nombre: "Teclado", precio: 50, stock: 10 },
  { nombre: "Ratón", precio: 20, stock: 0 },
  { nombre: "Monitor", precio: 200, stock: 5 },
  { nombre: "USB", precio: 10, stock: 25 }
];
 
1.Crea una función productosConStock(arr) que devuelva solo los productos con stock > 0.
2.Crea una función incrementarPrecio(arr, porcentaje) que devuelva un nuevo array aumentando el precio en ese %.
3.Crea una función calcularValorTotalInventario(arr) que use reduce() y devuelva el valor total del inventario disponible.
4.Encadena las funciones anteriores para obtener el valor total del inventario tras un aumento del 10% en los precios.
*/

 
let productos = [
  { nombre: "Teclado", precio: 50, stock: 10 },
  { nombre: "Ratón", precio: 20, stock: 0 },
  { nombre: "Monitor", precio: 200, stock: 5 },
  { nombre: "USB", precio: 10, stock: 25 }
];

//1 con filter podemos hacerlo
function productosConStock(productos){
   return productos.filter(p => p.stock > 0)
}


//2 ...p copia todas las otras propiedades del objeto
function incrementarPrecio(productos, porcentaje){
    return productos.map(p => ({
        ...p,
        precio: p.precio + (p.precio*porcentaje/100)
    }));
}

//3  usamos el reduce 
function calcularValorTotalInventario(productos) {
  return productos.reduce((acum, p) => acum + p.precio * p.stock, 0);
}

//4
let final = calcularValorTotalInventario(
    incrementarPrecio(
        productosConStock(productos),
        10
    )
);

console.log("Valor total del inventario tras aumento del 10%:", totalFinal);
