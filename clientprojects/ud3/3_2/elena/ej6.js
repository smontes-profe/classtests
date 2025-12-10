
// Symbol y claves ocultas

const id = Symbol('id');

let empleado = {
    nombre: 'Elena',
    [id]: 12345
};

for (let clave in empleado) {
    console.log(clave); 
}

console.log(empleado[id]);


