<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="css/style.css">
  <title>Home</title>
</head>

<div class="topnav">
    <a class="active" href="../index.php">Home</a></li>
    <a href="../create.php" >Create</a>
    <a href="../edit.php">Edit</a>
</div>
<!--Section 1: Header content-->
<div class="header">
     <h1>Bob Blog Blaw Blog</h1>
   </div>
  </body>
</html>

<body>  
  <?php echo "<h2>Welcome to your own personal blog creator!
  Displayed below is the current blog content on your site.
  Follow the navigation bar above to Create and Edit your blogs!</h2>" ?>  
  
  <?php
  $path='files';
  $files=scandir($path);
  //print_r($files);
  foreach ($files as $key => $value) {
    if($value!="." && $value!="..")
    {
        $blog_title = $value;
        $blog_content = file_get_contents($path."/".$value);
        $blog_time = date("F d Y h:i A", filemtime($path."/".$value));
        //print_r($blog_title);
        //print_r($blog_content);
        echo"<p class='blogTitle'>$blog_title - $blog_time<p>";
        echo"<p class='content'>$blog_content</p>";
        echo "<br>";
    }
  }
?>

</body>
  <script src="js/main.js"></script>
</html>