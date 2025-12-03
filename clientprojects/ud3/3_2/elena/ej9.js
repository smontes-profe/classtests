
// Encapsulacion con propiedades privadas

class CajaFuerte { // Clase
  #codigo; // Propiedad privada

  constructor(propietario, codigoInicial) { // Constructor
    this.propietario = propietario;
    this.#codigo = codigoInicial;
  }

  verCodigo() { // Método público
    return this.#codigo;
  }

  cambiarCodigo(nuevoCodigo) { // Método público
    if (nuevoCodigo.toString().length === 4) { // Si tiene cuatro dígitos
      this.#codigo = nuevoCodigo;
      console.log("Código cambiado");
    } else {
      console.log("El nuevo código tiene que tener 4 dígitos");
    }
  }
}


const miCaja = new CajaFuerte("Ana", 1234); // Objeto

console.log("Código actual: ", miCaja.verCodigo());

miCaja.cambiarCodigo(5678); // Cambiamos el código

// console.log(miCaja.#codigo); // Da error

