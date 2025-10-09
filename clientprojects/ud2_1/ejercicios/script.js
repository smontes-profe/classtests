//Ejercicio 7
/* function procesarDatos(datos, callback) {
    callback(datos);
}

procesarDatos([1,2,3], function(d) {
    console.log("Datos recibidos:", d);
}); */

//Ejercicio 8
function calcularPrecio(base, descuento) {
    let precioFinal = base;
    if (descuento) {
        precioFinal = base - base * descuento;
    }
    if (descuento > 50) {
        precioFinal = 0;
    }
    return precioFinal.toFixed(2);
}

console.log(calcularPrecio(100, 0.2));
console.log(calcularPrecio(100, 60));