<?php
    include "config1.php";

    if(isset($_POST['submit3'])){
        $user_id=$_POST['id'];
        $first_name=$_POST['firstname'];
        $last_name=$_POST['lastname'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $gender=$_POST['gender'];
    
    $sql="UPDATE `user` SET `firstname`='$first_name',`lastname`='$last_name',`email`='$email',`password`='$password',`gender`='$gender' WHERE `id`='$user_id'";
    
    $result=mysqli_query($conn,$sql);

    if($result==TRUE){
        echo "your data is updated";
        header('Location: view.php');
    }
    else{
        echo "error:".$sql1."<br>".$conn->error;
    }
}
    if(isset($_GET["id"])){
         $user_id=$_GET["id"];
         $sql1= "SELECT * FROM `user` WHERE `id`='$user_id'";
         $result=mysqli_query($conn,$sql1);
            while($row=$result->fetch_assoc()){
              $first_name=$row['firstname'];
              $last_name=$row['lastname'];
              $email=$row['email'];
              $password=$row['password'];
              $gender=$row['gender'];
              $id=$row['id'];
    }
}
         ?> 
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            function next1(){
            document.getElementById("1").addEventListener("submit",function(event){event.preventDefault();});
            document.getElementById("1").style.display = "none";
            document.getElementById("2").style.display = "unset";
            document.getElementById("3").style.display = "none";
            }

            function next2(){
            document.getElementById("2").addEventListener("submit",function(event){event.preventDefault();});
            document.getElementById("1").style.display = "none";
            document.getElementById("2").style.display = "none";
            document.getElementById("3").style.display = "unset";
            }

            function back1(){
            document.getElementById("2").addEventListener("submit",function(event){event.preventDefault();});
            document.getElementById("1").style.display = "unset";
            document.getElementById("2").style.display = "none";
            document.getElementById("3").style.display = "none";
            }

            function back2(){
            document.getElementById("3").addEventListener("submit",function(event){event.preventDefault();});
            document.getElementById("1").style.display = "none";
            document.getElementById("2").style.display = "unset";
            document.getElementById("3").style.display = "none";
            }
            
        </script>
</head>
<body>
    <form action="update.php" method="POST">

        <div class="pagination" class="text-center">
        <li><a onclick="back1()">1</a></li>
        <li><a onclick="next1()">2</a></li>
        <li><a onclick="next2()">3</a></li>
        </div>
        <br>

        <div id="1" style="visibility:visible;">
        <fieldset>
            First name:
            <input type="text" name="firstname" value="<?php echo $first_name;?>">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <br>
            Last name:
            <input type="text" name="lastname" value="<?php echo $last_name;?>">
            <br>
            <input type="button" name="submit1" value="next" onclick="next1()">
         </fieldset>
        </div>

      <div id="2" style="display:none;">
        <fieldset>
            Email:
            <input type="text" name="email" value="<?php echo $email;?>">
            <br>
            Password:
            <input type="text" name="password" value="<?php echo $password;?>">
            <br>
            <a href="javascript: void(0);"  value="back"  onclick="back1();">back1</a>
            <input type="button" name="submit2" value="next" onclick="next2()">
        </fieldset>
        </div>

     <div id="3" style="display:none;">
        <fieldset>
            Gender<br>
            <input type="radio" name="gender" value="male" <?php if($gender=='male'){ echo "checked";}?>>male
            <input type="radio" name="gender" value="female" <?php if($gender=='female'){ echo "checked";}?>>female
            <br>
            <a href="javascript: void(0);" value="back" onclick="back2();">back2</a>
            <input type="submit" name="submit3" value="submit">
        </fieldset>
        </div>  
    </form>
</body>
</html>