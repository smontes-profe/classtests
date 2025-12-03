import { empleado } from "./empleado.js";

const id = Symbol("id"); // creamos un símbolo

let empleado1 = new empleado("Ana", "Desarrolladora");

// agregamos una propiedad usando el símbolo como clave
empleado1[id] = 12345;

let idEmpleado1 = empleado1[id];
for (let propiedad in empleado1) {
    console.log(propiedad + ": " + empleado1[propiedad]);
}
console.log("ID del empleado (usando símbolo): " + idEmpleado1);