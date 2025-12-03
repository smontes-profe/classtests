//Hago el contructor car
function Car(name, model, year) {
    this.name = name;
    this.model = model;
    this.year = year;
}

//Hago el objeto car
let miCoche = new Car("Nissan", "Skyline R34", 1999);
console.log(miCoche);