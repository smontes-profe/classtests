const precios = [50, 100, 25, 80, 120];

const preciosConDescuento = precios.map(precio => {
  return precio - precio * 0.20; // Aplica el 20% de descuento
});

console.log("Precios originales:", precios);
console.log("Precios con descuento:", preciosConDescuento);
