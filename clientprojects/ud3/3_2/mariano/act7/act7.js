"use strict"

// Crear objeto cuentaBancaria
let cuentaBancaria = {
    saldo: 1000,

    // Implementar método toString
    toString: function() {
        return `Saldo: ${this.saldo} EUR`;
    }
};

// Imprimir el objeto directamente
console.log(cuentaBancaria.toString()); // Salida: Saldo: 1000 EUR

// También funciona si se concatena con una cadena
console.log("Información de la cuenta: " + cuentaBancaria);
