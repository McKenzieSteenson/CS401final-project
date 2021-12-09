<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="css/style.css">
  <title>Create Your Blog</title>
</head>

<?php echo file_get_contents("html/nav.html"); ?> 


<?php
    if( $_POST["name"] || $_POST["data"] ) {
        $file_name   = $_POST['name'];
        $data   = $_POST['data'];

        $folder="files/";
        $ext=".txt";
        $file_name=$folder."".$file_name."".$ext;
        if(file_exists($file_name)){
            // Do something if file already exists

        }else{
            // Creates file if it doens't exist
            file_put_contents($file_name , $data);
        }
        //exit();
    }


if(isset($_POST['delete_file']))
{
 $file_name=$_POST['file_name'];
 $folder="files/";
 $ext=".txt";
 $file_name=$folder."".$file_name."".$ext;
 unlink($file_name);
}
?>

<html>
    <body>
        <form action = "?" method = "POST" id="raw-text" >
            <textarea name="data" rows="10" id="raw" style="word-wrap: break-word; resize: horizontal; height: 700px; width: 99%"></textarea>
            <input name="name" placeholder="File Name here"></input> 
            <button name="submit">Send!</button>
        </form>
        <form method="post" action="create.php" id="delete_form">
            <input placeholder="File Name here" type="text" name="file_name">
            <input type="submit" value="Delete File" name="delete_file">
        </form>
    </body>
</html>
</html>