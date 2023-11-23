<?php
require_once('Connections/shop.php');

if (!function_exists("GetSQLValueString")) {
    function GetSQLValueString($conn, $theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
    {
        $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
        $theValue = $conn->real_escape_string($theValue);

        switch ($theType) {
            case "text":
                $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
                break;
            case "long":
            case "int":
                $theValue = ($theValue != "") ? intval($theValue) : "NULL";
                break;
            case "double":
                $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
                break;
            case "date":
                $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
                break;
            case "defined":
                $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
                break;
        }
        return $theValue;
    }
}

$colname_Recordset1 = "-1";
if (isset($_GET['CategoryId'])) {
    $colname_Recordset1 = $_GET['CategoryId'];
}

// Create connection
$conn = new mysqli($hostname_shop, $username_shop, $password_shop, $database_shop);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query_Recordset1 = "SELECT ItemName, `Description`, `Size`, Image, Price, Discount, Total FROM item_master";
if (isset($_GET['CategoryId'])) {
    $query_Recordset1 .= " WHERE CategoryId = ?";
}

$stmt = $conn->prepare($query_Recordset1);

if (isset($_GET['CategoryId'])) {
    $stmt->bind_param("i", $colname_Recordset1);
}

$stmt->execute();
$result_Recordset1 = $stmt->get_result();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Online Cloth Shopping</title>
    <link href="style.css" rel="stylesheet" type="text/css"/>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
    <style type="text/css">
        <!--
        .style9 {font-size: 95%; font-weight: bold; color: #003300; font-family: Verdana, Arial, Helvetica, sans-serif; }
        .style10 {
            color: #FFFFFF;
            font-weight: bold;
        }
        -->
    </style>
</head>
<body>
<div id="wrapper">
    <?php include "Header.php"; ?>
    <div id="content">
        <h2><span style="color:#003300"> Products</span></h2>
        <table width="100%" border="1" cellpadding="2" cellspacing="2">
            <tr>
                <td bordercolor="#669933" bgcolor="#669933"><span class="style10">ItemName</span></td>
                <td bordercolor="#669933" bgcolor="#669933"><span class="style10">Description</span></td>
                <td bordercolor="#669933" bgcolor="#669933"><span class="style10">Size</span></td>
                <td bordercolor="#669933" bgcolor="#669933"><span class="style10">Image</span></td>
                <td bordercolor="#669933" bgcolor="#669933"><span class="style10">Price</span></td>
                <td bordercolor="#669933" bgcolor="#669933"><span class="style10">Discount</span></td>
                <td bordercolor="#669933" bgcolor="#669933"><span class="style10">Total</span></td>
            </tr>

            <?php
            while ($row_Recordset1 = $result_Recordset1->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row_Recordset1['ItemName']; ?></td>
                    <td><?php echo $row_Recordset1['Description']; ?></td>
                    <td><?php echo $row_Recordset1['Size']; ?></td>
                    <td><img src="Products/<?php echo $row_Recordset1['Image']; ?>" height="125px" width="125px"/></td>
                    <td><?php echo $row_Recordset1['Price']; ?></td>
                    <td><?php echo $row_Recordset1['Discount']; ?></td>
                    <td><?php echo $row_Recordset1['Total']; ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <?php include "Right.php"; ?>
    <div style="clear:both;"></div>
    <?php include "Footer.php"; ?>
</div>
</body>
</html>
<?php
$stmt->close();
$conn->close();
?>
