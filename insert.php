<?php
        $sname = filter_input(INPUT_POST, 'sname');
        $sid = filter_input(INPUT_POST, 'sid');
        $rname = filter_input(INPUT_POST, 'rname');
        $rid = filter_input(INPUT_POST, 'rid');
        $amt = filter_input(INPUT_POST, 'amt');
         
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
            $sql ="INSERT INTO transction(sname,sid,rname,rid,amt)
            values('$sname','$sid','$rname','$rid','$amt')";
            if($conn->query($sql))
            {
                echo "<p align=center>Amount is transfered successfully\r\n</p>";
            }
            else
            {
                echo "Error: ".$sql ."<br>". $conn->error;
            }
            $sql1="UPDATE customer c
                INNER JOIN transction t ON c.Cust_id=t.sid
                Set c.Amount=c.Amount - t.amt" ;
            
            $sql2="UPDATE customer c
                INNER JOIN transction t ON c.Cust_id=t.rid
                Set c.Amount=c.Amount + t.amt" ;
            
            if($conn->query($sql1) && $conn->query($sql2))
            {
                echo "<p align=center>Amount updated successfully</p>";
            }
            else
            {
                echo "Error: ".$sql ."<br>". $conn->error;
            }
            $conn->close();
        }
        
?>