<?php

namespace App\Exports;

use App\Models\Loai;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class LoaiExport implements FromCollection, WithMapping, WithHeadings, WithColumnWidths, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $arrayLoaiSanPham = Loai::selectRaw('loai.*, COALESCE(SUM(sanpham.SoLuong), 0) AS SoLuongSanPham')
            ->leftJoin('sanpham', 'sanpham.MaLoai', '=', 'loai.MaLoai')
            ->groupBy('loai.MaLoai')
            ->orderBy('loai.MaLoai')
            ->get();
        return $arrayLoaiSanPham;
    }

    public function map($row): array
    {
        return [
            $row->MaLoai,
            $row->TenLoai,
            $row->MauSac,
            $row->ViTriXep,
            $row->SoLuongSanPham,
        ];
    }

    public function headings(): array
    {
        return [
            'Mã loại sản phẩm',
            'Tên loại sản phẩm',
            'Màu sắc',
            'Vị trí xếp',
            'Số lượng sản phẩm',
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 20,
            'B' => 40,
            'C' => 20,
            'D' => 30,
            'E' => 20,
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $cellRange = 'A1:E1';
                $color = '93ccea';
                $event->sheet->getDelegate()->getStyle($cellRange)->getFill()
                    ->setFillType(Fill::FILL_SOLID)
                    ->getStartColor()->setRGB($color);
            }
        ];
    }
}
