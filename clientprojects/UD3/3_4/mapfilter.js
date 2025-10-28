const productos = [
  { nombre: "Camisa", precio: 25 },
  { nombre: "Pantalón", precio: 40 },
  { nombre: "Zapatos", precio: 60 },
  { nombre: "Gorra", precio: 15 },
  { nombre: "Chaqueta", precio: 80 }
];

// Filtramos productos caros y extraemos sus nombres
console.log(productos.filter(producto => producto.precio > 30).map(producto => producto.nombre));
