// Archivo JavaScript 2
const persona = {
    nombre: "Ana",
    edad: 28,
    pais: "ESPAÑA"
};

// Verificar la existencia de propiedades
const tieneNombre = "nombre" in persona;
console.log(`¿Tiene propiedad 'nombre'? ${tieneNombre}`);

const tieneTrabajo = "trabajo" in persona;
console.log(`¿Tiene propiedad 'trabajo'? ${tieneTrabajo}`);

// Recorrer las propiedades del objeto
for (let clave in persona) {
    console.log(`Clave: ${clave}, Valor: ${persona[clave]}`);
}