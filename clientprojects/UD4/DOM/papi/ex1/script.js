// 1. El elemento que tiene el ID "logo"
const logo = document.querySelector('#logo');

// 2. Todos los elementos que tienen la clase "menu-item"
const itemsMenu = document.querySelectorAll('.menu-item');

// 3. El primer párrafo (<p>) que se encuentre dentro del <article>
const primerParrafo = document.querySelector('article p');

// 4. Todos los enlaces (<a>) que están dentro de la etiqueta <nav>
const enlacesNav = document.querySelectorAll('nav a');

// (Opcional) Podemos comprobar que los hemos cogido:
console.log(logo);
console.log(itemsMenu);
console.log(primerParrafo);
console.log(enlacesNav);