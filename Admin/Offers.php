<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Online Cloth Shopping</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css">
<!--
.style9 {font-size: 95%; font-weight: bold; color: #003300; font-family: Verdana, Arial, Helvetica, sans-serif; }
.style10 {
    color: #FFFFFF;
    font-weight: bold;
}
-->
</style>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<style type="text/css">

.ds_box {
    background-color:#336633;
    border: 2px solid #666600;
    position: absolute;
    z-index: 32767;
}

.ds_tbl {
    background-color: #FFF;

}

.ds_head {
    background-color: #85A157;
    color: #FFF;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 13px;
    font-weight: bold;
    text-align: center;
    letter-spacing: 2px;
}

.ds_subhead {
    background-color: #85A157;
    color: #000;
    font-size: 12px;
    font-weight: bold;
    text-align: center;
    font-family: Arial, Helvetica, sans-serif;
    width: 32px;
}

.ds_cell {
    background-color:#FFFFCC;
    color: #000;
    font-size: 13px;
    text-align: center;
    font-family: Arial, Helvetica, sans-serif;
    padding: 5px;
    cursor: pointer;
    border: 1px solid #666600;
}

.ds_cell:hover {
    background-color: #F3F3F3;
} /* This hover code won't work for IE */

</style>
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style9 {font-size: 95%; font-weight: bold; color: #003300; font-family: Verdana, Arial, Helvetica, sans-serif; }
.style3 {font-weight: bold}
-->
</style>
</head>
<body>

<div id="wrapper">

    <?php
    include "Header.php";
    ?>

    <div id="content">
        <h2><span style="color:#003300"> Welcome Administrator </span></h2>
        <table width="100%" height="247" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td bgcolor="#003300"><span class="style10">Manage Special Offfers</span></td>
            </tr>
            <tr>
                <td>
                    <form id="form1" name="form1" method="post" action="InsertOffer.php">
                        <table width="100%" height="181" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td>Offer Name:</td>
                                <td>
                                    <span id="sprytextfield1">
                                        <label>
                                            <input type="text" name="txtName" id="txtName" />
                                        </label>
                                        <span class="textfieldRequiredMsg">A value is required.</span>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>Offer Detail:</td>
                                <td>
                                    <span id="sprytextarea1">
                                        <label>
                                            <textarea name="txtDetail" id="txtDetail" cols="45" rows="3"></textarea>
                                        </label>
                                        <span class="textareaRequiredMsg">A value is required.</span>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>Offer Valid Up to:</td>
                                <td>
                                    <span id="sprytextfield2">
                                        <label>
                                            <input type="text" name="txtDate" id="txtDate" onclick="ds_sh(this);" />
                                        </label>
                                        <span class="textfieldRequiredMsg">A value is required.</span>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>
                                    <label>
                                        <input type="submit" name="button" id="button" value="Create Offer" />
                                    </label>
                                </td>
                            </tr>
                        </table>
                    </form>
                </td>
            </tr>
            <tr>
                <td bgcolor="#003300"><span class="style10">Special Offers</span></td>
            </tr>
            <tr>
                <td>
                    <?php
                    // Establish Connection with MySQLi
                    $con = mysqli_connect("localhost", "root", "", "shopping");

                    // Check connection
                    if (mysqli_connect_errno()) {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }

                    // Specify the query to execute
                    $sql = "SELECT * FROM Offer_Master";

                    // Execute query
                    $result = mysqli_query($con, $sql);

                    // Check for errors in the query
                    if (!$result) {
                        echo "Error: " . $sql . "<br>" . mysqli_error($con);
                    }
                    ?>
                    <table width="100%" border="1" bordercolor="#003300">
                        <tr>
                            <th height="32" bgcolor="#BDE0A8" class="style3"><div align="left" class="style9 style5"><strong>Id</strong></div></th>
                            <th bgcolor="#BDE0A8" class="style3"><div align="left" class="style9 style5"><strong>Offer</strong></div></th>
                            <th bgcolor="#BDE0A8" class="style3"><div align="left" class="style9 style5"><strong>Detail</strong></div></th>
                            <th bgcolor="#BDE0A8" class="style3"><div align="left" class="style9 style5"><strong>Valid Upto</strong></div></th>
                            <th bgcolor="#BDE0A8" class="style3"><div align="left" class="style12">Delete</div></th>
                        </tr>
                        <?php
                        // Loop through each record
                        while ($row = mysqli_fetch_assoc($result)) {
                            $Id = $row['OfferId'];
                            $Offer = $row['Offer'];
                            $Detail = $row['Detail'];
                            $Valid = $row['Valid'];
                        ?>
                            <tr>
                                <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $Id; ?></strong></div></td>
                                <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $Offer; ?></strong></div></td>
                                <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $Detail; ?></strong></div></td>
                                <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $Valid; ?></strong></div></td>
                                <td class="style3"><div align="left" class="style9 style5"><strong><a href="DeleteOffer.php?OfferId=<?php echo $Id; ?>">Delete</a></strong></div></td>
                            </tr>
                        <?php
                        }
                        // Retrieve the number of records returned
                        $records = mysqli_num_rows($result);
                        ?>
                        <tr>
                            <td colspan="5" class="style3"><div align="left" class="style12"><?php echo "Total " . $records . " Records"; ?> </div></td>
                        </tr>
                    </table>
                    <?php
                    // Close the connection
                    mysqli_close($con);
                    ?>
                </td>
            </tr>
        </table>
    </div>

</div>

</body>
</html>
