// cajafuerte.js

class CajaFuerte {
  // Propiedad privada
  #codigo;

  constructor(propietario, codigoInicial) {
    this.propietario = propietario;
    this.#codigo = codigoInicial;
  }

  // Método público para ver el código
  verCodigo() {
    return this.#codigo;
  }

  // Método público para cambiar el código
  cambiarCodigo(nuevoCodigo) {
    // Validar que el nuevo código tenga exactamente 4 dígitos
    const codigoStr = String(nuevoCodigo);
    
    if (codigoStr.length === 4 && /^\d{4}$/.test(codigoStr)) {
      this.#codigo = nuevoCodigo;
      console.log('Código cambiado exitosamente');
      return true;
    } else {
      console.log('Error: El código debe tener exactamente 4 dígitos');
      return false;
    }
  }
}

// Exportar la clase
export default CajaFuerte;