"use strict";

// Crea un constructor llamado Car que reciba las propiedades name, model y year. 
// Utiliza this dentro del constructor para asignar esas propiedades a los objetos creados con new.

function Car(name, model, years) {
    this.name = name;
    this.model = model;
    this.years = years;
}

const car1 = new Car("Tesla", "3y","2019");
const car2 = new Car("Citroen", "DS4","2013");
const car3 = new Car("TOYOTA", "Yaris","2017");

console.log(car1);
console.log(car2);
console.log(car3);