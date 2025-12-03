//Crear el simbolo único
const id = Symbol('id');

//Objeto empleado
let empleado = {
    nombre: 'Israel',
    puesto: 'Jefe de proyecto',
};

//Asignar el símbolo como propiedad
empleado[id] = 12345;

console.log(empleado);
console.log('ID del empleado:', empleado[id]);


//Intentar acceder a las propiedades con for... in
console.log("Recorriendo propiedades con for...in:");
for (let clave in empleado) {
    console.log(clave + ": " + empleado[clave]);
}

//Sin for ... in, acceder directamente al símbolo
console.log("ID:", empleado[id]);