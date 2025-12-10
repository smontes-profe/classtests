"use strict";

export class CajaFuerte {
  #codigo;
  propietario;

  constructor(propietario, codigoinicial) {
    this.propietario = propietario;
    this.#codigo = codigoinicial;
  }

  verCodigo() {
    return this.#codigo;
  }

  cambiarCodigo(nuevoCodigo) {
    const codigoString = String(nuevoCodigo);

    if (codigoString.length !== 4) {
      throw new Error("El código debe tener 4 carácteres.");
    }

    this.#codigo = nuevoCodigo;
    console.log("El codigo se ha cambiado correctamente.")
  }
}
