console.log("EJERCICIO 5: Gestión de Inventario con funciones avanzadas\n");

// Array de productos
let productos = [
  { nombre: "Teclado", precio: 50, stock: 10 },
  { nombre: "Ratón", precio: 20, stock: 0 },
  { nombre: "Monitor", precio: 200, stock: 5 },
  { nombre: "USB", precio: 10, stock: 25 }
];

console.log("Inventario inicial:", productos);


// 1. Función productosConStock
console.log("\n1. Productos con stock");
function productosConStock(arr) {
    return arr.filter(producto => producto.stock > 0);
}

let conStock = productosConStock(productos);
console.log("Productos disponibles:", conStock);


// 2. Función incrementarPrecio
console.log("\n2. Incrementar precio");
function incrementarPrecio(arr, porcentaje) {
    return arr.map(producto => {
        return {
            nombre: producto.nombre,
            precio: producto.precio * (1 + porcentaje / 100),
            stock: producto.stock
        };
    });
}

let productosAumentados = incrementarPrecio(productos, 10);
console.log("Productos con aumento del 10%:", productosAumentados);


// 3. Función calcularValorTotalInventario
console.log("\n3. Valor total del inventario");
function calcularValorTotalInventario(arr) {
    return arr.reduce((total, producto) => {
        return total + (producto.precio * producto.stock);
    }, 0);
}

let valorTotal = calcularValorTotalInventario(productos);
console.log("Valor total del inventario:", valorTotal.toFixed(2), "€");


// 4. Encadenar funciones
let valorTotalEncadenado = calcularValorTotalInventario(
    incrementarPrecio(productosConStock(productos), 10)
);
console.log("\n4. Resultado encadenado:", valorTotalEncadenado.toFixed(2), "€");

console.log("\nFIN EJERCICIO 5");