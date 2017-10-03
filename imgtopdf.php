<?php
	$images = array($_SERVER['DOCUMENT_ROOT']."/sae/fpdf/test/split/".'converted-0.jpg',$_SERVER['DOCUMENT_ROOT']."/sae/fpdf/test/split/".'converted-1.jpg');
	$pdf = new Imagick($images);
	$pdf->writeImages($_SERVER['DOCUMENT_ROOT']."/sae/fpdf/test/split/".'combined.pdf', true);