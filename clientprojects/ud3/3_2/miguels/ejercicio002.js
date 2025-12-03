'use strict';

const persona = {
nombre: "Ana",
edad: 28,
trabajo: "Ingeniera"
};

// Función de impresión
let imprimir = (elemento) => console.log(elemento);

// Comprobamos si existe
imprimir('nombre' in persona);

// Imprimir todas las propiedades
for(const propiedad in persona) {
    imprimir(`Porpiedad ${propiedad}, valor: ${persona[propiedad]}`);
}