const id = Symbol("id");

let empleado = {
  nombre: "Jose Braulio",
  edad: 24,
  [id]: 12345
};

for (let key in empleado) {
  console.log(key + ": " + empleado[key]);
}

console.log(empleado[id]);