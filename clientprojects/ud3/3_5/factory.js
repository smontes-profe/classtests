// PRODUCTO 1: Guerrero 
class Guerrero {
  atacar() {
    console.log("¡El guerrero ataca con su espada!");
  }
}

// PRODUCTO 2: Mago 
class Mago {
  atacar() {
    console.log("¡El mago lanza un hechizo de fuego!");
  }
}

// LA FÁBRICA
/**
 * Fábrica para crear personajes de diferentes tipos.
 * @class FabricaPersonajes
 * @method crearPersonaje
 * @param {string} tipo - El tipo de personaje a crear ('guerrero' o 'mago').
 * @returns {Object} - Una instancia del personaje solicitado.
 * @example
 * const fabrica = new FabricaPersonajes(); 
 */
class FabricaPersonajes {
  crearPersonaje(tipo) {
    switch (tipo) {
      case 'guerrero':
        return new Guerrero();
      case 'mago':
        return new Mago();
      default:
        throw new Error(`El tipo de personaje '${tipo}' no existe.`);
    }
  }
}

// --- USANDO LA FÁBRICA ---

// 1. Creamos una instancia de nuestra fábrica
const fabrica = new FabricaPersonajes();

// 2. Le pedimos a la fábrica que nos cree los personajes
const personaje1 = fabrica.crearPersonaje('guerrero');
const personaje2 = fabrica.crearPersonaje('mago');

// 3. Usamos los objetos creados
personaje1.atacar(); // Salida: ¡El guerrero ataca con su espada!
personaje2.atacar(); // Salida: ¡El mago lanza un hechizo de fuego!