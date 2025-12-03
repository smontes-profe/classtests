//  Creamos el objetp Car usando una función constructora
function Car(make, model, year) {
    this.make = make;
    this.model = model;
    this.year = year;
}

//Creamos los objetos 
const car1 = new Car('Audi', 'A3', 2000);
const car2 = new Car('BMW','X5', 2006);

//Mostrar los objetos en la consola
console.log(car1);
console.log(car2);