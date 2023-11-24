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
        -->
    </style>
</head>
<body>
    <div id="wrapper">

        <?php
        include "Header.php";
        ?>

        <div id="content">
            <h2><span style="color:#003300"> Welcome <?php echo $_SESSION['Name']; ?></span></h2>
            <ul>

                <?php
                // Establish Connection with Database
                $con = new mysqli("localhost", "root", "", "shopping");

                // Check the connection
                if ($con->connect_error) {
                    die("Connection failed: " . $con->connect_error);
                }

                // Specify the query to execute
                $sql = "SELECT * FROM Offer_Master";

                // Execute query
                $result = $con->query($sql);

                // Loop through each record
                while ($row = $result->fetch_assoc()) {
                    $Id = $row['OfferId'];
                    $Offer = $row['Offer'];
                    $Detail = $row['Detail'];
                    $Valid = $row['Valid'];
                    ?>
                    <li><?php echo $Offer; ?> : <?php echo $Detail; ?>: <?php echo $Valid; ?></li>
                    <?php
                }

                // Close the connection
                $con->close();
                ?>
            </ul>
            <table width="100%" border="0" cellspacing="3" cellpadding="3">
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </table>
            <p>&nbsp;</p>
        </div>
        <?php
        include "Right.php";
        ?>
        <div style="clear:both;"></div>
        <?php
        include "Footer.php";
        ?>
    </div>
</body>
</html>
