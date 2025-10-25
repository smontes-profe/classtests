// const persona = {
//   nombre: "Ana",
//   edad: 28,
//   "ciudad originaria": "Madrid"
// };
// const clave = "ciudad originaria";
// console.log(persona[clave]);
// let key = "edad";

// let user = {
//   name: "Ana",
//   age: 28,
//   city: "Madrid"
// };
// let key = "age";
// console.log(user[key]); // 28
// key = "¿Qué quieres saber de la persona? (name, age, city)";
// user[key] = "Te cuento lo que quieras saber"; // Crea una nueva propiedad
// console.log(user[key]); // Muestra el valor actualizado

// const nombre = "Ana";
// const edad = 25;
// const ciudad = "Madrid";

// const persona2 = {
//   nombre,
//   edad,
//   ciudad
// };

// console.log(persona2);
// // { nombre: 'Ana', edad: 25, ciudad: 'Madrid' }

// class Persona {
//   constructor(nombre, edad, ciudad) {
//     this.nombre = nombre;
//     this.edad = edad;
//     this.ciudad = ciudad;
//   }

//   saludar() {
//     console.log(`Hola, soy ${this.nombre}`);
//   }
// }
// const ana = new Persona("Ana", 25, "Madrid");
// ana.saludar();
// for (let propiedad in ana) {
//   console.log(propiedad, ":", ana[propiedad]);
// }


// const password = Symbol("pass");
// const user = {
//   nombre: "María",
//   [password]: "secreto123"
// };
// for (let propiedad in user) {
//   console.log(propiedad, ":", user[propiedad]); // Muestra solo 'nombre : María'
// }
// console.log(user[password]); // Muestra 'secreto123'

// Crear contenido de la ventana hija usando DOM
// let nombre = "Ana";
// console.log('Hola ${nombre}'); // ❌ Esto NO funciona

class Animal {
  constructor(nombre) {
    this.nombre = nombre;
  }
  comer() {
    console.log(`${this.nombre} está comiendo.`);
  }
}

class Perro extends Animal {
  constructor(nombre, raza) {
    super(nombre); // Llama al constructor de Animal
    this.raza = raza;
  }
  ladrar() {
    console.log(`${this.nombre} ladra: ¡Guau!`);
  }
}

const miPerro = new Perro("Bumblebee", "mixto");
miPerro.comer();   // "Bumblebee está comiendo." (método heredado)
miPerro.ladrar();  // "Bumblebee ladra: ¡Guau!" (método propio)
console.log(miPerro.raza); // "mixto"


class PerroDormilon extends Perro {
  constructor(nombre, raza) {
    super(nombre, raza);
  }
  ladrar() { // Sobreescribe ladrar()
    super.ladrar(); // Llama al ladrar() de la superclase
    console.log("...y luego se echa una siesta.");
  }
}

const perroSiesta = new PerroDormilon("Tara", "Mixto");
perroSiesta.ladrar();
// "Bumblebee ladra: ¡Guau!"
// "...y luego se echa una siesta."

// const boton = document.getElementById("abrirVentana");
// boton.addEventListener("click", () => {
//   let win = window.open("", "msg", "width=400,height=300");
//   if (!win) {
//     alert("La ventana fue bloqueada por el navegador");
//     return;
//   }

//   win.document.body.innerHTML = "<h2>Ventana hija</h2><p id='mensaje'>Esperando mensaje...</p>";

//     // Agregar script para escuchar mensajes en la ventana hija
//   const script = win.document.createElement("script");
//   script.textContent = `
//     window.addEventListener("message", (event) => {
//       const mensaje = document.getElementById("mensaje");
//       mensaje.textContent = "Mensaje recibido: " + event.data;

//       // Responder al padre
//       window.opener.postMessage("Hola desde la ventana hija!", "*");
//     });
//   `;
//   win.document.body.appendChild(script);

//   // Enviar un mensaje desde la ventana principal
//   win.postMessage("Hola desde la ventana principal", "*");

//   // Escuchar mensajes de la ventana hija
//   window.addEventListener("message", (event) => {
//     console.log("Mensaje recibido de la ventana hija:", event.data);
//   });
// });

