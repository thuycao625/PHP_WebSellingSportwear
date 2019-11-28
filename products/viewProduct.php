<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once("../connect.php");
    
    // Prepare a select statement
    $sql = "SELECT * FROM products WHERE id = ?";
    $linkImage = '../Image/';
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters   
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $name = $row["name"];
                $price = $row["price"];
                $quantity = $row["quantity"];
                $Category = $row["category_id"];
                $comment = $row["comments"];
                $image = $row["Images"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Food</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>View Products</h1>
                    </div>

                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label>Images</label>
                                <p class="form-control-static"><img src=" <?php echo $linkImage.$row['Images'] ?>" width = 150px></p>
                            </div>
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <div class="form-group">
                                <label>Name</label>
                                <p class="form-control-static"><?php echo $row["name"]; ?></p>
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <p class="form-control-static"><?php echo $row["price"]; ?></p>
                            </div>
                            <div class="form-group">
                                <label>Quantity</label>
                                <p class="form-control-static"><?php echo $row["quantity"]; ?></p>
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <p class="form-control-static"><?php echo $row["category_id"]; ?></p>
                            </div>
                            <div class="form-group">
                                <label>Comment</label>
                                <p class="form-control-static"><?php echo $row["comments"]; ?></p>
                            </div>
                     
                        </div>
                    </div>
                    
                    <p><a href="selectAllProduct.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>