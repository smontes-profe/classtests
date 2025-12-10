'use strict';

const cuentaBancaria = {
    saldo: 0,

    toString() {
        return `Saldo: ${this.saldo} EUR`;
    }
}

console.log(cuentaBancaria.toString());