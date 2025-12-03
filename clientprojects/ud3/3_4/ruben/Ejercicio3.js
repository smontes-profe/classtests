let frutas = ["manzana", "banana", "pera", "melon", "sandia"];
console.log(frutas);

frutas.push("kiwi"); // agrega al final
console.log(frutas);

frutas.unshift("papaya"); // agrega al inicio
console.log(frutas);

frutas.pop(); // elimina el ultimo elemento
frutas.shift(); // elimina el primer elemento

console.log(frutas);

frutasMayus = frutas.map(u => u.toUpperCase())
console.log(frutasMayus);