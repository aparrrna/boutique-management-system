<div id="right-col">
    <div class="scroll">
        <ul class="side">
            <?php
            // Establish Connection with Database
            $con = new mysqli("localhost", "root", "", "shopping");

            // Check connection
            if ($con->connect_error) {
                die("Connection failed: " . $con->connect_error);
            }

            // Specify the query to execute
            $sql = "SELECT CategoryId, CategoryName FROM Category_Master";
            
            // Prepare and execute the query
            $stmt = $con->prepare($sql);
            $stmt->execute();

            // Bind result variables
            $stmt->bind_result($Id, $CategoryName);

            // Fetch values
            while ($stmt->fetch()) {
                ?>
                <li><a href="Products.php?CategoryId=<?php echo $Id; ?>"><?php echo $CategoryName; ?></a></li>
            <?php
            }

            // Close the statement
            $stmt->close();

            // Close the connection
            $con->close();
            ?>
        </ul>
    </div>

    <ul class="side"></ul>
</div>
