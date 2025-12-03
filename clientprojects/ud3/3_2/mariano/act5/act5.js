"use strict"

// Constructor Car
function Car(name, model, year) {
    this.name = name;
    this.model = model;
    this.year = year;
}

// Crear un objeto usando el constructor
let miAuto = new Car("Toyota", "Corolla", 2022);

// Imprimir el objeto
console.log(miAuto);
