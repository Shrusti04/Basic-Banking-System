<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Basic Banking System</title>
	<link rel="stylesheet" href="css/mycss1.css">
    <?php include 'css/styletable.css'; ?>
</head>    
<body>
    <header>
        <div class = "main">   
            <nav>
                <div class="logo">
                    <h2>Banking System</h2>
                </div>    
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="view.php" class = "active">View All Customers</a></li>
                    <li><a href="transfers.html">Transfer Money</a></li>
                    <li><a href="history.php">Transaction History</a></li>
                </ul>    
		    </nav> 
        </div>
    </header>
    
    <div class ="main-div">
        <h1>List of all the Customers</h1>
        
        <div class="center-div">
            <table  style="margin-left:auto;margin-right:auto;">
                <thread>
                <tr>
                    <th>Customer ID</th>
                    <th>Name of Customer</th>
                    <th>Email Id</th>
                    <th>Amount</th>
                </tr>
                </thread>   
                <?php
                    $host = "localhost";
                    $dbUsername = "shrusti1";
                    $dbPassword = "shrusti1";
                    $dbName = "internet_banking";

                    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
                    if(mysqli_connect_error())
                    {
                        die('Connect Error ('.mysqli_connect_errno() .')'
                        .mysqli_connect_error());
                    }
                    else
                    {
                        $sql ="Select Cust_id, Name,Email_id,Amount from customer";
                        $result =$conn->query($sql);
                        if($result->num_rows > 0)
                        {
                            if($result-> num_rows > 0)
                            {
                                while($row = $result-> fetch_assoc())
                                {
                                    echo"<tr><td>".$row["Cust_id"]."</td><td>".$row["Name"]."</td><td>".$row["Email_id"]."</td><td>".$row["Amount"]."</td></tr>";
                                }
                                echo "</table>";
                            }
                            else
                            {
                                echo "0 result";
                            }
                        }
                    }
                $conn->close();
                ?>
            </table>
        </div>
    </div> 
</body>
</html>   