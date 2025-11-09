let ingredienteGlobal = "agua"; // Esta variable es global, se puede usar desde cualquier parte del programa

function prepararPocion() { // Aquí empieza la función
  let ingredienteLocal = "dragón lágrima"; // Esta variable solo existe dentro de la función

  console.log("Dentro de la función:", ingredienteGlobal); // Muestra "Dentro de la función: agua"
  // Porque la variable global se puede usar dentro de la función sin problema

  console.log("Dentro de la función:", ingredienteLocal); // Muestra "Dentro de la función: dragón lágrima"
  // Porque esta variable está dentro de la función y se puede usar aquí

  if (true) { // Creamos un bloque (como una mini zona dentro de la función)
    let ingredienteBloque = "polvo de unicornio"; // Esta variable solo existe dentro del bloque del if
    console.log("Dentro del bloque:", ingredienteBloque); // Muestra "Dentro del bloque: polvo de unicornio"
    // Porque estamos dentro del mismo bloque donde fue creada
  }

  // console.log(ingredienteBloque); // Daría error (ReferenceError)
  // Porque la variable "ingredienteBloque" solo existe dentro del if, fuera de ahí desaparece
}

prepararPocion(); // Llamamos a la función para que se ejecute

console.log("Fuera de la función:", ingredienteGlobal); // Muestra "Fuera de la función: agua"
// Porque la variable global sí se puede usar desde fuera de la función también

// console.log(ingredienteLocal); // Daría error (ReferenceError)
// Porque "ingredienteLocal" solo existe dentro de la función, fuera de ella no se reconoce
