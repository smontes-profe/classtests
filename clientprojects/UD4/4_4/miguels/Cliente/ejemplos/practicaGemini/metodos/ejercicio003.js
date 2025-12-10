"use strict";

/**
 * ¡Perfecto\! Vamos con el último desafío.

Este ejercicio es la combinación final. Usarás la lógica de "agrupar" de `reduce` (como en el Ejercicio 2), pero en lugar de crear arrays, "reducirás" (sumarás) los valores, como en el Ejercicio 1.

-----

### 🏆 El Reto Final: Valor de Inventario por Categoría

**El Dataset:**
(Es el mismo de siempre)

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
Calcula el **valor total del inventario** (la suma de `price`) **para cada categoría**. No importa si está en stock o no.

**El Resultado Esperado:**

```javascript
{
  Electronics: 2200, // (1200 + 800 + 200)
  Furniture: 250,    // (150 + 100)
  Appliances: 80
}
```

**Pista Clave:**
Tu solución será **casi idéntica** a la del ejercicio anterior (el de agrupar). Estás usando `reduce` para construir un objeto (`{}`).

La gran diferencia está dentro del `reduce`:

1.  En el ejercicio anterior, si la categoría no existía (`!grupos[categoria]`), la inicializabas con un array vacío (`[]`). Ahora que quieres sumar números, ¿con qué valor deberías inicializarla?
2.  En el ejercicio anterior, después del `if`, añadías el producto al array (`grupos[categoria].push(producto)`). Ahora, ¿qué operación debes hacer con `producto.price`?

-----

¡A por ello\! Pega tu código cuando lo tengas. Esta es la prueba de fuego de `reduce`.
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

let categoryPriceTotal = products.reduce((arrayObjetc, producto) => {
  const categoria = producto.category;

  const totalActual = arrayObjetc[categoria] || 0;

  arrayObjetc[categoria] = totalActual + producto.price;

  return arrayObjetc;
}, {});

console.log(categoryPriceTotal);
