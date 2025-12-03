//Crea un símbolo id para usarlo como clave en un objeto empleado. Añade la propiedad id utilizando el símbolo como clave y luego intenta acceder a ella con un bucle for...in (debería ser ignorada en la iteración).
// EJERCICIO 6
let empleado = {
    nombre: "Rafa",
    puesto: "Freelancer"
};
let id = Symbol("id");
empleado[id] = 1;
for (let clave in empleado) {
    console.log(`${clave}: ${empleado[clave]}`);
}