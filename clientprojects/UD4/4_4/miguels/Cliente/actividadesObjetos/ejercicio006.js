'use strict';

//Crea un símbolo id para usarlo como clave en un objeto empleado. 
// Añade la propiedad id utilizando el símbolo como clave y luego intenta acceder a 
// ella con un bucle for...in (debería ser ignorada en la iteración).

const IDSym = Symbol('IDSym');

const usuario = {
    [IDSym]: 221133,
    nombre: "Miguel",
    apellidos: "Sanchez"
};

// console.log(usuario[IDSym]);

for (let propiedades in usuario) {
    console.log(propiedades);
}