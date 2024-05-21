<?php

namespace App\Exports;
use App\Models\Historiales;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Support\Carbon;

class DataExportHistoriales implements FromCollection, WithHeadings, WithStyles,WithMapping, WithColumnFormatting, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return collect($this->data);
        //return Historiales::all();
    }
    public function headings(): array
    {
        // Agrega una fila de encabezado personalizado aquí
        return [
            'ACCESO',
            'DNI',
            'NOMBRE ACREDITADO',
            'CODIGO DE ACREDITADO',
            'CODIGO DE BARRA',
            'ESTADO',
            'HORA DE INGRESO',
            // Agrega más columnas según sea necesario
        ];
    }
    public function map($row): array
    {
        // Personaliza la lógica para obtener solo la hora de created_at
        return [
            $row['id_acceso'],
            $row['dni_acreditar'],
            $row['nom_acreditar'],
            $row['cod_usuario'],
            $row['barcode'],
            $row['estado'],
            Carbon::parse($row['created_at'])->setTimezone('America/Lima')->format('H:i:s'), // Obtiene solo la hora
        ];
    }
    public function styles(Worksheet $sheet)
    {
        // Establece el estilo para la fila de encabezado (celdas en negrita)
        $sheet->getStyle('A1:' . $sheet->getHighestColumn() . '1')->applyFromArray([
            'font' => [
                'bold' => true,
            ],
        ]);
        // Ajusta el ancho de las celdas según sea necesario
        $sheet->getColumnDimension('A')->setWidth(15);
        $sheet->getColumnDimension('B')->setWidth(15);
        $sheet->getColumnDimension('C')->setWidth(30);
        $sheet->getColumnDimension('D')->setWidth(25);
        $sheet->getColumnDimension('E')->setWidth(20);
        $sheet->getColumnDimension('F')->setWidth(13);
        $sheet->getColumnDimension('G')->setWidth(20);
        // Ajusta más columnas según sea necesario
    }
    public function columnFormats(): array
    {
        // Ajusta el ancho de las columnas según sea necesario
        return ['G' => NumberFormat::FORMAT_DATE_TIME3,];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                // Aplica un color de fondo a la primera celda (A1)
                $event->sheet->getDelegate()->getStyle('A1:G1')->applyFromArray([
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'color' => ['rgb' => '6bff7d'], // Cambia 'FF0000' al color hexadecimal que prefieras
                    ],
                ]);
                    // Agrega filtros a las primeras celdas
                    $event->sheet->setAutoFilter('A1:G1');
            },
        ];
    }
}
