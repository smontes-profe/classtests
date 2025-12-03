// 9.Encapsulación con Propiedades Privadas
// ------PUNTOS: 1.5

// Crea una clase llamada CajaFuerte con:

// Una propiedad privada #codigo que almacene el código secreto.
// Un constructor que reciba propietario y codigoInicial como parámetros.
// Una propiedad pública propietario.
// Un método público verCodigo() que retorne el código secreto.
// Un método público cambiarCodigo(nuevoCodigo) que permita cambiar el código solo si el nuevo código tiene 4 dígitos.

// Tarea:
// Crea un objeto miCaja con propietario "Ana" y código inicial 1234.
// Llama a verCodigo().
// Cambia el código a 5678.
// Intenta acceder directamente a #codigo desde fuera de la clase y verifica que no se puede.

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
        if (nuevoCodigo.length === 4) {
            this.#codigo = nuevoCodigo;
        }
    }
}

const miCaja = new CajaFuerte("Ana", 1234);
console.log(miCaja.verCodigo());
miCaja.cambiarCodigo("5678");
console.log(miCaja.verCodigo());
// console.log(miCaja.#codigo);
console.log(miCaja.propietario);