"use strict";

/**
 * ¡Vamos a ello\!

Este ejercicio es el "jefe final". Combina todo lo que hemos visto, pero te pide que **compongas** (construyas) una solución más grande.

Tendrás que usar `reduce` para agrupar de forma compleja (como en el último ejercicio) y luego `map` para transformar el resultado.

-----

### 🧩 El Desafío de Composición: Reporte de Inventario

**El Dataset:**
(El mismo, para que no haya sorpresas)

```javascript
const products = [
  { id: 1, name: "Laptop", category: "Electronics", price: 1200, inStock: true },
  { id: 2, name: "Phone", category: "Electronics", price: 800, inStock: true },
  { id: 3, name: "Desk Chair", category: "Furniture", price: 150, inStock: false },
  { id: 4, name: "Coffee Maker", category: "Appliances", price: 80, inStock: true },
  { id: 5, name: "Headphones", category: "Electronics", price: 200, inStock: true },
  { id: 6, name: "Bookshelf", category: "Furniture", price: 100, inStock: true },
];
```

**Tu Objetivo:**
Crea una función `createInventoryReport(products)` que reciba el array de productos y devuelva un **nuevo array** con un objeto de resumen para cada categoría.

**El Resultado Esperado:**
Un **array** (no un objeto) que se vea así:

```javascript
[
  { 
    categoryName: "Electronics", 
    totalValue: 2200,  // La suma de precios (1200 + 800 + 200)
    itemsInStock: 3    // El CONTEO de items con inStock: true
  },
  { 
    categoryName: "Furniture", 
    totalValue: 250,   // (150 + 100)
    itemsInStock: 1     // Solo "Bookshelf" está en stock
  },
  { 
    categoryName: "Appliances", 
    totalValue: 80,    // (80)
    itemsInStock: 1     // "Coffee Maker" está en stock
  }
]
```

**Pistas Clave (Recomendación de 2 Pasos):**

Este problema es mucho más fácil si lo divides en dos partes dentro de tu función:

1.  **Paso 1: El `reduce` (Agrupación)**

      * Usa `reduce` para crear un **objeto** temporal. Este objeto usará las categorías como claves (igual que antes).
      * Pero esta vez, el *valor* de cada clave no será solo un número, sino un **objeto** con el total y el conteo.
      * *Pista del `reduce`*: Cuando inicialices una categoría nueva (`if (!acc[categoria])`), no la iguales a `0`. Iníciala a:
        `acc[categoria] = { totalValue: 0, itemsInStock: 0 };`
      * Luego, en cada iteración, suma al `totalValue` y (solo si `product.inStock` es `true`) suma 1 al `itemsInStock`.
      * Al final del Paso 1, tendrás un objeto así:
        ```javascript
        {
          Electronics: { totalValue: 2200, itemsInStock: 3 },
          Furniture: { totalValue: 250, itemsInStock: 1 },
          Appliances: { totalValue: 80, itemsInStock: 1 }
        }
        ```

2.  **Paso 2: La Transformación (Objeto a Array)**

      * El resultado del Paso 1 es un objeto, pero el ejercicio pide un **array**.
      * ¿Cómo puedes convertir ese objeto en el array deseado?
      * *Pista*: Puedes usar `Object.keys(tuObjeto)` o `Object.values(tuObjeto)` o `Object.entries(tuObjeto)`... y luego encadenar un `.map()` para darle el formato final (añadiendo la `categoryName`).

-----

Este es un patrón de transformación de datos súper realista. ¡Tómate tu tiempo y a por él\!
 */

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

function createInventaryReport(products) {
  const arrayReport = products.reduce((arrayResult, product) => {
    const category = product.category;

    if (!arrayResult[category]) {
      arrayResult[category] = { totalPrice: 0, itemStock: 0 };
    }

    arrayResult[category].totalPrice += product.price;

    if (product.inStock) {
      arrayResult[category].itemStock++;
    }

    return arrayResult;
  }, {});

  return Object.entries(arrayReport).map(([key, value]) => {
    return {
        categoryName: key,
        totalValue: value.totalPrice,
        itemStock: value.itemStock
    };
  });
}

const arrayFinal = createInventaryReport(products);

console.log(arrayFinal);
