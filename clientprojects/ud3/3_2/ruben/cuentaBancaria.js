class cuentaBancaria{
    constructor(saldo){
        this.saldo = saldo;
    }
    toString(){
        return `Saldo actual: ${this.saldo} EUR`;
    }

}
export {cuentaBancaria};