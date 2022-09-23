<?php
	if (isset($_FILES['files']['name'])){
		$dir=$_POST['dir'];
		$filename=$_POST['filename'];
		
		for ($i=0; $i < count($_FILES['files']['name']); $i++) {
			$myfile = pathinfo($_FILES['files']['name'][$i]);
			$target_file = $dir.$myfile['basename'];
			// $target_file = $dir.$filename[$i].'.'.$myfile['extension'];
			if (!move_uploaded_file($_FILES['files']['tmp_name'][$i], $target_file)) echo "Error Uploding File";
		}
		
		$filenames = [];
		for ($i=0; $i < count($_FILES['files']['name']); $i++) {
			array_push($filenames,pathinfo($_FILES['files']['name'][$i])['basename']);
		}
		echo json_encode($filenames);
	}
?>