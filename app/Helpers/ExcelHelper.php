<?php
namespace App\Helpers;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExcelHelper{
    function importExcelToDatabase($excelFilePath)
    {
        $spreadsheet = IOFactory::load($excelFilePath);
        $worksheet = $spreadsheet->getActiveSheet();
        $data = $worksheet->toArray();

        return $data;
        // Process the data and insert into the database
        // Here, you can implement your database logic to save the data
        // For example:
        // foreach ($data as $row) {
            // $name = $row[0];
            // $email = $row[1];
            // echo $row[0]
            // Insert the data into the database
        // }
    }

    function downloadExcelToDatabase(array $arr)
    {
        $spreadsheet = new Spreadsheet();    
        $sheet = $spreadsheet->getActiveSheet();    
        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel    
        $style_col = [      'font' => ['bold' => true], // Set font nya jadi bold      
        'alignment' => [        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, 
        // Set text jadi ditengah secara horizontal (center)        
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER 
        // Set text jadi di tengah secara vertical (middle)      
    ],      
        'borders' => [        
            'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],        
            'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],        
            'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], 
            'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]   
        ]    ];   
         // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel    
         $style_row = [      'alignment' => [        
             'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER 
             // Set text jadi di tengah secara vertical (middle)      
            ],      
             'borders' => [        
                 'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], 
                 // Set border top dengan garis tipis        
                 'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  
                 // Set border right dengan garis tipis        
                 'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], 
                 // Set border bottom dengan garis tipis        
                 'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] 
                 // Set border left dengan garis tipis      
                 ]    ];    
                 $sheet->setCellValue('A1', "DATA OPERASIONAL");    
                 $sheet->mergeCells('A1:E1');  
                 $sheet->getStyle('A1')->getFont()->setBold(true);  
                 $sheet->setCellValue('A3', "NO");     
                 $sheet->setCellValue('B3', "JENIS PELAYARAN"); 
                 $sheet->setCellValue('C3', "NAMA KAPAL"); 
                 $sheet->setCellValue('D3', "AGEN"); 
                 $sheet->setCellValue('E3', "PELABUHAN ASAL"); 
                 $sheet->setCellValue('F3', "TGL TIBA"); 
                 $sheet->setCellValue('G3', "JAM TIBA"); 
                 $sheet->setCellValue('H3', "PELABUHAN TUJUAN"); 
                 $sheet->setCellValue('I3', "TGL BERANGKAT"); 
                 $sheet->setCellValue('J3', "JAM BERANGKAT"); 
                 $sheet->setCellValue('K3', "JENIS MUATAN "); 
                 $sheet->setCellValue('L3', "JUMLAH MUATAN"); 
                 $sheet->setCellValue('M3', "JENIS KEMASAN"); 
                 $sheet->setCellValue('N3', "JENIS BONGKAR"); 
                 $sheet->setCellValue('O3', "JUMLAH BONGKAR"); 
                 $sheet->setCellValue('P3', "JENIS KEMASAN"); 
                 $sheet->setCellValue('Q3', "PENUMPANG TURUN"); 
                 $sheet->setCellValue('R3', "PENUMPANG NAIK"); 
                 $sheet->setCellValue('S3', "KET"); 
                 
                 $sheet->getStyle('A3')->applyFromArray($style_col);    
                 $sheet->getStyle('B3')->applyFromArray($style_col);    
                 $sheet->getStyle('C3')->applyFromArray($style_col);    
                 $sheet->getStyle('D3')->applyFromArray($style_col);    
                 $sheet->getStyle('E3')->applyFromArray($style_col);    
                 $sheet->getStyle('F3')->applyFromArray($style_col);    
                 $sheet->getStyle('G3')->applyFromArray($style_col);    
                 $sheet->getStyle('H3')->applyFromArray($style_col);    
                 $sheet->getStyle('I3')->applyFromArray($style_col);    
                 $sheet->getStyle('J3')->applyFromArray($style_col);  
                 $sheet->getStyle('K3')->applyFromArray($style_col);    
                 $sheet->getStyle('L3')->applyFromArray($style_col);    
                 $sheet->getStyle('M3')->applyFromArray($style_col);    
                 $sheet->getStyle('N3')->applyFromArray($style_col);    
                 $sheet->getStyle('O3')->applyFromArray($style_col);  
                 $sheet->getStyle('P3')->applyFromArray($style_col);    
                 $sheet->getStyle('Q3')->applyFromArray($style_col);    
                 $sheet->getStyle('R3')->applyFromArray($style_col);    
                 $sheet->getStyle('S3')->applyFromArray($style_col);     
                 // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya    
                //  $siswa = $this->SiswaModel->view();    
                 $no = 1; // Untuk penomoran tabel, di awal set dengan 1    
                 $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4    
                foreach($arr as $data){ // Lakukan looping pada variabel siswa      
                    $sheet->setCellValue('A'.$numrow, $no);      
                    $sheet->setCellValue('B'.$numrow, $data['cruise_type']);      
                    $sheet->setCellValue('C'.$numrow, $data['ship_name']);      
                    $sheet->setCellValue('D'.$numrow, $data['agency_code']);      
                    $sheet->setCellValue('E'.$numrow, $data['arrived_date']);
                    $sheet->setCellValue('F'.$numrow, $data['arrived_time']);
                    $sheet->setCellValue('G'.$numrow, $data['asal']);
                    $sheet->setCellValue('H'.$numrow, $data['departure_date']);
                    $sheet->setCellValue('I'.$numrow, $data['departure_time']);
                    $sheet->setCellValue('J'.$numrow, $data['tujuan']);
                    $sheet->setCellValue('K'.$numrow, $data['load_commodity']);
                    $sheet->setCellValue('L'.$numrow, $data['load_qty']);
                    $sheet->setCellValue('M'.$numrow, $data['load_type']);
                    $sheet->setCellValue('N'.$numrow, $data['unload_commodity']);
                    $sheet->setCellValue('O'.$numrow, $data['unload_qty']);
                    $sheet->setCellValue('P'.$numrow, $data['unload_type']);            
                    $sheet->setCellValue('Q'.$numrow, $data['p_get_on']);
                    $sheet->setCellValue('R'.$numrow, $data['p_get_off']);
                    $sheet->setCellValue('S'.$numrow, $data['status']);
 
                    $sheet->getStyle('A'.$numrow)->applyFromArray($style_row);      
                    $sheet->getStyle('B'.$numrow)->applyFromArray($style_row);      
                    $sheet->getStyle('C'.$numrow)->applyFromArray($style_row);      
                    $sheet->getStyle('D'.$numrow)->applyFromArray($style_row);      
                    $sheet->getStyle('E'.$numrow)->applyFromArray($style_row); 
                    $sheet->getStyle('F'.$numrow)->applyFromArray($style_row);      
                    $sheet->getStyle('G'.$numrow)->applyFromArray($style_row);      
                    $sheet->getStyle('H'.$numrow)->applyFromArray($style_row);      
                    $sheet->getStyle('I'.$numrow)->applyFromArray($style_row);      
                    $sheet->getStyle('J'.$numrow)->applyFromArray($style_row); 
                    $sheet->getStyle('K'.$numrow)->applyFromArray($style_row);      
                    $sheet->getStyle('L'.$numrow)->applyFromArray($style_row);      
                    $sheet->getStyle('M'.$numrow)->applyFromArray($style_row);      
                    $sheet->getStyle('N'.$numrow)->applyFromArray($style_row);      
                    $sheet->getStyle('O'.$numrow)->applyFromArray($style_row);    
                    $sheet->getStyle('P'.$numrow)->applyFromArray($style_row);      
                    $sheet->getStyle('Q'.$numrow)->applyFromArray($style_row);      
                    $sheet->getStyle('R'.$numrow)->applyFromArray($style_row);      
                    $sheet->getStyle('S'.$numrow)->applyFromArray($style_row);              
                    $no++; // Tambah 1 setiap kali looping      
                    $numrow++; // Tambah 1 setiap kali looping    
                }    // Set width kolom    
                // $sheet->getColumnDimension('A')->setWidth(5); // Set width kolom A    
                // $sheet->getColumnDimension('B')->setWidth(15); // Set width kolom B    
                // $sheet->getColumnDimension('C')->setWidth(25); // Set width kolom C    
                // $sheet->getColumnDimension('D')->setWidth(20); // Set width kolom D    
                // $sheet->getColumnDimension('E')->setWidth(30); // Set width kolom E        
                // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)    
                $sheet->getDefaultRowDimension()->setRowHeight(-1); 
                foreach(range('A','S') as $columnID) {
                    $sheet->getColumnDimension($columnID)->setAutoSize(true);
                }  
                
                // Set orientasi kertas jadi LANDSCAPE    
                $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);    
                // Set judul file excel nya    
                $sheet->setTitle("Laporan Data Siswa");    
                // Proses file excel    
                header('Content-Disposition: attachment; filename="Data Operation.xlsx"');
                $writer = new Xlsx($spreadsheet);    
                $writer->save('php://output');
    }


}
