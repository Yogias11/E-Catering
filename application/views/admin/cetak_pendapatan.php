<?php
			$pdf = new Pdf('P',PDF_UNIT,PDF_PAGE_FORMAT,'mm', 'A4', true, 'UTF-8', false);
			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetTitle('Laporan Pendapatan');
			$pdf->SetHeaderData('','',PDF_HEADER_TITLE,PDF_HEADER_STRING);
			$pdf->SetDefaultMonospacedFont('helvetica');
			$pdf->SetMargins(PDF_MARGIN_LEFT, '20', PDF_MARGIN_RIGHT);
			$pdf->SetPrintHeader(false);
			$pdf->SetPrintFooter(false);
			$pdf->SetHeaderMargin(30);
			$pdf->SetTopMargin(20);
			$pdf->setFooterMargin(PDF_MARGIN_FOOTER);
			$pdf->SetAutoPageBreak(true, '20');
			$pdf->SetFont('helvetica', '', 11);
			$pdf->SetAuthor('Author');
			$pdf->SetDisplayMode('real', 'default');
			$pdf->AddPage();
			$i=0;
			$html='<h3 align="center">Laporan Pendapatan</h3>
					<table cellspacing="1" bgcolor="#666666" cellpadding="2">
						<tr bgcolor="#ffffff">
							<th width="5%" align="center">No</th>
							<th width="25%" align="center">Tanggal</th>
							<th width="20%" align="center">Jumlah</th>
							<th width="25%" align="center">Harga</th>
							<th width="25%" align="center">Total</th>
						</tr>
						';
			foreach ($cpendapatan as $row) 
				{
					$i++;
					$html.='<tr bgcolor="#ffffff">
							<td align="center">'.$i.'</td>
							<td>'.$row->tgl.'</td>
							<td>'.$row->qty.'</td>
							<td>'.$row->harga.'</td>
							<td>'.$row->total.'</td>
						</tr>';
				}
			$html.='</table>';
			$pdf->writeHTML($html, true, false, true, false, '');
			$pdf->Output('Laporan.pdf', 'I');
?>
