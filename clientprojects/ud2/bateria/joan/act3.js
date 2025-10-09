
/*
</br>
Nivel 3 – Funciones y ámbitos (5 puntos)
La poción secreta
Imagina que eres un mago que prepara pociones. Queremos ver dónde existe cada variable.
*/





let ingredienteGlobal = "agua"; // Variable global
 
function prepararPocion() {
  let ingredienteLocal = "dragón lágrima"; // Variable local a la función
  console.log("Dentro de la función:", ingredienteGlobal); // Explica qué devolvería este primer log y por qué
  // Muestra "agua" 
  // porque la variable global se puede usar dentro de la funcion.

  console.log("Dentro de la función:", ingredienteLocal); // Explica qué devolvería este segundo log y por qué
  // Muestra "dragón lágrima" 
  // porque esta dentro de la funcion.
 
  if (true) {
    let ingredienteBloque = "polvo de unicornio"; // Variable de bloque
    console.log("Dentro del bloque:", ingredienteBloque);
    // Muestra "polvo de unicornio" 
    // porque esta dentro del bloque.
  }
 
  // console.log(ingredienteBloque); // Explica qué devolvería este tercer log y por qué

  // Da error porque la variable solo existe dentro del bloque if.
}
 
prepararPocion();
 
console.log("Fuera de la función:", ingredienteGlobal); // Accede a global
// console.log(ingredienteLocal); // Explica qué devolvería este cuarto log y por qué
// Da error porque la variable solo existe dentro de la funcion.





/*
Tienes que indicar qué devolvería cada log y explicar por qué (no pruebes el código! Eso sería trampas! Intenta saber qué pasaría solo viendo el código (y explicar por qué, claro).

Para esta parte podéis entregar un txt o un doc con las explicaciones.
*/


