<?php
include 'index.php';
if (isset($_GET['deleteid']))
{
   $id=$_GET['deleteid'];
   $row=new User('localhost','root','','crud-opration');
   $result=$row->delete($id);

   if($result)
   {
    header('location:display.php');

   }
 
}
?>