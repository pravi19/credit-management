<!DOCTYPE HTML> 
<html>
	<head>
		<title>Profile</title> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link rel="stylesheet" href="style.css"> 
	</head>
        <body>
              <nav class="navbar navbar-expand-lg custom-navbar sticky">
                  <div class="container  main-nav">
                      <a class="navbar-brand" href="index.php">Credit Management</a>
                    </div>
                  <ul class="navbar-nav ">
                          <li class="nav-item active">
                              <a class="nav-link" href="view_all_users.php">Back</a>
                          </li>
                  </ul>
                </nav>
          <div>
                      <h2>Profile Details </h2>
                    
            </div>
    
    <style>
        
        h3{
            margin: 10px 10px;
            text-align: center;
        }
        h2
        {
            font-size: 250%;
            color: black;
            text-align: center;
            margin-top: 70px;
            margin-left: auto;
            margin-right: auto;
        }
        table{
            margin: auto;
        }
    </style>
        <?php
$mysqli=new mysqli("localhost","demo","uo9ydfTFWQ4dsa5X","user");
$receiver_id=$_GET['id'];
$result=$mysqli->query("SELECT user_id, name, email, gender from users where user_id='$receiver_id'");
$html=    
"<html>
	<head>
    </head>
    <body>
            <table>
            <tr>
            <td><h3><b>USER ID</b></h3></td>
            <td><h3><b>NAME</b></h3></td>
            <td><h3><b>MAIL</b></h3></td>
            <td><h3><b>GENDER</b></h3></td>
            </tr>";
            
    while($row=$result->fetch_array())
    {
        $html.="<tr>";
        for($i=0;$i<4;$i++)
        {
            $html.= "<td>"."<h3>".$row[$i]."</h3>"."</td>";
        }
        $html.="</tr>";

    }
$html.="
        </table>
        </body>
        </html>";
echo $html;
?>
            <div>
                      <h2>Transferring Process</h2>
                    
            </div>
            
        <div class="container">
       
        <form name="myForm" class="form-horizontal" role="form" method="POST" action="#">
        
          <div class="form-group">
          
            <label for="sender_id" class="col-sm-2 control-label">Your user ID</label>
            
            <div class="col-sm-10">
            
              <input type="text" name="sender_id" class="form-control" required>
            
            </div>
            </div>
            <div class="form-group">
          
            <label for="credits" class="col-sm-3 control-label">Credits to be transferred</label>
            
            <div class="col-sm-10">
            
              <input type="text" name="credits" class="form-control" required>
            
            </div>
            </div>
          
          
          <div class="form-group">
            
            <div class="col-sm-10 col-sm-offset-2">
            
              <button type="submit" name="submit" class="btn btn-primary btn1">Transfer!</button>
            
            </div>
          
          </div>
                    <?php 
		
		$errors = "";
		$sender_id="";
            $credits=0;
		if (isset($_POST["submit"])) { 
		
		  if (!empty($_POST["sender_id"])) { 
		  
			$sender_id = filter_var($_POST["sender_id"],FILTER_SANITIZE_MAGIC_QUOTES);
              $val=$mysqli->query("select name from users where user_id='$sender_id' ");
              $row=$val->fetch_array();
            if($row[0]=="")
			$errors .= "Id doesnot exist Please re-enter.<br><br>";
		  
		  }
            if(!empty($_POST["credits"]))
            {
                $credits=filter_var($_POST["credits"], FILTER_SANITIZE_NUMBER_INT);
                $val=$mysqli->query("select curr_credit from users where user_id='$sender_id' ");
                $row=$val->fetch_array();
                $row[0]=filter_var($row[0], FILTER_SANITIZE_NUMBER_INT);
		        if($row[0]<$credits)
			     $errors .= "You don't have sufficient credits!";
                
            }
                
		  if (!empty($errors)) { 
		
		  ?>
		  
		  <div class="alert alert-danger">
		  
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Error!</strong> The following errors occured:<br><br><?php echo $errors; ?>
		  
		  </div>
		  
		  <?php
		  
		  }
		  
		  else { 
		  ?>
           
          <?php 
              
              $val=$mysqli->query("select curr_credit from users where user_id='$receiver_id' ");
              $rows=$val->fetch_array();
              $rows[0]=filter_var($rows[0], FILTER_SANITIZE_NUMBER_INT);
              $rows[0]=$rows[0]+$credits;
              $row[0]=$row[0]-$credits;
              $mysqli->query("update users set curr_credit='$row[0]' where user_id='$sender_id'");
              $mysqli->query("update users set curr_credit='$rows[0]' where user_id='$receiver_id'");
              $mysqli->query("insert into transfers set sender='$sender_id',receiver='$receiver_id', amount='$credits'");
              ?>
              <h3><strong>Success!</strong></h3>
            <br>
            <br>
            <?php
             
		  }
		  
		  
		  
		
		} // form isset test
		
		?>
        
        </form>
            </div>
             <footer id="footer">
            <div class="container">
                <p class="lead">
                    Made with &hearts; by Pravitharan
                </p>
            </div>
            
            </footer>
    </body>
</html>
      