"use strict";

// calcula el precio total de todos los productos de la categoria electronics y que estén en stock

const products = [
  {
    id: 1,
    name: "Laptop",
    category: "Electronics",
    price: 1200,
    inStock: true,
  },
  { id: 2, name: "Phone", category: "Electronics", price: 800, inStock: true },
  {
    id: 3,
    name: "Desk Chair",
    category: "Furniture",
    price: 150,
    inStock: false,
  },
  {
    id: 4,
    name: "Coffee Maker",
    category: "Appliances",
    price: 80,
    inStock: true,
  },
  {
    id: 5,
    name: "Headphones",
    category: "Electronics",
    price: 200,
    inStock: true,
  },
  {
    id: 6,
    name: "Bookshelf",
    category: "Furniture",
    price: 100,
    inStock: true,
  },
];

// Nivel middle junior/senior
let productosResult = products
  .filter((producto) => producto.category === "Electronics" && producto.inStock)
  .map((producto) => producto.price)
  .reduce((sumaTotal, precio) => sumaTotal + precio);

console.log(productosResult);

// Nivel senior

let productosSenior = products.reduce((sumaTotal, producto) => {
    if (producto.category === 'Electronics' && producto.inStock) {
        return sumaTotal + producto.price;
    }
    
    return sumaTotal;
}, 0);

console.log(productosSenior);