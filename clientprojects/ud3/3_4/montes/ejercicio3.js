// Ejercicio 3: Arrays – creación y manipulación
// Objetivo: Crear arrays y usar métodos básicos y avanzados.

// Crea un array frutas con cinco frutas.
// Añade una fruta al inicio y otra al final.
// Elimina la primera y la última fruta.
// Crea un nuevo array frutasMayus con todas las frutas en mayúsculas usando map().
// Filtra solo las frutas que contengan la letra "a" usando filter().
// Encuentra la posición de la fruta "Manzana" usando findIndex().
// Comprueba si alguna fruta empieza con "P" usando some() y si todas las frutas tienen más de 3 letras usando every().
// Ordena las frutas alfabéticamente usando sort().
// Usa reduce() para crear un string que contenga todas las frutas separadas por coma.
// Puntuación: 1.

//! Crea un array frutas con cinco frutas.
let arr = ["manzana", "pera", "naranja", "manzana", "kiwi"];

//! Añade una fruta al inicio y otra al final.
arr.push("naranja");
arr.shift("pera");
console.log(arr);

//! Elimina la primera y la última fruta.
arr.pop();
arr.unshift;
console.log(arr);

//! Crea un nuevo array frutasMayus con todas las frutas en mayúsculas usando map().
let frutasMayus = arr.map((elemento) => elemento.toUpperCase());
console.log(frutasMayus);

//! Filtra solo las frutas que contengan la letra "a" usando filter().
let arrFiltrado = arr.filter((elemento) => elemento.includes("a"));
console.log(arrFiltrado);

//! Encuentra la posición de la fruta "Manzana" usando findIndex().
let position = arr.findIndex((elemento) => elemento === "manzana");
console.log(position);
let position2 = arr.findIndex((elemento) => elemento === "naranja");
console.log(position2); //Como vemos solo es el primer elemento

//! Comprueba si alguna fruta empieza con "P" usando some() y si todas las frutas tienen más de 3 letras usando every().
let startLetterP = arr.some((elemento) => elemento[0] === "p"); //Comprueba si hay una "p" no si hay algo que empiece por la p.
console.log(startLetterP);
let startLetterP2 = arr.some((elemento) => elemento.startsWith("p"));
console.log(startLetterP2);

//! Ordena las frutas alfabéticamente usando sort().
let orderArr = arr.sort();
console.log(orderArr);

//! Usa reduce() para crear un string que contenga todas las frutas separadas por coma.
let frutaSeparada = arr.reduce(function (acumulador, valorActual) {
  if (acumulador === "") {
    return valorActual;
  } else {
    return (acumulador += `, ${valorActual}`);
  }
}, "");
console.log(frutaSeparada);

let frutaSeparada2 = arr.reduce(function (acumulador, valorActual) {    //? Por quitarle el valor de arranque el acumulador mantiene el proceso. 
  return acumulador + ", " + valorActual;                               //? // 1ª vuelta: acc="manzana", val="banana"   -> "manzana, banana"
                                                                        //? 2ª vuelta: acc="manzana, banana", val="naranja" -> "manzana, banana, naranja"
                                                                        //? etc.
});
console.log(frutaSeparada2);
