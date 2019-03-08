<?php 
	$currentDir=getcwd();
	$uploadDirectory="/upload/";
	$errors=[];
	$fileExtensions = ['jpeg','jpg'];
	$fileName = $_FILES['myfile']['name'];
	$fileSize = $_FILES['myfile']['size'];
	$fileTmpName = $_FILES['myfile']['tmp_name'];
	$imageFileType = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
	$uploadPath = $currentDir . $uploadDirectory . basename($fileName);
	if(isset($_POST['submit']))
	{
	 if(! in_array($imageFileType,$fileExtensions))
	 {
	  $errors[] = "this fileExtensions is not allowed";
	  }
	  if($fileSize > 2000000)
	  {
	   $errors[] = "this file is more than 20MB ";
	   }
	   if(empty($errors))
	   {
	    $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
		if($didUpload)
		{
		 echo "the file". basename($fileName)."has been uploaded";
		}
		else
		{
			echo "An error occured somewhere . try again";
		}
	   }
	   else{
		   foreach ($errors as $error)
		   {
			   echo $error . "these are the errors". "\n";
		   }
	   }
	}
?>