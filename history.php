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
                    <li><a href="view.php" >View All Customers</a></li>
                    <li><a href="transfers.html">Transfer Money</a></li>
                    <li><a href="history.php"class = "active">Transaction History</a></li>
                </ul>    
		    </nav> 
        </div>
    </header>
    <div class ="main-div">
        <h1 style="font color: whitesmoke;">History of all transactions</h1>
        
        <div class="center-div">
            <table>
                <thread>
                <tr>
                    <th>Sr No</th>
                    <th>Sender Name</th>
                    <th>Reciever Name</th>
                    <th>Amount</th>
                    <th>Date and Time</th>
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
                        $sql ="Select Sr_no,sname,rname,amt,Date_time from transction";
                        $result =$conn->query($sql);
                        if($result->num_rows > 0)
                        {
                            if($result-> num_rows > 0)
                            {
                                while($row = $result-> fetch_assoc())
                                {
                                    echo"<tr><td>".$row["Sr_no"]."</td><td>".$row["sname"]."</td><td>".$row["rname"]."</td><td>".$row["amt"]."</td><td>".$row["Date_time"]."</td></tr>";
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