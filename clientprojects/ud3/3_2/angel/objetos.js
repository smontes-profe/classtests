"use strict";

//! ************************************************************************************************************************************** //
console.log("1. Creación y acceso a objetos.");

let persona = {
  nombre: "Ana",
  edad: 28,
  trabajo: "Ingeniera",
};

console.log(persona.nombre); // Ana
console.log(persona.edad); // 28

persona.pais = "España";
console.log(persona.pais); // España

delete persona.trabajo;
console.log(persona.trabajo); // undefined

for (let clave in persona) {
  console.log(clave + ": " + persona[clave]);
}

//! ************************************************************************************************************************************** //
console.log("");
console.log('2. Operador "in" y bucle "for...in."');

let apellidoExiste = false;
// Verifico si existe la clave "nombre" en el objeto persona y verifico si no existe la clave "Apellido"
for (let clave in persona) {
  if (clave === "nombre")
    console.log(
      'La clave "nombre" existe en el objeto persona. Y su propiedad es: ' +
        persona[clave] +
        "."
    );
  if (clave === "Apellido") apellidoExiste = true;
}
if (!apellidoExiste)
  console.log("La clave 'Apellido' no existe en el objeto persona.");

for (let clave in persona) {
  console.log(clave + ": " + persona[clave]);
}

//! ************************************************************************************************************************************** //
console.log("");
console.log("3. Referencias de objetos y clonación.");

let usuario1 = {
  nombre: "Juan",
  edad: 30,
  email: "juanjuanitojuan@gmail.com",
};

console.log("Muestro valores de Juan con 'Usuario1'.");
for (let clave in usuario1) {
  console.log(clave + ": " + usuario1[clave]);
}

let usuario2 = usuario1; // Referencia al mismo objeto

usuario2.edad = 60; // Modifico la edad a través de usuario2

console.log(
  "Muestro valores de Juan con 'Usuario1' después de modificar la edad a través de 'Usuario2'."
);
for (let clave in usuario1) {
  console.log(clave + ": " + usuario1[clave]);
}

let usuario3 = Object.assign({}, usuario1); // Clonación del objeto
usuario3.edad = 90; // Modifico la edad en el objeto clonado pero no en el original

console.log(
  "Muestro valores de Juan con 'Usuario1' después de modificar la edad en 'Usuario3'."
);
for (let clave in usuario1) {
  console.log(clave + ": " + usuario1[clave]);
}

//! ************************************************************************************************************************************** //
console.log("");
console.log('5. Métodos en objetos y uso de "this".');

function Car5(name, model, year) {
  this.name = name;
  this.model = model;
  this.year = year;
}

let myCar = new Car5("Ford", "Mustang", 1969);

for (let clave in myCar) {
  console.log(clave + ": " + myCar[clave]);
}

//! ************************************************************************************************************************************** //
console.log("");
console.log("6. Symbol y claves ocultas.");

let empleado = {
  nombre: "Luis",
  puesto: "Desarrollador",
  sueldo: 50000,
};

const idEmpleado = Symbol("idEmpleado");
empleado[idEmpleado] = 2;

for (let clave in empleado) {
  console.log(clave + ": " + empleado[clave]);
}

//! ************************************************************************************************************************************** //
console.log("");
console.log("7. Conversión de objetos a valores primitivos.");

let cuentaBancaria = {
  saldo: 1000,

  toString: function () {
    return `Saldo: ${this.saldo} EUR`;
  },
};

console.log(cuentaBancaria.toString()); // Saldo: 1000 EUR

//! ************************************************************************************************************************************** //
console.log("");
console.log("8. Herencia de Clases.");

// Creo clase base Vehicle
class Vehicle {
  constructor(name) {
    this.name = name;
  }

  move() {
    console.log(this.name + " se está moviendo.");
  }
}

// Creo clase derivada Car que hereda de Vehicle
class Car8 extends Vehicle {
  constructor(name, model) {
    super(name);
    this.model = model;
  }

  move() {
    console.log(this.name + " is Rolling out!.");
  }

  info() {
    for (let clave in this) {
      console.log(clave + ": " + this[clave]);
    }
  }
}

let myNewCar = new Car8("Toyota", "Corolla");
myNewCar.move(); // Toyota is Rolling out!.
myNewCar.info(); // Muestra las propiedades del objeto

//! ************************************************************************************************************************************** //
console.log("");
console.log("9. Encapsulación con Propiedades Privadas.");

class CajaFuerte {
    propietario;
    #codigoSecreto; // Propiedad privada

    constructor(propietario, codigoSecreto) {
        this.propietario = propietario;
        this.#codigoSecreto = codigoSecreto;
    }

    verCodigo() {
        return this.#codigoSecreto;
    }

    cambiarCodigo(nuevoCodigo) {
        if (nuevoCodigo.length == 4) {
            this.#codigoSecreto = nuevoCodigo;
            console.log("Código cambiado exitosamente.");
        } else {
            console.log("El código debe tener 4 dígitos.");
        }
    }
}

let miCaja = new CajaFuerte("Ángel", "5002");
miCaja.verCodigo(); // Devuelve "5002"
miCaja.cambiarCodigo("5678"); // Cambia el código a "5678"
// console.log(miCaja.#codigoSecreto); // Error: No se puede acceder a la propiedad privada

//! ************************************************************************************************************************************** //
console.log("");
console.log("10. Objeto window, DOM y eventos:");

// Está en otro js y otro html ;)