<?php include '../../core/init.php';
protect_page();



$role= $user_data['role'];
    
    
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/IM.css" type="text/css"/>
   
</head>
<body>
<div class="row">
    <?php
    include '../include/header.php'
    ?>
    <div id="nav">
        <ul id="mainsidebar">
            <li class="sidenav">
                <div id="side">
                    <a href="../battery/product.php"><img src="../img/a.png" class="pic"></a>
                    <span>Product Details</span>
                </div>
            </li>
            <li class="sidenav">
                <div id="side">
                    <a href="../stock/stock.php"><img src="../img/b.png" class="pic"></a>
                    <span>Stock</span>
                </div>
            </li>
            <li class="sidenav">
                <div id="side">
                    <a href="../dealer/dealer.php"><img src="../img/c.png" class="pic"></a>
                    <span>Dealer</span>
                </div>
            </li>
            <li class="sidenav">
                <div id="side">
                    <a href="../salesperson/salep.php"><img src="../img/d.png" class="pic"></a>
                    <span>Salesperson</span>
                </div>
            </li>
            <li class="sidenav">
                <div id="side">
                    <a href="../report/report.php"><img src="../img/e.png" class="pic"></a>
                    <span>Reports</span>
                </div>
            </li>
        </ul>
    </div>
    <div id="content">
        
        <?php
        require "../../database/connect.php";
        //session_start();
        $v = $_SESSION['f_name'];
        //echo $v;


        $sql = "SELECT * FROM users WHERE f_name = '$v'";

        $result= mysqli_query($connection, $sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                
                $h0=$row["user_id"];
                $h1=$row["f_name"];
                $h2=$row["l_name"];
                $h3=$row["address"];
                $h4=$row["telephoneNo"];
                $h5=$row["nic"];
                $h6=$row["email"];
                $h7=$row["username"];
                $h8=$row["password"];
                
                
            }
        }else{
            echo "Zero results";
        }

        
        $error=FALSE;
        $f_nameerr = $l_noerr =  $addresserr = $telephoneNoerr = $nicerr = $email = $usernameerr = $passworderr =  "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {


            if(empty($_POST['f_name'])){
                $f_nameerr = "";
                $error = TRUE;
            }else{
                $f_name = $_POST['f_name'];
            }





            if(empty($_POST['l_name'])){
                $l_nameerr = "";
                $error = TRUE;
            }else{
                $l_name = $_POST['l_name'];

            }



            if(empty($_POST['address'])){
                $addresserr = "";
                $error = TRUE;
            }else{
                $address = $_POST['address'];
            }




            if(empty($_POST['telephoneNo'])){
                $telephoneNoerr = "";
                $error = TRUE;
            }else{
                $telephoneNo= $_POST['telephoneNo'];
            }

            if(empty($_POST['nic'])){
                $nicerr = "";
                $error = TRUE;
            }else{
                $nic= $_POST['nic'];

            }

            if(empty($_POST['email'])){
                $emailerr = "";
                $error = TRUE;
            }else{
                $email = $_POST['email'];
                if (strpos($email, '@') == FALSE) {
                    $emailerr =  "Invalid email address";
                    $error = TRUE;
                }
            }

           

            if ($error==FALSE){

                //$sql="UPDATE 'dealer' SET dealer_name='$_POST[dealer_name]', NIC='$_POST[NIC]', address='$_POST[address]', salesPerson_id='$_POST[salesPerson_id]', mobileNo='$_POST[mobileNo]', telephoneNo='$_POST[telephoneNo]', email='$_POST[email]', fax='$_POST[fax]' WHERE dealer_id='$v'";
                $sql = "UPDATE `users` SET `f_name`='$_POST[f_name]',`l_name`='$_POST[l_name]',`address`='$_POST[address]',`telephoneNo`='$_POST[telephoneNo]',`nic`='$_POST[nic]',`email`='$_POST[email]' WHERE `f_name`='$v'";
                if(mysqli_query($connection,$sql)){
                    echo "<script>alert('Successfully Updated');
                     window.location.href='http://localhost/MasterProject1/InventoryManager/Do/view.php';</script>";
                    
                } else{echo "error";}
            }
        }

        ?>
        <div class="ad">
            <form class="AddPro" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" id="hello" name= "myForm" onsubmit="return(validate());">



             <a class="enter" style="float:left;text-align:center;" href="add.php">Add</a>
               <a class="enter" style="float:left;text-align:center;"href="view.php">Search</a>
               
                <a class="enter" style="float:left;text-align:center;" href="../inventory.php">Back</a>

      
                        </br> </br></br></br>
                <h1 class="add">Update Data Entry Operator</h1>
                <table id="ad">
                    <tr>
                        <td>
                            <b>User ID: <?php echo $h0; ?></b>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <b>First Name:</b>
                        </td>
                       <td width="400px">
                            <input type="text" name="f_name" style="width: 200px" value="<?php echo $h1; ?>">
                        </td>
                    </tr>

                    <tr>

                        <td>
                            <b>Last Name:</b>
                        </td>

                        
                        <td>
                            <input type="text" name="l_name" style="width: 200px" value="<?php echo $h2; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <b>Address:</b>
                        </td>

                        <td>
                            <input type="text" name="address" style="width: 300px" value="<?php echo $h3; ?>">
                        </td>


                        
                    </tr>

                    <tr>

                       <td>
                            <b>Telephone No:</b>
                        </td>
                        
                        <td>
                            <input type="text" name="telephoneNo" style="width: 200px" value="<?php echo $h4; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td><b>NIC:</b></td>


                        <td>
                            <input type="text" name="nic" style="width: 200px" value="<?php echo $h5; ?>">
                        </td>






                        
                    </tr>

                    <tr>
                        <td><b>Email:</b></td>
                        <td>
                            <input type="text" name="email" style="width: 200px" value="<?php echo $h6; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <b>Username:</b>
                        </td>
                        
                

                    
                        <td>
                            <input type="text" name="username" style="width: 200px" value="<?php echo $h7; ?>">
                        </td>
                        
                    </tr>

                     <tr>
                        <td>
                            <b>Password:</b>
                        </td>
                        
                

                    
                        <td>
                            <input type="password" name="username" style="width: 200px" value="<?php echo $h7; ?>">
                        </td>
                        
                    </tr>

                    
                    <tr>
                        <td></td>
                        <td>
                            <td id="data"><button class="submit" name="submit" value="send">Save</button></td>

                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <?php
        include '../include/footer.php';
        ?>
    </div>
</body>
</html>
