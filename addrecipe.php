<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chef's Book</title>

    <link rel="icon" type="image/png" href="favicon.jpeg">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="addrecipe.css?v=<?php echo time(); ?>">

</head>

<?php

$chef_name = $_GET["name"];
$email = $_GET["email"];
$username = $_GET["username"];
?>


<body>

<!-- header section starts  -->

<header>

    <!--<img src="charm.png" class="logo">-->

    <input type="checkbox" id="menu-bar">
    <label for="menu-bar" class="fas fa-bars"></label>

    <nav class="navbar">
        <a href="mainpage.php?name=<?= $chef_name ?>&email=<?= $email ?>&user=<?= $username ?>">home</a>
        <a href="#footer">contact</a>
        <ul>
            <li><?= str_replace(' ', '-', $chef_name) ?>
                <ul>
                    <li><a href="addrecipe.php?name=<?= $chef_name ?>&email=<?= $email ?>&username=<?= $username ?>">Add-Recipe</a></li>
                    <li><a href="updaterecipes.php?name=<?= $chef_name ?>&email=<?= $email ?>&username=<?= $username ?>">Update-Recipe</a></li>
                    <li><a href="index.php">Log-Out</a></li>
                </ul>   
            </li>
        </ul>
    </nav>

</header>

<div class="main">
    
    
    <script>
        var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
        URL.revokeObjectURL(output.src)
        }
    };
    </script>

    <form class="formmmm" method="post" enctype="multipart/form-data">
        <input class="formmmm" type="file" name="selectimage" id="selectimage" onchange="loadFile(event)">
        <div class="formmm">
            <img class="display_image" id="output"/>
            <p><b>Recipe Name</b></p>
            <input type="text" id="email" class="form1" name="RecipeName" autocomplete="off" placeholder=" " >
            <p><b>Ingredients</b></p>
            <textarea rows = "5" cols = "60" name = "Ingredients" class="form2"></textarea>
            <p><b>Methods</b></p>
            <textarea rows = "5" cols = "60" name = "Procedure" class="form2"></textarea>

            <!-- <a href="" class="btn">Add Recipe</a> -->
            <input type="submit" class="btn" name="add_recipe" value="Add Recipe">
        </div>
    </form> 


    <?php
    
    if(isset( $_FILES["selectimage"] )){
        $FileData = file_get_contents($_FILES["selectimage"]["tmp_name"]);
     
    }
    
    
    if(isset($_POST["add_recipe"])){

        $server_name = "localhost";
        $mysql_username = "id18865561_chefs_maaz";
        $mysql_password = "Nni]w*9rqV#52F6Q";
        $mysql_database = "id18865561_chefs";

        // Connecting to dbms
        $conn = mysqli_connect($server_name, $mysql_username, $mysql_password, $mysql_database);

        $tab_create_chef = "CREATE TABLE IF NOT EXISTS `Chefs` (`Username` VARCHAR(25) NOT NULL, `Chefname` VARCHAR(200) NOT NULL, `Chefemail` VARCHAR(50) NOT NULL, PRIMARY KEY (`Username`))";
        mysqli_query($conn, $tab_create_chef);

        $tab_create_rec = "CREATE TABLE IF NOT EXISTS `Recipes` (`Rec_id` INT(12) NOT NULL, `RecipeName` VARCHAR(200) NOT NULL, `Ingredients` VARCHAR(1500) NOT NULL, `Procedure` VARCHAR(9999) NOT NULL, `Image` VARCHAR(1500) NOT NULL, `Username` VARCHAR(25) NOT NULL, PRIMARY KEY (`Rec_id`), FOREIGN KEY (`Username`) REFERENCES `Chefs`(`Username`))";
        mysqli_query($conn, $tab_create_rec);

        
        $rec_name=$_POST['RecipeName'];
        $ingredients=$_POST['Ingredients'];
        $procedure=$_POST['Procedure'];

        $check_chef = "SELECT * FROM `Chefs` WHERE Username = '$username'";
        if($check_chef){
            $insert_chef = "INSERT INTO `Chefs` (`Username`, `ChefName`, `ChefEmail`) VALUES ('$username', '$chef_name', '$email')";
            mysqli_query($conn, $insert_chef);
        }

        while (TRUE){

            $rand_id = rand();
            $check_rec = "SELECT * FROM `Recipes` WHERE Rec_id = $rand_id";
            if($check_rec){
                if ( !is_dir( "images" ) ) {
                    mkdir( "images" );       
                }

                $filename="IMG".rand().".jpg";
                file_put_contents("images/".$filename, $FileData);
                $insert_rec = "INSERT INTO `Recipes` (`Rec_id`, `RecipeName`, `Ingredients`, `Procedure`, `Image`, `Username`) VALUES ($rand_id, '$rec_name', '$ingredients', '$procedure', '$filename', '$username')";
                mysqli_query($conn, $insert_rec);
                die();
            }

            else{
                
                continue;
            }


        }


    }




    ?>
    
</div>

<!-- header section ends -->

<!-- footer section starts  -->

<div class="footer" id="footer">

    <div class="box-container">

        <div class="box">
            <h3>Contact</h3>
            <p>If you have any questions or suggestions about our Privacy Policy, do not hesitate to contact us at syedmuhammad1111@gmail.com</p>
        </div>

    </div>

    <h1 class="credit"><i>All Rights Reseved</i></h1>

</div>

<!-- footer section ends -->

</body>
</html>

