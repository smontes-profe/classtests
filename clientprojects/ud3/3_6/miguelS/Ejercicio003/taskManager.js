"use strict";

import { Tarea } from "../Ejercicio001/tarea.js";

export class TaskManager {
  static #instancia;
  #arrayTarea;
  #observadores;

  /**
   * Constructor de la clase TaskManager
   * @throws {Error} Si se intenta crear una nueva instancia cuando ya existe una.
   * @return {TaskManager} La instancia única de TaskManager.
   */
  constructor() {
    if (TaskManager.#instancia) {
      return TaskManager.#instancia;
    }

    this.#arrayTarea = [];
    this.#observadores = [];
    TaskManager.#instancia = this;
  }

  /**
   * Método estático para obtener la instancia única de TaskManager
   * @return {TaskManager} La instancia única de TaskManager.
   * @throws {Error} Si se intenta crear una nueva instancia cuando ya existe una.
   */
  static getInstance() {
    if (!TaskManager.#instancia) {
      TaskManager.#instancia = new TaskManager();
    }

    return TaskManager.#instancia;
  }

  /**
   * Método para suscribir un observador
   * @param {Function} observador - La función que actuará como observador.
   * @throws {Error} Si el observador no es una función.
   * @return {boolean} true si el observador se añadió correctamente, false si ya existía.
   */
  suscribir(observador) {
    if (!observador || typeof observador !== "function") {
      throw new Error("El observador introducido no es una función.");
    }

    if (this.#observadores.includes(observador)) {
      console.log(`Que el observador: ${observador}, ya existe.`);
      return false;
    }

    this.#observadores.push(observador);
    console.log("Observador añadido correctamente");
    return true;
  }

/**
 * Método para notificar a todos los observadores
 * @param {any} datos - Los datos que se pasarán a los observadores.
 * @return {void}
 * @throws {Error} Si ocurre un error al ejecutar un observador.
 */
  notificar(datos) {
    console.log("Notificando cambios:", datos);

    this.#observadores.forEach((observador) => {
      try {
        observador(datos);
      } catch (error) {
        console.error("Error al ejecutar un observador:", error);
      }
    });
  }

  /**
   * Método para agregar una nueva tarea
   * @param {string} texto - La descripción de la tarea.
   * @return {void}
   * @throws {Error} Si no se proporciona texto para la tarea.
   */
  agregarTarea(texto) {
    if (!texto) {
      throw new Error("No se ha proporcionado texto para la tarea.");
    }

    const tarea = new Tarea(texto);
    this.#arrayTarea.push(tarea);

    let mensaje = `Se ha añadido una nueva tarea: ${texto}`;
    this.notificar(mensaje);
  }

  /**
   * Método para eliminar una tarea
   * @param {number} id - El ID de la tarea a eliminar.
   * @return {void}
   * @throws {Error} Si no se proporciona un ID válido.
   */
  eliminarTarea(id) {
    if (!id) {
      throw new Error("No se ha proporcionado un ID.");
    }

    let exist = this.#arrayTarea.find((tarea) => tarea.id === id);

    if (exist) {
      this.#arrayTarea = this.#arrayTarea.filter((tarea) => tarea.id !== id);
      console.log(`La tarea con ID: ${id} se ha eliminado correctamente.`);
    } else {
      console.log(`La tarea con ID: ${id} no se ha encontrado.`);
    }

    let datos = `La tarea con ID (${id}) ha sido eliminada correctamente`;
    this.notificar(datos);
  }

  /**
   * Método para obtener todas las tareas
   * @return {Tarea[]} Array de tareas.
   */
  obtenerTareas() {
    return this.#arrayTarea;
  }

  /**
   * Método para marcar una tarea como completada
   * @param {number} id - El ID de la tarea a marcar como completada.
   * @return {void}
   * @throws {Error} Si no se proporciona un ID válido.
   */
  marcarTareaComoCompletada(id) {
    if (!id) {
      throw new Error("El parámetro id no se ha introducido.");
    }

    const tarea = this.#arrayTarea.find((tarea) => tarea.id === id);

    if (tarea) {
      tarea.completar();
      console.log(`Tarea completada: "${tarea.descripcion}"`);

      let datos = `Se ha marcado como completada la tarea con id: ${id}`;
      this.notificar(datos);
    } else {
      console.log(`Tarea no encontrada con id: "${tarea.id}"`);
    }
  }
}
