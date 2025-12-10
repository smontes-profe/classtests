'use strict';

export class Vehicle {

    constructor (nombre) {
        this.nombre = nombre;
    }

    move() {
        console.log(`${this.nombre} se está moviendo.`);
    }

}