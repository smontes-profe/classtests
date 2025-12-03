let productos = [
  { nombre: "Teclado", precio: 50, stock: 10 },
  { nombre: "Ratón", precio: 20, stock: 0 },
  { nombre: "Monitor", precio: 200, stock: 5 },
  { nombre: "USB", precio: 10, stock: 25 }
];

function productosConStock(par1) {
    return par1.filter(p => p.stock > 0);
}
console.log(productosConStock(productos));

function incrementarPrecio(par1, porcentaje) {
    return par1.map(p => {
        return {
            nombre: p.nombre,
            precio: p.precio * (1 + porcentaje / 100),
            stock: p.stock
        };
    });
}
console.log(incrementarPrecio(productos, 10));

function calcularValorTotalInventario(par1) {
    return par1.reduce((acum, actual) => acum + (actual.precio * actual.stock), 0);
}


let productosConStockArr = productosConStock(productos);
let productosConPrecioIncrementado = incrementarPrecio(productosConStockArr, 10);
let valorTotalInventario = calcularValorTotalInventario(productosConPrecioIncrementado);
console.log("Valor total del inventario tras aumento del 10% en precios: " + valorTotalInventario);