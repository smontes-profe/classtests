"use strict";

//! ***************************************************************************************
console.log("Ejercicio 1: Funciones predefinidas y manipulación básica.");

let array = [4.7, 2.3, 9.8, 6.5];

console.log(
  "Redondea todos los números hacia arriba usando una función predefinida."
);
for (let i = 0; i < array.length; i++) {
  console.log(Math.ceil(array[i]));
}

console.log("Convierte todos los números a strings y muestra su longitud.");
for (let i = 0; i < array.length; i++) {
  let stringArray = array[i].toString();
  console.log(
    "La cadena es: " +
      stringArray +
      " y su longitud es de: " +
      stringArray.length
  );
}

console.log("Calcula el mayor y el menor valor usando funciones Math.");
console.log("El número mayor es: " + Math.max(...array));
console.log("El número menor es: " + Math.min(...array));

let string = "JavaScript";

console.log("Convierte todas las letras a mayúsculas.");
console.log(string.toUpperCase());

console.log("Obtén los 4 primeros caracteres usando un método de string.");
console.log(string.slice(0, 4));

console.log("Verifica si contiene la letra 'S' (mayúscula).");
for (let i = 0; i < string.length; i++) {
  if (string.charAt(i) === "S") console.log("Contiene la 'S' en mayúscula.");
}

//! ***************************************************************************************
console.log("");
console.log("Ejercicio 2: Funciones definidas por el usuario.");

console.log(
  "Crea una función saludar(nombre) que reciba un nombre y devuelva 'Hola, [nombre]!'."
);
function saludar(nombre) {
  console.log("¡Hola, " + nombre + "!");
}
saludar("María");

console.log(
  "Crea una función esPar(numero) que devuelva true si el número es par, false si es impar."
);
function esPar(numero) {
  return numero % 2 === 0;
}
console.log("¿El número 7 es par? " + esPar(7));

console.log(
  "Crea una función operacionArray(arr, callback) que reciba un array de números y una función callback, y aplique la callback a cada elemento del array (usa for…of o forEach)."
);
function operacionArray(arr, callback) {
  arr.forEach(callback);
}
operacionArray([2, 4, 6, 8], function (num) {
  console.log("Número multiplicado por 2: " + num * 2);
});

console.log(
  "Crea una función flecha promedio = arr => … que devuelva el promedio de un array de números utilizando reduce."
);
function promedio(arr) {
  return arr.reduce((acc, val) => acc + val, 0) / arr.length;
}
console.log("El promedio de [3, 6, 9] es: " + promedio([3, 6, 9]));

//! ***************************************************************************************
console.log("");
console.log("Ejercicio 3: Arrays – creación y manipulación.");

console.log("Crea un array frutas con cinco frutas.");
let frutas = ["manzana", "banana", "cereza", "durazno", "uva"];

console.log("Añade una fruta al inicio y otra al final.");
frutas.unshift("kiwi");
frutas.push("mango");
console.log(frutas);

console.log("Elimina la primera y la última fruta.");
frutas.shift();
frutas.pop();
console.log(frutas);

console.log(
  "Crea un nuevo array frutasMayus con todas las frutas en mayúsculas usando map()."
);
let frutasMayus = frutas.map((fruta) => fruta.toUpperCase());
console.log(frutasMayus);

console.log(
  "Filtra solo las frutas que contengan la letra 'a' usando filter()."
);
let frutasConA = frutas.filter((frutas) => frutas.includes("a"));
console.log(frutasConA);

console.log("Encuentra la posición de la fruta 'Manzana' usando findIndex().");
let posicionManzana = frutas.findIndex(
  (fruta) => fruta.toLowerCase() === "manzana"
);
console.log("La posición de 'Manzana' es: " + posicionManzana);

console.log(
  "Comprueba si alguna fruta empieza con 'P' usando some() y si todas las frutas tienen más de 3 letras usando every()."
);
let frutaConP = frutas.some((fruta) => fruta.toLowerCase().includes("p"));
console.log("Que fruta/s contiene la letra 'p'? " + frutaConP);
let frutaCon3Letras = frutas.every((fruta) => fruta.length >= 3);
console.log("Que fruta/s tienen más de 3 letras? " + frutaCon3Letras);

console.log("Ordena las frutas alfabéticamente usando sort().");
let frutasOrdenadas = frutas.sort();
console.log("Frutas ordenadas alfabéticamente: " + frutasOrdenadas);

console.log(
  "Usa reduce() para crear un string que contenga todas las frutas separadas por coma."
);
let frutasString = frutas.reduce((acc, fruta) => acc + ", " + fruta);
console.log("Frutas en un string: " + frutasString);

//! ***************************************************************************************
console.log("");
console.log("Ejercicio 4: Operaciones combinadas y encadenamiento.");

let numeros = [1, 4, 7, 10, 15];
console.log("Filtra los números mayores que 5.");
console.log("Multiplica cada número filtrado por 2.");
console.log("Calcula la suma de todos los números resultantes.");
let sumaTotal = numeros
  .filter((num) => num > 5)
  .map((num) => num * 2)
  .reduce((acc, val) => acc + val, 0);
console.log("La suma total es: " + sumaTotal);

let usuarios = [
  { nombre: "Ana", edad: 23 },
  { nombre: "Luis", edad: 19 },
  { nombre: "Marta", edad: 30 },
];

console.log("Filtra los mayores de 20.");
let usuariosMayoes20 = usuarios.filter((usuario) => usuario.edad >= 20);
console.log("Usuarios mayores de 20 años: ", usuariosMayoes20);

console.log("Obtén un array con solo sus nombres usando map().");
let ususariosNombres = usuarios.map((usuario) => usuario.nombre);
console.log("Nombres de los usuarios: ", ususariosNombres);

