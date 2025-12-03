// Archivo JavaScript 9
class CajaFuerte {
    // Propiedad privada
    #codigo;

    // Constructor
    constructor(popietario, codigoInicial) {
        this.popietario = popietario;
        this.#codigo = codigoInicial;
    }

    // Método público para acceder al código privado
    verCodigo(codigo) {
        return this.#codigo;
    }

    // Método público para cambiar el código privado
    cambiarCodigo(nuevoCodigo) {
        if (nuevoCodigo.length === 4) {
            this.#codigo = nuevoCodigo;
        } else {
            console.log("El código debe tener 4 dígitos.");
        }
    }
}

// Crear objeto CajaFuerte
const miCaja = new CajaFuerte("Mauri", "1234");

// Objeto creado
console.log(miCaja.popietario);
console.log(miCaja.verCodigo()); // No se puede acceder directamente al código privado

// Cambiar el código
miCaja.cambiarCodigo("5678");
console.log(miCaja.verCodigo());




