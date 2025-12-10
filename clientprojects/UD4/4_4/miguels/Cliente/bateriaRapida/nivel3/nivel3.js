"use strict";

let ingredienteGlobal = "agua"; // Variable global, visible desde cualquier ámbito (función/bloque).

function prepararPocion() {
  let ingredienteLocal = "dragón lágrima"; // Variable local a la función

  /**
   * Accedemos a la global desde dentro de la función.
   * Resultado: "Dentro de la función: agua"
   * Por qué: se imprime la cadena de texto más la variable global, concatenada por el carácter ,
   */
  console.log("Dentro de la función:", ingredienteGlobal);

  /**
   * Accedemos a la variable local de la función.
   * Resultado: "Dentro de la función: dragón lágrima"
   * Por qué: se imprime la cadena de texto más la variable local, concatenada por el carácter ,
   */
  console.log("Dentro de la función:", ingredienteLocal);

  if (true) {
    let ingredienteBloque = "polvo de unicornio";

    /**
     * Accedemos a la variable de bloque desde el MISMO bloque.
     * Resultado: "Dentro del bloque: polvo de unicornio"
     * Por qué: seguimos dentro del bloque donde fue declarada con let. concatenada por el carácter ,
     */
    console.log("Dentro del bloque:", ingredienteBloque);
  }

  /**
   * Si descomentas la siguiente línea, se lanza:
   * ReferenceError: ingredienteBloque is not defined
   * Por qué: 'let' tiene ámbito de bloque; al cerrar la llave del if, el identificador deja de existir aquí.
   */
  // console.log(ingredienteBloque); // Explica qué devolvería este tercer log y por qué
}

prepararPocion();

/**
 * Accedemos a la global desde fuera de la función.
 * Resultado: "Fuera de la función: agua"
 * Por qué: 'ingredienteGlobal' está en el ámbito global y es accesible aquí.
 */
console.log("Fuera de la función:", ingredienteGlobal);

/**
 * Si descomentas la siguiente línea, se lanza:
 * ReferenceError: ingredienteLocal is not defined
 * Por qué: 'ingredienteLocal' solo existe dentro del cuerpo de 'prepararPocion'; fuera no hay identificador.
 */
// console.log(ingredienteLocal); // Explica qué devolvería este cuarto log y por qué
