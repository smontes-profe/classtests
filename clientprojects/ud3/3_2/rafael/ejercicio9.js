// EJERCICIO 9
class CajaFuerte {
    #codigo;
    constructor(propietario, codigoInicial) {
        this.propietario = propietario;
        this.#codigo = codigoInicial;
    }
    verCodigo() {
        return this.#codigo;
    }
    cambiarCodigo(nuevoCodigo) {
        if (typeof nuevoCodigo === 'number' && nuevoCodigo >= 1000 && nuevoCodigo <= 9999) {
            this.#codigo = nuevoCodigo;
        } else {
            console.log("El código debe tener 4 dígitos.");
        }
    }
}
let miCaja = new CajaFuerte("Ana", 1234);
console.log("Código inicial:" + miCaja.verCodigo());
miCaja.cambiarCodigo(5678);
console.log("Código después del cambio:" + miCaja.verCodigo());
