// Archivo JavaScript 6
// Crear un símbolo para usar como clave
const empleado = Symbol('idEmpleado');

// Crear un objeto empleado
const emp = {
    nombre: "Ruben",
    puesto: "Legionario",
    [empleado]: 16587
};

console.log(emp);

// Intento de acceder a la propiedad símbolo
for (let clave in emp) {
    console.log(`Clave: ${clave}`); // No mostrará 'idEmpleado'
}

