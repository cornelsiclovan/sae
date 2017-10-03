<?php

	$dir = "pics";

	$files1 = scandir($dir);
	//$files2 = scandir($dir, 1);
	$i=0;
	echo "<center>";
	foreach($files1 as $file){
		//echo $file; //prints name of file
		$testfile = "converted-".$i.".jpg";
		if($file != '.' && $file!= '..'){	  
			echo "<img src='pics/".$file."' style='width:595px; height:842px;'/><br>";
			echo "<input id='".$i."check' onchange='showInputForm(this)'  type='checkbox' name='sf_doc' value='$i'>Sfarsit document</input><br>";
			echo "<form action='?add_document' id='".$i."' style='display:none; position:fixed; top:25px; left:25px' method='post'>
					<input placeholder='tip document' name='tip_document' type='text' required='required'/><br>
					<input placeholder='numar document' name='nr_document'type='text' required='required'/><br>
					<input placeholder='data document - aaaa-ll-zz' type='text' pattern='[0-9]{4}-[0-9]{2}-[0-9]{2}' name='data' required='required'/><br>
					<input placeholder='parte' type='text' name='parte' required='required'/><br>
					<input placeholder='valoare' type='text' name='valoare' required='required'/><br>
					<input placeholder='moneda - eur/ron/usd' type='text' name='moneda' required='required'/><br>
					<input type='hidden' name='i' value='".$i."'/>
					<button>Adauga document</button><br>
				  </form>";
			$i = $i + 1;
		}
	}
	echo "</center>";
	
	echo "<script>
			function showInputForm(i)
			{
				var checkbox = i.value.concat('check');
				
				if(document.getElementById(checkbox).checked)
				{
				 document.getElementById(i.value).style.display = '';
				}
				else
				{
				 document.getElementById(i.value).style.display = 'none';
				}
				
			}
		  </script>";