console.log("Ordena los nombres alfabéticamente usando sort().");
let usuariosOrdenados = usuarios.sort((a, b) =>
  a.nombre.localeCompare(b.nombre)
);
console.log("Usuarios ordenados: ", usuariosOrdenados);

//! ***************************************************************************************
console.log("");
console.log("Ejercicio 5: Gestión de Inventario con funciones avanzadas.");

let productos = [
  { nombre: "Teclado", precio: 50, stock: 10 },
  { nombre: "Ratón", precio: 20, stock: 0 },
  { nombre: "Monitor", precio: 200, stock: 5 },
  { nombre: "USB", precio: 10, stock: 25 },
];

console.log(
  "Crea una función productosConStock(arr) que devuelva solo los productos con stock > 0."
);
function productosConStock(arr) {
  return arr.filter((producto) => producto.stock > 0);
}

console.log(
  "Crea una función incrementarPrecio(arr, porcentaje) que devuelva un nuevo array aumentando el precio en ese %."
);
function incrementarPrecio(arr, porcentaje) {
  return arr.map((producto) => {
    return {
      ...producto,
      precio: producto.precio + (producto.precio * porcentaje) / 100,
    };
  });
}

console.log(
  "Crea una función calcularValorTotalInventario(arr) que use reduce() y devuelva el valor total del inventario disponible."
);
function calcularValorTotalInventario(arr) {
  return arr.reduce(
    (acc, producto) => acc + producto.precio * producto.stock,
    0
  );
}

console.log(
  "Crea una función calcularValorTotalInventario(arr) que use reduce() y devuelva el valor total del inventario disponible."
);
console.log("Productos con stock: ", productosConStock(productos));
console.log(
  "Productos con precio incrementado en 10%: ",
  incrementarPrecio(productos, 10)
);
console.log(
  "Valor total del inventario disponible: ",
  calcularValorTotalInventario(productos)
);

//! ***************************************************************************************
console.log("");
console.log("Ejercicio 6: Ordenar, agrupar y validar datos.");

let estudiantes = [
  { nombre: "Ana", nota: 9 },
  { nombre: "Luis", nota: 4 },
  { nombre: "Marta", nota: 7 },
  { nombre: "Pedro", nota: 5 },
  { nombre: "Sara", nota: 9 },
];

console.log(
  "Ordena a los estudiantes por nota de mayor a menor (sin modificar el original)."
);
let estudiantesOrdenados = [...estudiantes].sort((a, b) => b.nota - a.nota);
console.log("Estudiantes ordenados: ", estudiantesOrdenados);

console.log("Comprueba:");
console.log("   - si todos han aprobado (nota >= 5).");
console.log("   - si alguno tiene matrícula de honor (nota >= 9).");
let todosAprobados = estudiantes.every((estudiante) => estudiante.nota >= 5);
let algunoMatriculaHonor = estudiantes.some(
  (estudiante) => estudiante.nota >= 9
);
console.log("¿Todos han aprobado? " + todosAprobados);
console.log("¿Alguno tiene matrícula de honor? " + algunoMatriculaHonor);

console.log(
  "Agrupa los estudiantes por nota usando reduce() (objeto cuyo índice sea la nota)."
);
let estudiantesAgrupados = estudiantes.reduce((acc, estudiante) => {
  if (!acc[estudiante.nota]) {
    acc[estudiante.nota] = [];
  }
  acc[estudiante.nota].push(estudiante.nombre);
  return acc;
}, {});
console.log("Estudiantes agrupados por nota: ", estudiantesAgrupados);

console.log(
  "Genera un array de strings con formato 'Nombre - Nota' usando map()."
);
let estudiantesFormato = estudiantes.map(
  (estudiante) => estudiante.nombre + " - " + estudiante.nota
);
console.log("Estudiantes en formato string: ", estudiantesFormato);

//! ***************************************************************************************
console.log("");
console.log(
  "jercicio 7: Sistema de gestión de tareas (CRUD básico con arrays)."
);

let tareas = [
  { id: 1, titulo: "Estudiar JavaScript", completada: false },
  { id: 2, titulo: "Comprar pan", completada: true },
  { id: 3, titulo: "Hacer ejercicio", completada: false }
];

console.log("generarId(arr) → Devuelve el id siguiente.");
function generarId(arr) {
  return arr.length > 0 ? Math.max(...arr.map(tarea => tarea.id)) + 1 : 1;
}

console.log("AgregarTarea(arr, titulo) → añade una nueva tarea con id autogenerada.");
function AgregarTarea(arr, titulo) {
  const nuevaTarea = {
    id: generarId(arr),
    titulo: titulo,
    completada: false
  };
  arr.push(nuevaTarea);
}

console.log("CompletarTarea(arr, id) → marca como completada la tarea con ese id.");
function CompletarTarea(arr, id) {
  const tarea = arr.find(tarea => tarea.id === id);
    if (tarea) {
        tarea.completada = true;
    }
}

console.log("EliminarTarea(arr, id) → elimina la tarea correspondiente.");
function EliminarTarea(arr, id) {
  const index = arr.findIndex(tarea => tarea.id === id);
    if (index !== -1) {
        arr.splice(index, 1);
    }
}

console.log("ObtenerPendientes(arr) → devuelve las tareas !completada.");
function ObtenerPendientes(arr) {
  return arr.filter(tarea => !tarea.completada);
}

console.log("ContarCompletadas(arr) → usando reduce().");
function ContarCompletadas(arr) {
  return arr.reduce((acc, tarea) => tarea.completada ? acc + 1 : acc, 0);
}