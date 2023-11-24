<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>ONLINE CLOTH SHOPPING</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <style type="text/css">
        <!--
        .style8 {font-size: 24px}
        .style9 {font-size: 95%; font-weight: bold; color: #003300; font-family: Verdana, Arial, Helvetica, sans-serif; }
        .style3 {font-weight: bold}
        .style5 {font-size: 85%; font-weight: bold; color: #003300; font-family: Verdana, Arial, Helvetica, sans-serif; }
        -->
    </style>
</head>
<body>
    <div id="wrapper">
        <?php include "Header.php"; ?>
        <div id="content">
            <h2><span style="color:#003300"> Welcome  <?php echo $_SESSION['Name']; ?></span></h2>
            <table width="100%" border="1" bordercolor="#003300">
                <?php
                // Establish Connection with Database
                $con = mysqli_connect("localhost", "root", "", "shopping");

                // Check connection
                if (mysqli_connect_errno()) {
                    die("Failed to connect to MySQL: " . mysqli_connect_error());
                }

                // Specify the query to execute
                $sql = "SELECT * FROM Category_Master";

                // Execute query
                $result = mysqli_query($con, $sql);

                // Loop through each record
                while ($row = mysqli_fetch_array($result)) {
                    $Id = $row['CategoryId'];
                    $CategoryName = $row['CategoryName'];
                    $Description = $row['Description'];
                    $Image = $row['Image'];
                ?>
                    <tr>
                        <td class="style3"><img src="../Products/<?php echo $Image; ?>" alt="" width="124" height="124" border="5" /></td>
                        <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $CategoryName; ?></strong></div></td>
                        <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $Description; ?></strong></div></td>
                        <td class="style3"><a href="Products.php?CategoryId=<?php echo $Id; ?>">View Products</a></td>
                    </tr>
                <?php
                }

                // Retrieve the number of records returned
                $records = mysqli_num_rows($result);

                // Close the connection
                mysqli_close($con);
                ?>
            </table>
            <p>&nbsp;</p>
            <table width="100%" border="0" cellspacing="3" cellpadding="3">
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </table>
            <p>&nbsp;</p>
        </div>
        <?php include "Right.php"; ?>
        <div style="clear:both;"></div>
        <?php include "Footer.php"; ?>
    </div>
</body>
</html>
