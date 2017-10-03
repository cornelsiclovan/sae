<?php
//phpinfo();
//header('Content-type: image/jpeg');
//$image=new Imagick($_SERVER['DOCUMENT_ROOT']."/sae/fpdf/test/split/"."test.pdf");

$files = scandir('scaned_documents');
	$imagick = new Imagick();
	$imagick->setResolution(300, 300);
foreach($files as $file)
{
	if($file != '.' && $file != '..')
	{
		$imagick->readImage($_SERVER['DOCUMENT_ROOT']."/sae/fpdf/test/split/scaned_documents/".$file);
		$imagick->writeImages($_SERVER['DOCUMENT_ROOT']."/sae/fpdf/test/split/pics/".'converted.jpg', false);
		
		$file_from = 'scaned_documents/'.$file;
		$file_to = 'processed_documents/'.$file;
		
		rename($file_from, $file_to);
	}
	
	
}
//$imagick->setImageFormat('pdf');
//$imagick->writeImages($_SERVER['DOCUMENT_ROOT']."/sae/fpdf/test/split/".'converted.pdf', false);
?>