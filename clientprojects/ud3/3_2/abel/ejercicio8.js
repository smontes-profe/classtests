class CajaFuerte {
  #codigo; // Propiedad privada

    constructor(propietario, codigoinicial) {
        this.propietario = propietario; // Pública
        this.#codigo = codigoinicial; // Inicializamos la propiedad privada
    }

  // Método público para ver el código
    verCodigo() {
        return this.#codigo;
    }

  // Método público para cambiar el código
    cambiarCodigo(nuevoCodigo) {
        if (Number.isInteger(nuevoCodigo) && nuevoCodigo.toString().length === 4) {
            this.#codigo = nuevoCodigo;
            console.log("Código cambiado correctamente.");
        } else {
            console.log("Error: el código debe tener 4 dígitos.");
        }
    }
}

// Crear objeto miCaja
let miCaja = new CajaFuerte("Juan Pérez", 1234);

// Ver el código inicial
console.log("Código inicial:", miCaja.verCodigo()); // 1234

// Cambiar código
miCaja.cambiarCodigo(5678);
console.log("Código actualizado:", miCaja.verCodigo()); // 5678

// Intentar acceder directamente a la propiedad privada (genera error)
// console.log(miCaja.#codigo); // SyntaxError
