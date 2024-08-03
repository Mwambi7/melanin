<?php
session_start();
require_once("config.php");

    
    

  

?>
<html>
    <head>

    <link href=" https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        
   
   
    <title> Melanin Orders</title>
      
</head>
<body>
  
<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <a class="navbar-brand">Canopy orders</a>
    <form class="d-flex">
      
      <a href="adminpage.php" class="btn btn-dark ">Go back</a>
    </form>
  </div>
</nav>

<form action=".php" method="post">

<table id="usertable" class="table table-dark table-borderless-responsive">



  <thead>
    <tr>
      <th scope="col">Order Number</th>
 <th scope="col">Firstname</th>
  <th scope="col">Lastname</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      <th scope="col">phone no</th>
      <th scope="col">Amount to be paid</th>

      <th scope="col"></th>
      <th scope="col"></th>
     
     


    </tr>
  </thead>
  <tbody>
      <?php

      $sql="SELECT * FROM orders ";
      $mysqli_result=mysqli_query($link,$sql);
      if($mysqli_result)
      {
          while($row=mysqli_fetch_assoc($mysqli_result))
      {
            
      
    
        ?>
      

  <tr class="table-light">
      <th scope="row"><?php echo $row['id'] ?></th>
      <td><?php echo $row['fname'] ?></td>
      <td><?php echo $row['lname'] ?></td>
      <td><?php echo $row['email'] ?></td>
      <td><?php echo $row['address'] ?></td>
      <td><?php echo $row['phone'] ?></td>
      <td><?php echo $row['amount'] ?></td>

      

    
     <td>

    
    </td>

    <td>
  
   

</td>
    </tr>
    <?php
}
}
        

?>
    
  </tbody>
  

      </div>
    </div>
  </div>
</div>
    </div>

    

</table>





 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap5.min.js"></script>
<script> 
$(document).ready(function() {

    $('#usertable').DataTable();

});
</script>
</body>

</html>