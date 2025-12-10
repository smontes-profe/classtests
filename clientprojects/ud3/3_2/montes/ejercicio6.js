// 7. Conversión de objetos a valores primitivos
// ------PUNTOS: 1

// Crea un objeto cuentaBancaria que tenga una propiedad saldo. 
// Implementa el método toString para que, al imprimir el objeto, 
// se muestre el saldo de forma legible,como "Saldo: 1000 EUR".

const cuentaBancaria = {
    saldo: 1000,

    toString() {
        return `Saldo: ${this.saldo} EUR`;
    }
}

console.log(cuentaBancaria.toString());
console.log(cuentaBancaria);