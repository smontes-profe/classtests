/* --- app.js --- */

// 1. Seleccionamos los elementos *fuera* de la función.
// Estos son los elementos que ya existen en el HTML.
const contenedor = document.querySelector('#tienda-container');
const boton = document.querySelector('#btn-agregar');

// 3. Creamos la función que "sabe" cómo construir una tarjeta
function crearTarjetaProducto() {
  
  // 4. Todo el código de creación va DENTRO de la función:

  // --- Inicio del código del ejercicio anterior ---
  
  // Crear el elemento <div> (el contenedor de la tarjeta)
  const tarjetaDiv = document.createElement('div');
  tarjetaDiv.classList.add('producto');

  // Crear el <h2>, ponerle texto y su clase
  const tituloH2 = document.createElement('h2');
  tituloH2.textContent = 'Monitor Curvo 27"';
  tituloH2.classList.add('producto-titulo');

  // Crear el <p> del precio, ponerle texto y su clase
  const precioP = document.createElement('p');
  precioP.textContent = 'Precio: 299€';
  precioP.classList.add('producto-precio');

  // Crear el <p> del stock, ponerle texto y su clase
  const stockP = document.createElement('p');
  stockP.textContent = 'Agotado temporalmente';
  stockP.classList.add('agotado');

  // Ensamblar la Tarjeta: añadir los hijos al <div>
  tarjetaDiv.appendChild(tituloH2);
  tarjetaDiv.appendChild(precioP);
  tarjetaDiv.appendChild(stockP);

  // --- Fin del código del ejercicio anterior ---

  // El último paso de la función es añadir la tarjeta creada al DOM
  contenedor.appendChild(tarjetaDiv);
}

// 5. Añadimos el "escuchador" al botón
// Le decimos: "Cuando alguien haga 'click' en ti,
// ejecuta la función crearTarjetaProducto"
boton.addEventListener('click', crearTarjetaProducto);