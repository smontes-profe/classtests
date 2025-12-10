'use strict';


function calcularPrecio(base, descuento) {
    let precioFinal = 0;

    if (descuento > 0) {
        descuento = descuento / 100;
    }

    if (descuento) {
        precioFinal = base - (base * descuento);
    }
    return precioFinal.toFixed(2);
}
 
console.log(calcularPrecio(100, 0.2));
console.log(calcularPrecio(100, 60));