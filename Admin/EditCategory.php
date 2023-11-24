<?php
$Id = $_GET['CatId'];

// Establish Connection with Database
$con = mysqli_connect("localhost", "root", "", "shopping");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Specify the query to execute
$sql = "SELECT CategoryId, CategoryName, Description, Image FROM category_master WHERE CategoryId = ?";
$stmt = mysqli_prepare($con, $sql);

// Bind the parameters
mysqli_stmt_bind_param($stmt, "i", $Id);

// Execute query
mysqli_stmt_execute($stmt);

// Bind the result variables
mysqli_stmt_bind_result($stmt, $CategoryId, $CategoryName, $Description, $Image);

// Fetch the values
mysqli_stmt_fetch($stmt);

// Close the statement
mysqli_stmt_close($stmt);

// Close the connection
mysqli_close($con);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Online Cloth Shopping</title>
    <!-- Add your stylesheets and other head elements here -->
</head>
<body>
    <div id="wrapper">
        <!-- Your HTML content here -->
        <form method="post" action="UpdateCategory.php">
            <table width="100%" border="0">
                <tr>
                    <td height="32">Category Id:</td>
                    <td>
                        <input name="txtId" type="text" id="txtId" value="<?php echo $CategoryId; ?>" readonly />
                    </td>
                </tr>
                <tr>
                    <td height="36">Category Name:</td>
                    <td>
                        <input name="txtName" type="text" id="txtName" value="<?php echo $CategoryName; ?>" />
                    </td>
                </tr>
                <tr>
                    <td height="36">Description:</td>
                    <td>
                        <textarea name="txtDesc" id="txtDesc" cols="45" rows="3"><?php echo $Description; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" value="Update Record" />
                    </td>
                </tr>
            </table>
        </form>
        <!-- Additional HTML content if needed -->
    </div>
    <!-- Add your scripts or other footer elements here -->
</body>
</html>
