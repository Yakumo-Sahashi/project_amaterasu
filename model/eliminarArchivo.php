<?php
	$file=$_POST['archivo_dir'];
	
	if(is_file($file)){
		if(!unlink($file)){
			echo "2";
		}else{
			echo "1";
		}
	}else{
		echo 'r='.$file;
	}
?>