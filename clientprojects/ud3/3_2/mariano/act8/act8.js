"use strict"

// Clase base Vehicle
class Vehicle {
    constructor(name) {
        this.name = name;
    }

    move() {
        console.log(`${this.name} se está moviendo`);
    }
}

// Clase hija Car que extiende de Vehicle
class Car extends Vehicle {
    constructor(name, model) {
        super(name); 
        this.model = model;
    }

    // Sobrescribir método move()
    move() {
        console.log(`${this.name} is Rolling out!`);
    }

    // Método adicional info()
    info() {
        console.log(`Nombre: ${this.name}, Modelo: ${this.model}`);
    }
}

// Crear objeto Car
let myCar = new Car("Toyota", "BZ4X");

// Llamar a los métodos
myCar.move(); 
myCar.info(); 
