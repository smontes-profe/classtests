//Creo el array con cinco frutas
let frutas = ["Manzana", "Pera", "Uva", "Platano", "Kiwi"];

//Añado una fruta al inicio y al final
frutas.unshift("Melon");
frutas.push("Mango");
console.log("Añadidas:", frutas);

//Elimino la primera y la ultima
frutas.shift();
frutas.pop();
console.log("Despues de eliminar:", frutas);

//Nuevo array con las frutas en mayusculas usando map
let frutasMayus = frutas.map(f => f.toUpperCase());
console.log("Mayusculas:", frutasMayus);

//Filtro las frutas que tengan la letra a
let conA = frutas.filter(f => f.includes("a") || f.includes("A"));
console.log("Con 'a':", conA);

//Mustro la posicion de manzana usando findindex
let posManzana = frutas.findIndex(f => f === "Manzana");
console.log("Posicion de Manzana:", posManzana);

//Compruebo si alguna fruta empieza por p con some y tambien si todas las frutas tienen mas de tres letras con every
console.log("Alguna empieza con P:", frutas.some(f => f.startsWith("P")));
console.log("Todas tienen mas de 3 letras:", frutas.every(f => f.length > 3));

//Ordeno las frutas alfabeticamente con sort
let ordenadas = [...frutas].sort();
console.log("Ordenadas:", ordenadas);

//Uso reduce para crear un string que tenga tpdas las frutas separadas por coma
let textoFrutas = frutas.reduce((acc, f) => acc + ", " + f);
console.log("String:", textoFrutas);
