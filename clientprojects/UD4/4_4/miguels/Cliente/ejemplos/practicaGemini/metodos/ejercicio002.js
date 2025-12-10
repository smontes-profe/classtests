'use strict';


/**
 * ¡Vamos a ello!

Como comentamos, este ejercicio se centra en usar reduce para una tarea más compleja que simplemente sumar: agrupar datos.

🏋️ El Ejercicio 2: Agrupando Productos
El Dataset: (Es el mismo de antes, para que te sea familiar)

JavaScript

const products = [
  { id: 1, name: "Laptop", category: "Electronics", price: 1200, inStock: true },
  { id: 2, name: "Phone", category: "Electronics", price: 800, inStock: true },
  { id: 3, name: "Desk Chair", category: "Furniture", price: 150, inStock: false },
  { id: 4, name: "Coffee Maker", category: "Appliances", price: 80, inStock: true },
  { id: 5, name: "Headphones", category: "Electronics", price: 200, inStock: true },
  { id: 6, name: "Bookshelf", category: "Furniture", price: 100, inStock: true },
];
Tu Objetivo: Usa el método reduce() para transformar el array products en un objeto.

Este objeto debe tener como claves (keys) los nombres de las categorías, y como valores (values) un array de los productos que pertenecen a esa categoría.
 */


const products = [
  { id: 1, name: "Laptop", category: "Electronics", price: 1200, inStock: true },
  { id: 2, name: "Phone", category: "Electronics", price: 800, inStock: true },
  { id: 3, name: "Desk Chair", category: "Furniture", price: 150, inStock: false },
  { id: 4, name: "Coffee Maker", category: "Appliances", price: 80, inStock: true },
  { id: 5, name: "Headphones", category: "Electronics", price: 200, inStock: true },
  { id: 6, name: "Bookshelf", category: "Furniture", price: 100, inStock: true },
];

// Enfoque middle
let productosAgrupadosCategoria = products.reduce((arrayObjetos, producto) => {

    let categoria = producto.category;

    if (!arrayObjetos[categoria]) {
        arrayObjetos[categoria] = [];
    }

    arrayObjetos[categoria].push(producto);

    return arrayObjetos;

}, {});

console.log(productosAgrupadosCategoria);

// Enfoque senior

let arrayOrdenadoCate = Object.groupBy(products, producto => producto.category);
console.log(arrayOrdenadoCate);