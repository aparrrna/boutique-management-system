<div id="right-col">
    <div class="scroll">
        <ul class="side">
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
                ?>
                <li><a href="Products.php?CategoryId=<?php echo $Id; ?>"><?php echo $CategoryName; ?></a></li>
                <?php
            }

            // Close the connection
            mysqli_close($con);
            ?>
        </ul>
    </div>

    <ul class="side">
        <table width="100%" height="122" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td><div align="center"><a href="checkout.php">Proceed To Checkout</a></div></td>
            </tr>
            <tr>
                <td><div align="center"><img src="img/checkout.png" width="32" height="32" /></div></td>
            </tr>
            <tr>
                <td><div align="center"><a href="History.php">Order History</a></div></td>
            </tr>
            <tr>
                <td><div align="center"><img src="img/order.png" width="32" height="32" /></div></td>
            </tr>
        </table>
    </ul>
</div>
