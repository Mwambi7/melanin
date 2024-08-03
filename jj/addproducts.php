<?php

        session_start();
        ?>
<html>
  
<head>
   
    <title>Add Products</title>
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="addp.css">
</head>
  
<body>
    <div class="container mt-5">
    <form action="ap.php" method="POST"  enctype="multipart/form-data">
        <h1>Add products</h1>
        
               <div class="form-group">
                <label>Product name</label>
                <input type="text" 
                    class="form-control" 
                    placeholder="Enter product name" 
                    id="productname"
                    name="productname" >
            </div>
  
            <div class="form-group">
                <label>Product Description</label>
                <input type="text" 
                    class="form-control" 
                    placeholder="product description"
                    id="description"
                    name="description" >
            </div>

            <div class="form-group">
                <label>Product price</label>
                <input type="text" 
                    class="form-control" 
                    placeholder="Enter product price" 
                    id="price"
                    name="price" >
            </div>

            <div class="form-group">
                <label>Product quantity</label>
                <input type="text" 
                    class="form-control" 
                    placeholder="Enter product quantity" 
                    id="quantity"
                    name="quantity" >
            </div>
            
           <div class="form-group">
           <label>Product image</label>  
            <input type="file" 
            
                   name="uploadfile" 
                   value="" >
  
              </div>

      

            
<button type="submit" name="addbutton" class="btn btn-success">Add</button>  
 <a href="products.php" class="btn btn-danger"> Cancel</a>
        
                
    </div>
  
  
</body>
  
</html>