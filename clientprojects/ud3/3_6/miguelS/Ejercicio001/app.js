'use strict';
import { Tarea } from './Tarea.js';

const tarea1 = new Tarea('Aprender JavaScript');
const tarea2 = new Tarea('Practicar programación');


console.log(tarea1.toString());
console.log(tarea2.toString());

tarea1.completar();

console.log(tarea1.toString());
console.log(tarea2.toString());