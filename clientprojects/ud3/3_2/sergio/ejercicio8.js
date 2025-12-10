//Creo la clase base
class Vehicle {
    constructor(name) {
        this.name = name;
    }
    move() {
        console.log(this.name + " se esta moviendo")
    }
}

//Creo la clase hija
class Car extends Vehicle {
    constructor(name, model){
        //LLamo al constructor de vehicle
        super(name)
        this.model = model
    }
    move() {
        console.log(this.name + "is Rolling out!")
    }
    info() {
        console.log("Nombre: " + this.name + ", Modelo: " + this.model);
    }
}

//Creo el objeto mycar
let myCar = new Car("Toyota", "BZ4X");
myCar.move();
myCar.info();