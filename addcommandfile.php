<!DOCTYPE html>
<html>
<body>

<form action="addcommandfile.php" method="post" enctype="multipart/form-data">
  Select File to upload:
  <input type="file" name="fileToUpload" id="fileToUpload"><br>
  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>

<?php
if ($_POST){
  // echo "<pre>";
  // print_r($_FILES); //ดูรายละเอียดไฟล์ที่ upload เป็น array 2 มิติ
  $target_dir = "upfile/"; //ตำแหน่งที่เอาไฟล์ไปเก็บ
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); //
  $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); // เอานามสกุลไฟล์ที่ upload
  $realname = basename($_FILES["fileToUpload"]["name"]);
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["tmp_name"]);
  $tmp_file_name =  "upfile/" . substr($_FILES["fileToUpload"]["tmp_name"],5) . ".$fileType";
  print_r($tmp_file_name);
  echo "<br/>";
  $tmp_f_n_to_upload = substr($tmp_file_name,7);
  print_r($tmp_f_n_to_upload);
  echo "<br/>";
  print_r($realname);
  echo "<br/>";
  print_r($fileType);
  echo "<br/>";
  // $tmp_f_n_to_upload =  "uploads/" . $tmp_file_name;
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $tmp_file_name)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>
<a href="<?php echo $tmp_file_name; ?>">Open File</a>
<a href="addcommand.php">Back</a>
<?php
// $uploadOk = 1;
// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
// if(isset($_POST["submit"])) {
//   $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//   if($check !== false) {
//     echo "File is an image - " . $check["mime"] . ".";
//     $uploadOk = 1;
//   } else {
//     echo "File is not an image.";
//     $uploadOk = 0;
//   }
// }

// Check if file already exists
// if (file_exists($target_file)) {
//   echo "Sorry, file already exists.";
//   $uploadOk = 0;
// }

// Check file size
// if ($_FILES["fileToUpload"]["size"] > 500000) {
//   echo "Sorry, your file is too large.";
//   $uploadOk = 0;
// }

// Allow certain file formats
// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
// && $imageFileType != "gif" ) {
//   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//   $uploadOk = 0;
// }

// Check if $uploadOk is set to 0 by an error
// if ($uploadOk == 0) {
//   echo "Sorry, your file was not uploaded.";
// // if everything is ok, try to upload file
// } else {
//   if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//     echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
//   } else {
//     echo "Sorry, there was an error uploading your file.";
//   }
// }
// ?>