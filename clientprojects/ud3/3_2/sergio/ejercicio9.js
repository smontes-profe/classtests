//Creo la clase cajafuerte
class CajaFuerte {
    //Hago la propiedad privada
    #codigo;

    constructor(propietario,codigoInicial) {
        //La propiedad publica
        this.propietario = propietario;
        this.#codigo = codigoInicial;
    }
    verCodigo() {
        return this.#codigo;
    }
    cambiarCodigo(nuevoCodigo) {
        if (nuevoCodigo.toSring().length === 4) {
            this.#codigo = nuevoCodigo;
        }else {
            console.log("El codigo debe tener 4 dijitos");
        }
    }
}

//Creo el ojeto
let miCaja = new CajaFuerte("Ana", 1234);
console.log(miCaja.verCodigo());
miCaja.cambiarCodigo(5678);
console.log(miCaja.verCodigo());