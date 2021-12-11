<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="css/style.css">
  <title>Create Your Blog</title>
</head>

<div class="topnav">
    <a href="../index.php">Home</a></li>
    <a class="active" href="../create.php" >Create</a>
    <a href="../edit.php">Edit</a>
</div>

<?php echo "<h3>Type your blog below, and when you are ready, type your blog title in the first input box below and hit 'Send!'</h3>" ?>  

<?php
    if( $_POST["name"] || $_POST["data"] ) {
        $file_name   = $_POST['name'];
        $data   = $_POST['data'];

        $folder="files/";
        $ext=".txt";
        $file_name=$folder."".$file_name;//."".$ext;
        if(file_exists($file_name)){
            // Do something if file already exists

        }else{
            // Creates file if it doens't exist
            file_put_contents($file_name , $data);
        }
        //exit();
    }


?>

<html>
    <body>
        <form action = " ? " method = "POST" id="raw-text" >
            <textarea name="data" class='blogInput' placeholder="Write your blog post here!"></textarea>
            <input name="name" class="fileInput" placeholder="Blog Title here"></input> 
            <button class="myButton" name="submit">Send!</button>
            <button type="button" class="myButton" onClick="document.location.href='index.php'">View Blogs</button>

        </form>        
    </body>
</html>
</html>