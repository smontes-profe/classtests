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
    if (/^\d{4}$/.test(nuevoCodigo)) {
      this.#codigo = nuevoCodigo;
      console.log("Código cambiado.");
    } else {
      console.log("El código debe tener 4 dígitos.");
    }
  }
}

const miCaja = new CajaFuerte("Ana", 1234);
console.log(miCaja.verCodigo());
miCaja.cambiarCodigo(5678);