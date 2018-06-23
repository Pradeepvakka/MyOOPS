
<?php
if (isset($_POST['submit'])) {
	$files = $_FILES['fileToUpload'];
	$fileName = $files['name'];
	$fileTempName = $files['tmp_name'];
	$fileSize = $files['size'];
	$fileError = $files['error'];
	$fileExtArr = explode('.',$fileName);
	$fileExt = strtolower(end($fileExtArr));
	$newFileName = uniqid('', true).'.'.$fileExt;
	//$newPath = $_SERVER['DOCUMENT_ROOT'] .'paging/uploads/'.$newFileName;
	$path = $_SERVER['DOCUMENT_ROOT'] .'paging/uploads/hope/';
	if (!file_exists ( $path )) {
		mkdir($path, 0777);
	}
	$newPath = $path.$newFileName;
	
	if ($fileError === 0) {
		if(move_uploaded_file($fileTempName, $newPath)){
			echo 'Uploaded Successfully';
		} else {
		echo 'Error';
	}
	}
}
?>
<!DOCTYPE html>
<html>
<body>

<form action="" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>
