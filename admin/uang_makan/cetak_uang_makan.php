<?php
            include '../../library/PHPExcel/PHPExcel.php';
    
			// Panggil class PHPExcel nya
			$excel = new PHPExcel();
			// Settingan awal fil excel
			$excel->getProperties()->setCreator('Laporan Penerimaan')
						->setLastModifiedBy('Laporan Penerimaan')
						->setTitle("Laporan Penerimaan")
						->setSubject("Laporan Penerimaan")
						->setDescription("Laporan Penerimaan")
						->setKeywords("Laporan Penerimaan");
			// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
			$style_col = array(
			'font' => array('bold' => true), // Set font nya jadi bold
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
			);
			// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
			$style_row = array(
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
			);

			
			$excel->setActiveSheetIndex(0)->setCellValue('A1', "LAPORAN PNERIMAAN PBB-P2 ");
			$excel->getActiveSheet()->mergeCells('A1:Q1'); 
			$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); 
			$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(12);
			$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 

			// $excel->setActiveSheetIndex(0)->setCellValue('A2', "'".tgl_indo($start)."' s/d '".tgl_indo($end)."'");
			$excel->getActiveSheet()->mergeCells('A2:P2'); 
			$excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(12);
			$excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

			$excel->setActiveSheetIndex(0)->setCellValue('A4', "No"); 
			$excel->getActiveSheet()->mergeCells('A4:A7');
			$excel->getActiveSheet()->getStyle('A4:A7')->getAlignment()->setWrapText(true);
			$excel->getActiveSheet()->getStyle('A4')->getFont()->setBold(TRUE); 
			$excel->getActiveSheet()->getStyle('A4')->getFont()->setSize(8);
			$excel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

			$excel->setActiveSheetIndex(0)->setCellValue('B4', "Nomor Objek Pajak"); 
			$excel->getActiveSheet()->mergeCells('B4:B7');
			$excel->getActiveSheet()->getStyle('B4')->getFont()->setBold(TRUE); 
			$excel->getActiveSheet()->getStyle('B4')->getFont()->setSize(8);
			$excel->getActiveSheet()->getStyle('B4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

			$excel->setActiveSheetIndex(0)->setCellValue('C4', "NAMA WAJIB PAJAK"); 
			$excel->getActiveSheet()->mergeCells('C4:C7');
			$excel->getActiveSheet()->getStyle('C4:C7')->getAlignment()->setWrapText(true);
			$excel->getActiveSheet()->getStyle('C4')->getFont()->setBold(TRUE); 
			$excel->getActiveSheet()->getStyle('C4')->getFont()->setSize(8);
			$excel->getActiveSheet()->getStyle('C4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

			$excel->setActiveSheetIndex(0)->setCellValue('D4', "POKOK PAJAK"); 
			$excel->getActiveSheet()->mergeCells('D4:D7');
			$excel->getActiveSheet()->getStyle('D4:D7')->getAlignment()->setWrapText(true);
			$excel->getActiveSheet()->getStyle('D4')->getFont()->setBold(TRUE); 
			$excel->getActiveSheet()->getStyle('D4')->getFont()->setSize(8);
			$excel->getActiveSheet()->getStyle('D4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

			$excel->setActiveSheetIndex(0)->setCellValue('E4', "PENGURANGAN"); 
			$excel->getActiveSheet()->mergeCells('E4:E7');
			$excel->getActiveSheet()->getStyle('E4:E7')->getAlignment()->setWrapText(true);
			$excel->getActiveSheet()->getStyle('E4')->getFont()->setBold(TRUE); 
			$excel->getActiveSheet()->getStyle('E4')->getFont()->setSize(8);
			$excel->getActiveSheet()->getStyle('E4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

			$excel->setActiveSheetIndex(0)->setCellValue('F4', "DENDA"); 
			$excel->getActiveSheet()->mergeCells('F4:4');
			$excel->getActiveSheet()->getStyle('F4')->getFont()->setBold(TRUE); 
			$excel->getActiveSheet()->getStyle('F4')->getFont()->setSize(8);
			$excel->getActiveSheet()->getStyle('F4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			
			$excel->setActiveSheetIndex(0)->setCellValue('F5', "TOTAL"); 
			$excel->getActiveSheet()->mergeCells('F5:F7');
			$excel->getActiveSheet()->getStyle('F5')->getFont()->setBold(TRUE); 
			$excel->getActiveSheet()->getStyle('F5')->getFont()->setSize(8);
			$excel->getActiveSheet()->getStyle('F5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

			$excel->setActiveSheetIndex(0)->setCellValue('G5', "BNG"); 
			$excel->getActiveSheet()->mergeCells('G5:G7');
			$excel->getActiveSheet()->getStyle('G5')->getFont()->setBold(TRUE); 
			$excel->getActiveSheet()->getStyle('G5')->getFont()->setSize(8);
			$excel->getActiveSheet()->getStyle('G5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

			
			$a = 17;
			// $excel->setActiveSheetIndex(0)->setCellValue('O17', "Total"); 
			// $excel->getActiveSheet()->getStyle('O'.$a)->getFont()->setBold(TRUE); 
			// $excel->getActiveSheet()->getStyle('O'.$a)->getFont()->setSize(8);
			// $excel->getActiveSheet()->getStyle('O'.$a)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

			$excel->getActiveSheet()->getStyle('A4:A7')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('B4:B7')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('C4:D4')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('C4:C7')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('D4:D7')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('E4:E7')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('F4:G4')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('F5:F7')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('G5:G7')->applyFromArray($style_col);
			
			

		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
			// $siswa = $this->SiswaModel->view();
			// $no = 1; // Untuk penomoran tabel, di awal set dengan 1
			// $numrow = 8; // Set baris pertama untuk isi tabel adalah baris ke 4
			// foreach($data as $dt){ // Lakukan looping pada variabel siswa

			// $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			// $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $dt['nomor_sertifikat']);
			// $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $dt['nama_penjual']);
			// $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $dt['nama_pembeli']);
			// $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow,  $dt['letak_tanah_objek']." RT ". $dt['rt_objek']." RW ". $dt['rw_objek']);
			// $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $dt['luas_bumi']);
			// $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $dt['luas_bng']);
			// $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow,  $dt['nilai_pasar']);
			// $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $dt['njop_bumi']);
			// $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow,  $dt['njop_pbb']);
			// $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, " ");
			// $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, " ");
			// $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow,  " ");
			// $excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, " ");
			// $excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow,  " ");
			// $excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow,  " ");
			
			// // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			// $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			// $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			// $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			// $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			// $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			// $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			// $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			// $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
			// $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
			// $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
			// $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
			// $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
			// $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
			// $excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
			// $excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
			// $excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
			
			// $no++; // Tambah 1 setiap kali looping
			// $numrow++; // Tambah 1 setiap kali looping
			// }
			// Set width kolom
			$excel->getActiveSheet()->getColumnDimension('A')->setWidth(4); // Set width kolom A
			$excel->getActiveSheet()->getColumnDimension('B')->setWidth(16); // Set width kolom B
			$excel->getActiveSheet()->getColumnDimension('C')->setWidth(15); // Set width kolom C
			$excel->getActiveSheet()->getColumnDimension('D')->setWidth(17); // Set width kolom D
			$excel->getActiveSheet()->getColumnDimension('E')->setWidth(11); // Set width kolom E
			$excel->getActiveSheet()->getColumnDimension('F')->setWidth(7); // Set width kolom A
			$excel->getActiveSheet()->getColumnDimension('G')->setWidth(7); // Set width kolom B
			// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
			$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
			// Set orientasi kertas jadi LANDSCAPE
			$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
			// Set judul file excel nya
			$excel->getActiveSheet(0)->setTitle("Laporan_Bulanan");
			$excel->setActiveSheetIndex(0);
			// Proses file excel
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment; filename="Laporan.xls"'); // Set nama file excel nya
			header('Cache-Control: max-age=0');
			ob_end_clean();
			$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
			$write->save('php://output');
		
?>