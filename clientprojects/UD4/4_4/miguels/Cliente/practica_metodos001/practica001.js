'use strict';

/**
Ejercicio de FrontEnd: Crea un array llamado precios con los valores:
50, 100, 25, 80, 120
Utiliza el método map() para generar un nuevo array llamado preciosConDescuento
 donde a todos los precios se les aplique un 20% de descuento.
Muestra en consola el array original y el array con los precios rebajados.
 */

const precios = [50, 100, 25, 80, 120];

let preciosDescuento = precios.map(precio => precio * 0.8);

for (let precio of preciosDescuento) {
    console.log(precio);
}
