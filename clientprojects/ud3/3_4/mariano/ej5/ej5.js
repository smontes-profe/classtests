"use strict"




let productos = [
    { nombre: "Teclado", precio: 50, stock: 10 },
    { nombre: "Ratón", precio: 20, stock: 0 },
    { nombre: "Monitor", precio: 200, stock: 5 },
    { nombre: "USB", precio: 10, stock: 25 }
  ];
  
  console.log("Inventario inicial:", productos);
  
  
  // 1️ Función que devuelve solo los productos con stock > 0
  function productosConStock(arr) {
    return arr.filter(p => p.stock > 0);
  }
  
  
  console.log("\nProductos con stock disponible:");
  console.log(productosConStock(productos));
  
  
  // 2️ Función que incrementa el precio de todos los productos en un porcentaje dado
  function incrementarPrecio(arr, porcentaje) {
    return arr.map(p => ({ ...p, 
      precio: p.precio + (p.precio * porcentaje / 100)
    }));
  }
 
  console.log("\nPrecios incrementados en 10%:");
  console.log(incrementarPrecio(productos, 10));
  
  
  // 3️ Función que calcula el valor total del inventario disponible
  
  function calcularValorTotalInventario(arr) {
    return arr.reduce((total, p) => total + (p.precio * p.stock), 0);
  }
  
  // Ejemplo:
  console.log("\nValor total del inventario actual:");
  console.log("$" + calcularValorTotalInventario(productos));
  
  
  // 4️ Encadenar funciones:
  const valorFinal = calcularValorTotalInventario(
    incrementarPrecio(productosConStock(productos), 10)
  );
  
  console.log("\nValor total del inventario tras aumento del 10%:");
  console.log("$" + valorFinal.toFixed(2));
  