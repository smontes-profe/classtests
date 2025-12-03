// 6. Symbol y claves ocultas
// ------PUNTOS: 1

// Crea un símbolo id para usarlo como clave en un objeto empleado. 
// Añade la propiedad id utilizando el símbolo como clave y
// luego intenta acceder a ella con un bucle for...in (debería ser ignorada en la iteración).

const id = Symbol("id");

const empleado = {
    nombre: "Ana",
    edad: 28,
    [id]: 1234567890
};

console.log(empleado);

for (const propiedad in empleado) {
    console.log(propiedad);
}