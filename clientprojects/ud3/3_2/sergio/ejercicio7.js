let cuentaBancaria = {
    saldo: 1000,
    toString: function() {
        return "Saldo" + this.saldo + "EUR";
    }
};

//Covierto el objeto a string
console.log(cuentaBancaria + "");