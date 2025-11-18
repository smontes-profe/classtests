package com.ilerna.calculadora;

public class Calculadora {

    public static int sumar(int a, int b) {
        return a + b;
    }

    public static int restar(int a, int b) {
        return a - b;
    }

    public static int multiplicar(int a, int b) {
        return a * b;
    }

    public static int dividir(int a, int b) {
        if (b == 0) throw new ArithmeticException("División por cero");
        return a / b;
    }

    public static int potencia(int base, int exponente) {
        if (exponente < 0) throw new IllegalArgumentException("Exponente negativo no soportado");
        int resultado = 1;
        for (int i = 0; i < exponente; i++) resultado *= base;
        return resultado;
    }

    public static int sumarConFactor(int a, int b, ServicioExterno servicio) {
        int factor = servicio.obtenerFactor();
        return a + b + factor;
    }

    public static void main(String[] args) {
        System.out.println("Suma 2+2: " + sumar(2, 2));
        System.out.println("Resta 5-3: " + restar(5, 3));
        System.out.println("Multiplicar 3*4: " + multiplicar(3, 4));
        System.out.println("Dividir 8/2: " + dividir(8, 2));
        System.out.println("Potencia 2^3: " + potencia(2, 3));
    }
}
