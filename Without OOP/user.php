<?php

include 'connect.php';

if (isset($_POST['submit']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $password=$_POST['password'];

    $sql= "insert into crud (name,email,mobile,password) 
    values('$name','$email','$mobile','$password')";
    $result=mysqli_query($con,$sql);

    if($result)
    {
        header('location:display.php');
         

    }else{
        die(mysqli_error($con));
    }
    
}

?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            clifford: '#da373d',
          }
        }
      }
    } -->
  </script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Crud Operation | Native php User</title>
  </head>
  <body>
    <div class="container p-20 my">
      <form method="post">
               <div class="mb-3">
                 <label>Name</label>
                 <input type="text"  class="form-control"  placeholder="Enter your Name" name="name"  autocomplete="off" >
                 </div>


                 <div class="mb-3">
                 <label>Email</label>
                 <input type="email" class="form-control"  placeholder="Enter your Email" name="email"  autocomplete="off" >
                 </div>

                 <div class="mb-3">
                 <label>Mobile</label>
                 <input type="number" class="form-control"  placeholder="Enter your Mobile number" name="mobile"  autocomplete="off" >
                 </div>

                 <div class="mb-3">
                 <label>Password</label>
                 <input type="password" class="form-control"  placeholder="Enter your Password" name="password">
                 </div>


                 <button name="submit" class="btn btn-primary">Submit</button>
               
               
              
      </form>
    </div>

  </body>
</html>