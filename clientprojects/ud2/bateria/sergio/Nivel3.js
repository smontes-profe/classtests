let ingredienteGlobal = "agua"; //Esta es una variable global
function prepararPocion() {
  let ingredienteLocal = "dragón lágrima"; // Variable locsl para la funcion
  console.log("Dentro de la función:", ingredienteGlobal); 
  // Nos devolvera agua

  console.log("Dentro de la función:", ingredienteLocal); 
  // Nos devuelve dragon lagrima que es la variable que se declaro dentro de la funcion

  if (true) {
    let ingredienteBloque = "polvo de unicornio"; 
    console.log("Dentro del bloque:", ingredienteBloque);
    // Nos devuelve polvo de unicornio  que es la variable q se ha declarado dentro de este bloque
  }

  // console.log(ingredienteBloque); 
  // Daria error, porque solo existe dentro del if y fuera de el no va a estar disponible
}

prepararPocion();

console.log("Fuera de la función:", ingredienteGlobal); 
//Nos devuelve agua, es una variable globlal y este disponible en todo el programa

// console.log(ingredienteLocal); 
//Daria error, ingredienteLocal existe dentro de la funcion prepararPocion y no se puede usar fuera de ella