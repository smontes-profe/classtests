'use strict';


// Creación de objeto con propiedades
const persona = {
nombre: "Ana",
edad: 28,
trabajo: "Ingeniera"
};

// Función de impresión
let imprimir = (elemento) => console.log(elemento);

// Acceso a sus propiedades/valores
imprimir(persona.nombre);
imprimir(persona.edad);
imprimir(persona.trabajo);

// Añadir nueva propiedad
persona.pais = "España";

// Eliminamos la propiedad trabajo
delete persona.trabajo;

imprimir(persona);

