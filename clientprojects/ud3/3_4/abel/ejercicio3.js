/*
Objetivo: Crear arrays y usar métodos básicos y avanzados.

1.Crea un array frutas con cinco frutas.
2.Añade una fruta al inicio y otra al final.
3.Elimina la primera y la última fruta.
4.Crea un nuevo array frutasMayus con todas las frutas en mayúsculas usando map().
5.Filtra solo las frutas que contengan la letra "a" usando filter().
6.Encuentra la posición de la fruta "Manzana" usando findIndex().
7.Comprueba si alguna fruta empieza con "P" usando some() y si todas las frutas tienen más de 3 letras usando every().
8.Ordena las frutas alfabéticamente usando sort().
9.Usa reduce() para crear un string que contenga todas las frutas separadas por coma.
*/

//1
let frutas = ["melon","naranja","manzana","fresa","pera"];

//2
//Ultimo lugar
frutas.push("kiwi");
//Primer lugar
frutas.unshift("sandia");

//3
//Eliminar ultimo elemento
frutas.pop();
//Eliminar primer elemento
frutas.shift();

//4
//Creamos un array y con map recorremos el array frutas y la convertimos a mayusculas
let frutasMayus = frutas.map(fruta => fruta.toUpperCase());

//5
//hacemos un filtro para que se muestren las frutas que tengan a 
frutas.filter(fruta => fruta.includes("a"));

//6
//Usando el findindex nos aparecera la posicion de manzana
frutas.findindex(frutas => frutas === "manzana");

//7
//Usando el some para saber si empiezan con p
frutas.some(frutas => frutas.startsWith("p"));
//Comprobar si tienen mas de tres letras
frutas.every(frutas => frutas.length > 3);

//8
//Ordenar alfabeticamente usando sort
frutas.sort();

//9
//con reduce vamos a crear un string con todas las frutas separadas por coma
frutas.reduce((acum, fruta) => acum + ", " + fruta);