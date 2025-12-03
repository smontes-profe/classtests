class Vehicle{
    constructor(nombre){
        this.nombre = nombre;
    }
    move(){
        console.log(this.nombre + " se está moviendo");
    }
}
class Car extends Vehicle{
    constructor(nombre, modelo){
        super(nombre);
        this.modelo = modelo;
    }
    move(){
        console.log(this.nombre + " is Rolling out!");
    }
    info(){
        console.log(`Car Name: ${this.nombre}, Model: ${this.modelo}`);
    }
}
export {Vehicle, Car};