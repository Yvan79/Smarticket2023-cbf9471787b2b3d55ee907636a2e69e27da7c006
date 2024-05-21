<?php

namespace App\Http\Controllers;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BoletaController extends Controller
{
    public function imprimirBoleta()
{
    try {
        // Conecta con la impresora térmica (sustituye "nombre_de_impresora" por el nombre de tu impresora)
        //$printer_name = "IMPRESORA_BRAZALETE";
        $connector = new WindowsPrintConnector("IMPRESORA_BRAZALETE");
        // Inicializa la impresora
        $printer = new Printer($connector);
        // Define el contenido de la boleta
        $contenido = "Boleta de Compra\n";
        $contenido .= "Fecha: " . date('Y-m-d') . "\n";
        $contenido .= "Cliente: Juan Pérez\n";
        $contenido .= "--------------------------------\n";
        $contenido .= "Producto         Cantidad   Total\n";
        $contenido .= "--------------------------------\n";
        $contenido .= "Producto 1       2          $20\n";
        $contenido .= "Producto 2       1          $15\n";
        $contenido .= "--------------------------------\n";
        $contenido .= "Total: $35\n";

        // Imprime el contenido
        $printer->text($contenido);

        // Corta el papel (esto puede variar según la impresora)
        $printer->cut();

        // Cierra la conexión con la impresora
        $printer->close();

        return "Boleta impresa correctamente.";
    } catch (\Exception $e) {
        return "Error al imprimir la boleta: " . $e->getMessage();
    }
}

}
