//Creamos el objeto CuentaBancaria con la propiedad saldo y el método toString
let CuentaBancaria = {
    saldo: 1000,

    toSrting() {
        return `Saldo: ${this.saldo}`;
    }
};

//Imprimimos el resultado del método toString en la consola
console.log(CuentaBancaria.toSrting());
