"use strict";

import { CajaFuerte } from "./cajafuerte.js";

const miCaja = new CajaFuerte("Ana", 1234);

miCaja.verCodigo();

try {
  miCaja.cambiarCodigo(5678);
} catch (e) {
  console.log(e.message);
}

console.log(miCaja.codigo);