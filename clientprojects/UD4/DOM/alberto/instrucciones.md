 No puedes modificar el archivo HTML. Debes crear un archivo app.js (enlazado con defer en el head del HTML) que resuelva todos los ejercicios siguientes.
 Ejercicio 1: Selección de Elementos
Guarda en una variable el elemento con ID titulo-principal.
Guarda en una variable el primer elemento con clase subtitulo.
Guarda en una variable una NodeList con todos los elementos <img> que tengan la clase thumb.
Guarda en una variable el elemento <button> que tiene el ID btn-add-task.
Imprime por consola el contenido de texto de estas variables.


Ejercicio 2: El Interruptor
Añade un addEventListener al botón btn-toggle.
Al hacer click, el div con ID light-bulb debe intercambiar (toggle) las clases luz-apagada y luz-encendida.
(Prohibido usar elemento.style).


Ejercicio 3: Editor de Perfil
Selecciona el elemento con clase profile-name y cambia su textContent por "Mi Nombre de Alumno".
Selecciona el elemento con clase profile-desc y cambia su textContent por "Estudiante de 2º de DAW".
Selecciona el section con ID profile-card y usa setAttribute para cambiar su atributo data-user-id a "DWEC-001".


Ejercicio 4: Galería de Imágenes
Selecciona la imagen principal (main-image).
Selecciona todas las miniaturas (.thumb).
Usando un bucle (forEach), añade un addEventListener de tipo click a cada miniatura.
Cuando se haga clic en una miniatura, la propiedad src de la imagen principal debe cambiar por la propiedad src de la miniatura que fue clicada.


Ejercicio 5: Añadir Tareas
Añade un addEventListener al botón btn-add-task.
Al hacer click:
Lee el valor (value) del input (input-new-task).
Si el valor no está vacío:
Crea un nuevo elemento <li>.
Establece el textContent del <li> al valor del input.
Añade (con appendChild) el nuevo <li> a la lista task-list.
Limpia el valor del input (déjalo en "").


Ejercicio 6: El Modal
Selecciona el modal (#modal), el botón para abrir (#btn-open-modal) y el botón para cerrar (#btn-close-modal).
Añade un click listener a btn-open-modal que quite la clase hidden del modal.
Añade un click listener a btn-close-modal que añada la clase hidden al modal.
(Prohibido usar elemento.style.display).


Ejercicio 7: Notificación Avanzada
Selecciona el div con ID status-box.
Usa innerHTML para cambiar su contenido a: <strong>Estado:</strong> <span class="status-success">Conectado</span>.
(Desafío): 3 segundos después de cargar la página, vuelve a seleccionar el span interno (que ahora tiene la clase status-success) y cámbiale la clase a status-error, y su textContent a "Desconectado". (Pista: necesitarás setTimeout).

Ejercicio 8: Preguntas Teóricas
En un bloque de comentarios al final de tu app.js, responde:
Criterio (h): ¿Por qué es preferible usar elemento.classList.add('mi-clase') en lugar de elemento.style.color = 'blue' para cambiar la apariencia de un elemento?
Criterios (f, g, e): ¿Cuál es la forma estándar de añadir un evento (como un clic) a un botón? ¿Por qué esta forma es mejor para la compatibilidad entre navegadores (Criterio g) que poner onclick="miFuncion()" directamente en el HTML?




   Ejercicio

 Criterios Evaluados

 Descripción

 Puntuación

   Ej. 1: Selección

 (a), (c)

 Selecciona correctamente diversos nodos (ID, clase, tag) y accede a su textContent.

 1

   Ej. 2: Interruptor

 (e), (h)

 Asocia un evento click y usa classList.toggle para cambiar estado (buena práctica).

 1

   Ej. 3: Editor Perfil

 (b), (d)

 Modifica propiedades (textContent) y atributos (setAttribute).

 1

   Ej. 4: Galería

 (b), (e), (c)

 Itera sobre una NodeList (forEach), asocia múltiples eventos y modifica propiedades (src).

 1

   Ej. 5: Añadir Tareas

 (d), (e), (h)

 Crea (createElement), configura (textContent, value) y añade (appendChild) nuevos nodos al DOM tras un evento.

 2

   Ej. 6: El Modal

 (d), (e), (h)

 Gestiona la visibilidad de elementos usando classList (buena práctica) en respuesta a eventos.

 1

   Ej. 7: Notificación

 (b), (d), (h)

 Usa innerHTML para insertar HTML y setTimeout para modificar elementos creados dinámicamente.

 1

   Ej. 8: Teoría

 (f), (g), (h)

 Demuestra la comprensión conceptual de la separación de capas y los estándares de compatibilidad.

 1

   TOTAL

 

 

 10

   