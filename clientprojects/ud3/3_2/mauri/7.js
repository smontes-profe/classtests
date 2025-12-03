// Archivo JavaScript 7

const cuenta = {
    saldo: 1000,

    toString() {
        return `Saldo actual: ${this.saldo} EUR`;
    }
}

console.log(cuenta.toString());