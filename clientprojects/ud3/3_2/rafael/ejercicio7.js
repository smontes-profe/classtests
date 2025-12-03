// EJERCICIO 7
let cuentaBancaria = {
    saldo: 1000,
    toString: function() {
        return `Saldo: ${this.saldo} EUR`;
    }
};
console.log(cuentaBancaria.toString());