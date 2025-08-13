<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Patient;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TodayPatientsExport implements FromCollection, WithHeadings, \Maatwebsite\Excel\Concerns\WithStyles, \Maatwebsite\Excel\Concerns\WithTitle, \Maatwebsite\Excel\Concerns\WithCustomStartCell, \Maatwebsite\Excel\Concerns\WithEvents
{
    public function collection()
    {
        return Patient::whereDate('created_at', today())
            ->whereDoesntHave('careSteps', function ($query) {
                $query->where('type', 'ANC');
            })
            ->with('user')
            ->get()
            ->map(function ($patient) {
                return [
                    'အမည်' => $patient->user->name ?? 'Unknown',
                    'အသက်' => $patient->age ?? 'Unknown',
                    'နေရပ်လိပ်စာ' => $patient->address ?? 'Unknown',
                    'ခင်ပွန်းအမည်' => $patient->father_name ?? 'Unknown',
                    'စတင်သည့်ရက်စွဲ' => $patient->created_at->format('Y-m-d H:i')
                ];
            });
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getDefaultRowDimension()->setRowHeight(30);

        $sheet->getColumnDimension('A')->setWidth(20);
        $sheet->getColumnDimension('B')->setWidth(8);
        $sheet->getColumnDimension('C')->setWidth(25);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('E')->setWidth(20);

        $lastRow = $sheet->getHighestRow();
        $sheet->getStyle('A4:E' . $lastRow)
            ->getAlignment()
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
            ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
            ->setWrapText(true);

        $sheet->getStyle('A4:E4')->getFont()->setBold(true);

        return [];
    }

    public function headings(): array
    {
        return [
            'အမည်',
            'အသက်',
            'နေရပ်လိပ်စာ',
            'ခင်ပွန်းအမည်',
            'စတင်သည့်ရက်စွဲ',
        ];
    }

    public function title(): string
    {
        return 'ယနေ့လူနာများစာရင်း';
    }

    public function startCell(): string
    {
        return 'A4';
    }

    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                $event->sheet->setCellValue('A1', 'ယနေ့လူနာများစာရင်း');
                $event->sheet->setCellValue('A2', 'Generated on: ' . Carbon::now()->format('Y-m-d H:i'));
                $event->sheet->mergeCells('A1:E1');
                $event->sheet->mergeCells('A2:E2');
                $event->sheet->mergeCells('A3:E3');

                $event->sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
                $event->sheet->getStyle('A2')->getFont()->setItalic(true)->setSize(12);
                $event->sheet->getStyle('A3')->getFont()->setSize(12);
            },
        ];
    }
}
