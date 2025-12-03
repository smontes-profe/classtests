"use strict"

class CajaFuerte {
    #codigo; // Propiedad privada

    constructor(propietario, codigoInicial) {
        this.propietario = propietario;
        this.#codigo = codigoInicial;
    }

    verCodigo() {
        return this.#codigo;
    }

    cambiarCodigo(nuevoCodigo) {
        if (String(nuevoCodigo).length === 4) {
            this.#codigo = nuevoCodigo;
            console.log("Código cambiado correctamente.");
        } else {
            console.log("El nuevo código debe tener exactamente 4 dígitos.");
        }
    }
}

// Crear el objeto miCaja
const miCaja = new CajaFuerte("Ana", 1234);

// Llamar a verCodigo()
console.log(miCaja.verCodigo());  // 1234

// Cambiar el código a 5678
miCaja.cambiarCodigo(5678);
console.log(miCaja.verCodigo());  // 5678

// Intentar acceder directamente a #codigo
console.log(miCaja.#codigo);  // ❌ ERROR: Private field '#codigo' must be declared in an enclosing class
