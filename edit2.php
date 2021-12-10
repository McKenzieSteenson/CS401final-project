<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="css/style.css">
  <title>Your Blog</title>
</head>

<?php echo file_get_contents("html/nav.html"); ?> 

<?php

$file_name = '';
$text = '';

if($_POST['click'] || $_POST['name']){

    $file_name   = $_POST['name'];
    $folder="files/";
    $ext=".txt";
    $filename=$folder."".$file_name."".$ext;
    //$filename = "puppies.txt";
    $before_editing = file_get_contents($filename);
    $text = $before_editing;
} else {
    
}
if ($_POST['save'] || $_POST['name'])
{
    $file_name   = $_POST['name'];
    $folder="files/";
    $ext=".txt";
    $file_name=$folder."".$file_name."".$ext;
    if(file_exists($file_name)){
        // save the text contents
        file_put_contents($filename, $_POST['text']);
        $after_editing = file_get_contents($filename);

    }else{
        printf( 'This blog does not exist yet');
    }
}
?>

<?php
        echo "Content of the file " . $filename . " before editing: " . $before_editing . "<br>";
        //file_put_contents($filename, "test test test test test");
        //$after_editing = file_get_contents($filename);
        echo "Content of the file " . $filename . " after editing: " . $after_editing . "<br>";
        //$text = $after_editing;
?>
<html>
    <body>
    <form method="post" action="edit2.php" id="display_form">
        <input name="name" placeholder="File Name here"></input> 
        <textarea placeholder="Edit your blog here!"  name="text"><?php echo htmlspecialchars($text) ?></textarea>
        <button name="click" class="click">Click me!</button>
        <button name="save" class="click">Save!</button>
    </form>
    </body>
</html>

<!-- input and button to open a filename
put those results in the text area
button to save data in text area to the inputted filename -->
