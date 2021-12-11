<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="css/style.css">
  <title>Your Blog</title>
</head>

<div class="topnav">
    <a href="../index.php">Home</a></li>
    <a href="../create.php" >Create</a>
    <a class="active" href="../edit.php">Edit</a>
</div>

<?php echo "<h3>Search below for the blog post you would like to edit. Make sure the Blog Title input box has the correct blog title inside before hitting 'Save Blog'!</h3>" ?>  

<?php
      echo "<p class='contentTitle'> Blog Title(s):</p>";

foreach (new DirectoryIterator('files') as $file) {
  if ($file->isFile()) {
      $files = $file->getFilename();
      echo "<p class='content'>$files</p>";
  }
}
?>

<?php

$file_name = '';
$print_file_name = '';
$text = '';

if($_POST['click'] || $_POST['name']){

    $file_name   = $_POST['name'];
    $print_file_name = $file_name;
    $folder="files/";
    $ext=".txt";
    $filename=$folder."".$file_name;//."".$ext;
    //$filename = "puppies.txt";
    $before_editing = file_get_contents($filename);
    $text = $before_editing;
} else {
    
}
if ($_POST['save'] || $_POST['name'] || $_POST['text'])
{
    $file_name   = $_POST['name'];
    $folder="files/";
    $ext=".txt";
    $file_name=$folder."".$file_name;//."".$ext;
    if(file_exists($file_name)){
        // save the text contents
        file_put_contents($filename, $_POST['text']);
        $after_editing = file_get_contents($filename);

    }else{
        printf( 'This blog does not exist yet');
    }
}

if(isset($_POST['delete_file']))
{
 $file_name=$_POST['file_name'];
 $folder="files/";
 $ext=".txt";
 $file_name=$folder."".$file_name;//."".$ext;
 unlink($file_name);
}
?>


<html>
    <body>
    <form method="post" action="edit.php" id="display_form">
        <input name="name" class="fileInput" placeholder="Blog Title here"></input> 
        <button name="click" class="myButton" >Edit Blog</button>
        <button name="save" class="myButton">Save Blog</button>
        <button type="button" class="myButton" onClick="document.location.href='index.php'">View Blogs</button>
        <?php
        echo "<p class='content'>Currently Editing: " . $print_file_name . "</p>";
        //file_put_contents($filename, "test test test test test");
        //$after_editing = file_get_contents($filename);
        //echo "Content of the file " . $filename . " after editing: " . $after_editing . "<br>";
        //$text = $after_editing;
        ?>
        <br>
        <textarea name="text" class="blogInput" placeholder="Edit your blog here!" rows="10" id="raw" style=""><?php echo htmlspecialchars($text) ?></textarea>
        <br>
        
    </form>
    <form method="post" action="edit.php" id="delete_form">
            <input class="fileInputplace" placeholder="Blog Title here" type="text" name="file_name">
            <input class="myButton"type="submit" value="Delete File" name="delete_file">
        </form>
    </body>
</html>

<!-- input and button to open a filename
put those results in the text area
button to save data in text area to the inputted filename -->
