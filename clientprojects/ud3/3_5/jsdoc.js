// @ts-check
// 3. Rellenas la información

/**
 * Calcula el total a pagar después de aplicar un descuento.
 * @function calcularTotal
 * @param {number} precio - El precio unitario del producto.   
 * @param {number} cantidad - La cantidad de productos comprados.
 * @param {number} descuento - El descuento a aplicar (en forma decimal, por ejemplo, 0.1 para 10%).
 * @returns {number} El total a pagar después de aplicar el descuento.
 * @example
 * const total = calcularTotal(100, 2, 0.1); // total será 180 
 */
function calcularTotal(precio, cantidad, descuento) {
  const subtotal = precio * cantidad;
  return subtotal - (subtotal * descuento);
}

console.log(calcularTotal(100, 2, 0.1)); // Salida: 180
const miTotal = calcularTotal(100, "40", 0.20);
console.log(`El total a pagar es: ${total}`); // Salida: El total a pagar es: 3200