package test.java;

import static org.junit.jupiter.api.Assertions.*;
import org.junit.jupiter.api.Test;
import main.java.Calculadora;
import main.java.ServicioExterno;
import java.io.ByteArrayOutputStream;
import java.io.PrintStream;
import org.mockito.Mockito;

public class CalculadoraTest {

    @Test
    void testSuma() {
        assertEquals(4, Calculadora.sumar(2, 2));
        assertEquals(0, Calculadora.sumar(0, 0));
        assertEquals(-5, Calculadora.sumar(-2, -3));
    }

    @Test
    void testResta() {
        assertEquals(2, Calculadora.restar(5, 3));
        assertEquals(-1, Calculadora.restar(2, 3));
    }

    @Test
    void testMultiplicar() {
        assertEquals(12, Calculadora.multiplicar(3, 4));
        assertEquals(0, Calculadora.multiplicar(0, 5));
    }

    @Test
    void testDividir() {
        assertEquals(4, Calculadora.dividir(8, 2));
        assertThrows(ArithmeticException.class, () -> Calculadora.dividir(5, 0));
    }

    @Test
    void testPotencia() {
        assertEquals(8, Calculadora.potencia(2, 3));
        assertEquals(1, Calculadora.potencia(5, 0));
        assertThrows(IllegalArgumentException.class, () -> Calculadora.potencia(2, -1));
    }

    @Test
    void testSumarConFactor() {
        ServicioExterno mockServicio = Mockito.mock(ServicioExterno.class);
        Mockito.when(mockServicio.obtenerFactor()).thenReturn(5);

        int resultado = Calculadora.sumarConFactor(2, 3, mockServicio);
        assertEquals(10, resultado); // 2+3+5
    }

    @Test
    void testMain() {
        PrintStream originalOut = System.out;
        ByteArrayOutputStream outContent = new ByteArrayOutputStream();
        System.setOut(new PrintStream(outContent));

        Calculadora.main(new String[]{});

        String expected = "Suma 2+2: 4" + System.lineSeparator() +
                          "Resta 5-3: 2" + System.lineSeparator() +
                          "Multiplicar 3*4: 12" + System.lineSeparator() +
                          "Dividir 8/2: 4" + System.lineSeparator() +
                          "Potencia 2^3: 8" + System.lineSeparator();

        assertEquals(expected, outContent.toString());

        System.setOut(originalOut);
    }
}
