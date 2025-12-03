// 5. Métodos en objetos y uso de "this"
// ------PUNTOS: 0.5

// Crea un constructor llamado Car que reciba las propiedades name, model y year. 
// Utiliza this dentro del constructor para asignar esas propiedades a los objetos creados con new.

class Car {
    constructor (name, model, year){
        this.name = name;
        this.model = model;
        this.year = year;
    }

    getInfo(){
        return `El coche es ${this.name} ${this.model} ${this.year}`;
    }
}

const car1 = new Car("Toyota", "Corolla", 2020);
console.log(car1.getInfo());