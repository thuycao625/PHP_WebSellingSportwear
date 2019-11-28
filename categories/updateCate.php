<?php
// Include config file
require("../connect.php"); 
// Define variables and initialize with empty values
$name = $price = $quantity = $category_id = $comments = $image = "";
$name_err = $price_err = $quantity_err = $category_id_err = $comments_err =  "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate food name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    }else{
        $name = $input_name;
    }
    
    // Validate prices
    $input_price = trim($_POST["price"]);
    if(empty($input_price)){
        $price_err = "Please enter the prices amount.";     
    } elseif(!ctype_digit($input_price)){
        $price_err = "Please enter a positive integer value.";
    } else{
        $price = $input_price;
    }

    // Validate description
    $input_quantity = trim($_POST["quantity"]);
    if(empty($input_quantity)){
        $quantity_err = "Please enter the quantity amount.";     
    } elseif(!ctype_digit($input_quantity)){
        $quantity_err = "Please enter a positive integer value.";
    } else{
        $quantity = $input_quantity;
    }
    
    // Validate category id
    $input_category_id = trim($_POST["category_id"]);
    if(empty($input_price)){
        $category_id_err = "Please enter the category_id amount.";     
    } elseif(!ctype_digit($input_category_id)){
        $category_id_err = "Please enter a positive integer value.";
    } else{
        $category_id = $input_category_id;
    }

    // Validate status
    $input_comment = trim($_POST["comment"]);
    if(empty($input_comment)){
        $comment_err = "Please enter an comments.";     
    } else{
        $comment = $input_comment;
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($price_err) && empty($quantity_err)
     && empty($category_id_err) && empty($comment_err)){
        // Prepare an update statement
        $sql = "UPDATE products SET name=?, price=?, quantity=?, category_id=?, comments=?,Images WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "siiissi", $param_name, $param_price, $param_quantity, $param_cate_id, $param_comment,$param_Image, $param_id);
            
            // Set parameters
            $param_name = $name;
            $param_price = $price;
            $param_quantity = $quantity;
            $param_cate_id = $category_id;
            $param_comment = $comment;
            $param_Image = $image;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: selectAllProduct.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM products WHERE id = ?";
        $linkImage = '../Image/';
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
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
                    $category_id = $row["category_id"];
                    $comment = $row["comments"];
                    $Image = $linkImage.$row["Images"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
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
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        // header("location: error.php");
        // exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
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
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($price_err)) ? 'has-error' : ''; ?>">
                            <label>Price</label>
                            <input name="price" class="form-control" value="<?php echo $price; ?>">
                            <span class="help-block"><?php echo $price_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($quantity_err)) ? 'has-error' : ''; ?>">
                            <label>Quantity</label>
                            <textarea name="quantity" class="form-control"><?php echo $quantity; ?></textarea>
                            <span class="help-block"><?php echo $quantity_err;?></span>
                        </div>
                        <div class="form-group">
                            <label> Category id </label>
                            <select class="form-control" name="category_id">
                                <?php
                                    require("../connect.php");
                                    $res_cate_id = mysqli_query($link,"SELECT * FROM categories WHERE id = ". $row['category_id']);
                                    while($rowCa = mysqli_fetch_assoc($res_cate_id))
                                    {
                                ?>
                                        <option value="<?php echo $rowCa['id']; ?>"><?php echo $rowCa['name']; ?></option>   
                                
                                <?php
                                    }
                                
                                    $sqlCate = "SELECT * FROM categories";
                                    $resCate = mysqli_query($link,$sqlCate);
                                   
                                    while($rowCate = mysqli_fetch_assoc($resCate))
                                    {
                                        if ($rowCate['id'] != $row['category_id']) {
                                    
                                ?>
                                        <option value="<?php echo $rowCate['id']; ?>"><?php echo $rowCate['name']; ?></option>   
                                
                                <?php
                                        }   
                                    }
                                    mysqli_close($link);
                               ?>
                                
                            </select>
                            <span class="help-block"><?php echo $category_id_err;?></span>

                        </div>
                        <div class="form-group <?php echo (!empty($comment_err)) ? 'has-error' : ''; ?>">
                            <label>Comment</label>
                            <input type="text" name="comment" class="form-control" value="<?php echo $comment; ?>">
                            <span class="help-block"><?php echo $comment_err;?></span>
                        </div>
                        <div class="form-group">

                            <label> Chọn hình ảnh sản phẩm </label>
                            <input type="file" name="FileImage" >
                            <span style="color: red"><img src=" <?php echo $linkImage.$row['Images'] ?>" width = 150px></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="selectAllProduct.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>