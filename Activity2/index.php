<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  
  
  
      <link rel="stylesheet" href="Settings/style.css">

  
</head>

<body>
  <div class="vid-container">
  <video id="Video1" class="bgvid back" autoplay="false" muted="muted" preload="auto" loop>
      <source src="http://shortcodelic1.manuelmasiacsasi.netdna-cdn.com/themes/geode/wp-content/uploads/2014/04/milky-way-river-1280hd.mp4.mp4" type="video/mp4">
  </video>
  <form action="#" method="post">
  <div class="inner-container">
    <video id="Video2" class="bgvid inner" autoplay="false" muted="muted" preload="auto" loop>
      <source src="http://shortcodelic1.manuelmasiacsasi.netdna-cdn.com/themes/geode/wp-content/uploads/2014/04/milky-way-river-1280hd.mp4.mp4" type="video/mp4">
    </video>
    <div class="box">
      <h1>Login</h1>
      <input type="text" name="username" id="username" placeholder="Username"/>
      <input type="password" name="password" id="password" placeholder="Password"/>
      <button type="submit" name="submit">Login</button>
    </div>
  </div>
</div>
 </form>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>
<?php
  if(isset($_POST['submit'])) {
    $connect = oci_connect('hr', 'hr',"Localhost/XE");
    $username = $_POST['username'];
    $password = $_POST['password'];
   
      do_query($conn,"SELECT EMPLOYEE_ID FROM EMPLOYEES 
      WHERE EMPLOYEE_ID ='".  $username. "' and email='". $password. "'");
    
  }
  function do_query($conn, $query) {
    $stid=oci_parse($conn,$query);
    $r=oci_execute($stid,OCI_DEFAULT);
    $row=oci_fetch_array($stid,OCI_ASSOC+OCI_RETURN_NULLS);
    $item=oci_num_rows($stid);
    echo $item;


       if ($item != 1) {
            echo "Wrong Username or Password";  
    }
    else {
         header("Location:list.php");
    }
  }

    
?>
</body>
</html>