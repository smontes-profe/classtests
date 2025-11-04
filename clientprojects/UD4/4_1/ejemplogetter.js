class Persona {
  constructor(nombre) {
    this._nombre = nombre; // Usamos _nombre como propiedad "privada"
  }

  // Getter: se usa para obtener el valor
  get nombre() {
    return this._nombre;
  }

  // Setter: se usa para asignar un valor
  set nombre(nuevoNombre) {
    if (nuevoNombre.length > 0) {
      this._nombre = nuevoNombre;
    } else {
      console.log("El nombre no puede estar vacío.");
    }
  }
}

// Uso
const persona1 = new Persona("Ana");
console.log(persona1.nombre); // Llama al getter → "Ana"

persona1.nombre = "Luis"; // Llama al setter
console.log(persona1.nombre); // → "Luis"

persona1.nombre = ""; // → "El nombre no puede estar vacío."