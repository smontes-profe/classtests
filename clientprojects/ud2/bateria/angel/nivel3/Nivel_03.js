let ingredienteGlobal = "agua"; // Variable global
 
function prepararPocion() {
  let ingredienteLocal = "dragón lágrima"; // Variable local a la función
  console.log("Dentro de la función:", ingredienteGlobal); // Explica qué devolvería este primer log y por qué: Saldría "agua" porque las funciones pueden acceder a variables globales.
  console.log("Dentro de la función:", ingredienteLocal); // Explica qué devolvería este segundo log y por qué: Saldría "dragón lágrima" porque está accediendo a su variable local.
 
  if (true) {
    let ingredienteBloque = "polvo de unicornio"; // Variable de bloque
    console.log("Dentro del bloque:", ingredienteBloque); // Explica qué devolvería este log y por qué: Saldría "polvo de unicornio" porque está dentro del mismo bloque donde se define.
  }
 
  console.log(ingredienteBloque); // Explica qué devolvería este tercer log y por qué: No saldría nada y daría un error porque ingredienteBloque está definido con let dentro del bloque if y no es accesible fuera de él.
}
 
prepararPocion();
 
console.log("Fuera de la función:", ingredienteGlobal); // Accede a global: Saldría "agua" porque es una variable global.
console.log(ingredienteLocal); // Explica qué devolvería este cuarto log y por qué: No saldría nada y daría un error porque ingredienteLocal está definido con let dentro de la función prepararPocion y no es accesible fuera de ella.