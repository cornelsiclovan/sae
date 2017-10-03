<?php
	require_once 'includes/access.inc.php';
	
	if(!userIsLoggedIn())
	{
		include 'login.html.php';
		exit();
	}

	if(isset($_GET['msg']))
	{
		echo $_GET['msg'];
	}


	if(isset($_GET['add_document']))
	{
		include 'includes/db.inc.php';
		
		$images = array();
		$dir = 'pics';
		$files = scandir($dir);
		$j=0;
		foreach($files as $file)
		{
			//echo $file.', ';
			$j++;
		}
		
		$tip_document = $_POST['tip_document'];
		$nr_document = $_POST['nr_document'];
		$data_document = $_POST['data'];
		$parte = $_POST['parte'];
		$valoare = $_POST['valoare'];
		$moneda = $_POST['moneda'];
		$data_inregistrare = date("Y/m/d");
		
		$denumirefisier = $tip_document.'_'.$nr_document.'_'.$parte.'.pdf';
		
		$n = $_POST['i'];
		
		$data = explode('-', $data_document);
		$an = $data[0];
		
		$sql = "SELECT * FROM documente WHERE tip_document = '$tip_document' AND nr_document = '$nr_document' AND parte = '$parte' AND an = '$an'"; //verificare existenta document
		$result = mysqli_query($link, $sql);
		if(mysqli_num_rows($result)==0)
		{
			$message = "Documentul a fost inregistrat.";
			for($i=2; $i<=$n+2; $i++)
			{
				array_push($images, $_SERVER['DOCUMENT_ROOT']."/sae/fpdf/test/split/pics/".$files[$i]);	
			}
		
			$link_fisier = $_SERVER['DOCUMENT_ROOT']."/sae/fpdf/test/split/composed_documents/".$denumirefisier;
			
			$pdf = new Imagick($images);
			$pdf->writeImages($link_fisier, true);
			
			$sql = "INSERT INTO documente (data_document, data_inregistrare, link, nr_document, parte, tip_document, valoare, an) 
							    VALUES ('$data_document', '$data_inregistrare', '$link_fisier', '$nr_document', '$parte', '$tip_document', '$valoare', '$an')";
			mysqli_query($link, $sql);
			
			
			$i=0;
			foreach($files as $file){
				if($file != '.' && $file != '..')
				{
					$i++;
					if($i<$n+2)
					{
					 unlink($_SERVER['DOCUMENT_ROOT']."/sae/fpdf/test/split/pics/".$file);
					}
				}
			}
		}else
		{
			$message = "Inregistrarea deja exista!";
		}
		
		
		header('Location: .?msg='.$message);
		exit();
	}
	
	include 'pdftoimg.php';
	include 'docsforms.html.php';