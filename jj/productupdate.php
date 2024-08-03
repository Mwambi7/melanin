<?php
    include("config.php");
    if(isset($_POST['btn']))
    {
        $productname=$_POST['productname'];
        $description=$_POST['description'];
        $price=$_POST['price'];
        $quantity=$_POST['quantity'];
        $id = $_GET['id'];
        $q= "update products set productname='$productname', description='$description', 
        price='$price', quantity='$quantity' where id=$id";
        $query=mysqli_query($link,$q);
        header('location:products.php?productupdate');
    } 
    else if(isset($_GET['id'])) 
    {
        $q = "SELECT * FROM products WHERE id='".$_GET['id']."'";
        $query=mysqli_query($link,$q);
        $res= mysqli_fetch_array($query);
    }
?>
<html>
  
<head>
    <meta http-equiv="Content-Type" 
        content="text/html; charset=UTF-8">
      
    <title>Update List</title>
  
    <link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="showp.css">
</head>
  
<body>
    <div class="container mt-5">
        <h1>Update Products List</h1>
        <form method="post">
            <div class="form-group">
                <label>Product name</label>
                <input type="text" 
                    class="form-control" 
                    name="productname" 
                    placeholder="productname name" 
                    value=
        "<?php echo $res['productname'];?>" />
            </div>
  
            <div class="form-group">
                <label>Product description</label>
                <input type="text" 
                    class="form-control" 
                    name="description" 
                    placeholder="Product description" 
value="<?php echo $res['description'];?>" />
            </div>
            
            <div class="form-group">
                <label>Product price</label>
                <input type="text" 
                    class="form-control" 
                    name="price" 
                    placeholder="Product price" 
value="<?php echo $res['price'];?>" />
            </div>
  
           
  
            <div class="form-group">
                <label>Product quantity</label>
                <input type="text" class="form-control" 
                    name="quantity" placeholder="quantity" 
                    value="<?php echo $res['quantity']?>">
            </div>
  
            <div class="form-group">
                <input type="submit" value="Update" 
                    name="btn" class="btn btn-success">
            </div>
           <div> <a href="products.php" class="btn btn-danger">Cancel</a><div>
        </form>
    </div>
</body>
  
</html>