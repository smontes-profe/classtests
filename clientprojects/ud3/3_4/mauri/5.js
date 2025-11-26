// Archivo JavaScript 5
let productos = [
  { nombre: "Teclado", precio: 50, stock: 10 },
  { nombre: "Ratón", precio: 20, stock: 0 },
  { nombre: "Monitor", precio: 200, stock: 5 },
  { nombre: "USB", precio: 10, stock: 25 }
];

// 1. Función productosConStock(arr)
function productosConStock(arr) {
    return arr.filter(producto => producto.stock > 0);
}

// 2. Función incrementarPrecio(arr, porcentaje)
function incrementarPrecio(arr, porcentaje) {
    const factorIncremento = 1 + (porcentaje / 100);
    
    // Usamos map() para devolver un nuevo objeto con el precio actualizado.
    return arr.map(producto => ({
        ...producto, // Copia el resto de las propiedades (nombre, stock)
        precio: producto.precio * factorIncremento // Aplica el incremento
    }));
}

// 3. Función calcularValorTotalInventario(arr)
function calcularValorTotalInventario(arr) {
    return arr.reduce((valorTotal, producto) => {
        const valorProducto = producto.precio * producto.stock;
        return valorTotal + valorProducto;
    }, 0);
}

console.log("--- Inventario Inicial ---");
console.table(productos);

// PASO A: Filtrar productos con stock > 0
const productosDisponibles = productosConStock(productos);
console.log("\n1. Productos con Stock (> 0):");
console.table(productosDisponibles); 
// Resultado: Excluye el "Ratón" (stock: 0)

// PASO B: Incrementar el precio en un 10%
const productosPrecioIncrementado = incrementarPrecio(productosDisponibles, 10);
console.log("\n2. Productos con Precio Incrementado (10%):");
console.table(productosPrecioIncrementado);
// Ejemplo: Teclado pasa de 50 a 55

// PASO C: Calcular el valor total del inventario con el nuevo precio
const valorFinal = calcularValorTotalInventario(productosPrecioIncrementado);
console.log(`\n3. Valor Total del Inventario (Tras incremento del 10%):`);
// Cálculo: (55 * 10) + (220 * 5) + (11 * 25) = 550 + 1100 + 275 = 1925
console.log(`TOTAL: $${valorFinal}`);

console.log("\n--- Encadenamiento Final ---");

const valorTotalEncadenado = calcularValorTotalInventario(
    incrementarPrecio(
        productosConStock(productos), 
        10
    )
);

console.log(`Valor Total Encadenado: $${valorTotalEncadenado}`);