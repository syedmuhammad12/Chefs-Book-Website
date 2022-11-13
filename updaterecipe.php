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
    <!-- <link rel="stylesheet" href="updaterecipe.css" > -->
    <link rel="stylesheet" href="updaterecipe.css?v=<?php echo time(); ?>">

</head>

<?php
$rec_id = $_GET['rec_id'];
$rec_name = $_GET['name'];
$rec_ing = $_GET['ing'];
$rec_proc = $_GET['procedure'];
$rec_img = $_GET['img'];
$chef = $_GET['chef'];
$username = $_GET['chef_username'];
$mail = $_GET['email'];
?>


<body>

<!-- header section starts  -->

<header>


    <input type="checkbox" id="menu-bar">
    <label for="menu-bar" class="fas fa-bars"></label>

    <nav class="navbar">
        <a href="mainpage.php?name=<?= $chef ?>&email=<?= $mail ?>&user=<?= $username ?>">home</a>
        <a href="#footer">contact</a>
        <ul>
            <li><?= str_replace(' ', '-', $chef) ?>
                <ul>
                    <li><a href="https://chefs-book.000webhostapp.com/addrecipe.php?name=<?= $chef ?>&email=<?= $mail ?>&username=<?= $username ?>">Add-Recipe</a></li>
                    <li><a href="updaterecipes.php?name=<?= $chef ?>&email=<?= $mail ?>&username=<?= $username ?>">Update-Recipe</a></li>
                    <li><a href="index.php">Log-Out</a></li>
                </ul>   
            </li>
        </ul>
    </nav>

</header>

<div class="main">
    <form method="post">
        <img class="display_image" id="output" src="<?php echo $rec_img; ?>"/>
        
        <p><b>Recipe Name</b></p>
        <input type="text" id="email"  class="form1" autocomplete="off" placeholder=" " value="<?php echo $rec_name; ?>" name = "RecipeName">
        <p><b>Ingredients</b></p>
        <textarea rows = "5" cols = "60" name="Ingredients" class="form2"><?= $rec_ing ?></textarea>
        <p><b>Methods</b></p>
        <textarea rows = "5" cols = "60" name="Procedure" class="form2"><?= $rec_proc ?></textarea>

        <div>
            <input type="submit" name="update_rec" class="btn" value="Update Recipe">
            <input type="submit" name="delete_rec" class="btn" value="Delete Recipe">
        </div>
    </form>



    <?php

        if(isset($_POST["update_rec"])){

            $server_name = "localhost";
            $mysql_username = "id18865561_chefs_maaz";
            $mysql_password = "Nni]w*9rqV#52F6Q";
            $mysql_database = "id18865561_chefs";

            // Connecting to dbms
            $conn = mysqli_connect($server_name, $mysql_username, $mysql_password, $mysql_database);
            $rec_name=$_POST['RecipeName'];
            $ingredients=$_POST['Ingredients'];
            $procedure=$_POST['Procedure'];

            $update_1 = "UPDATE `Recipes` SET RecipeName= '$rec_name' WHERE Rec_id='$rec_id'";
            mysqli_query($conn, $update_1);
            $update_2 = "UPDATE `Recipes` SET `Ingredients`= '$ingredients' WHERE Rec_id='$rec_id'";
            mysqli_query($conn, $update_2);
            $update_3 = "UPDATE `Recipes` SET `Procedure`='$procedure' WHERE Rec_id='$rec_id'";
            mysqli_query($conn, $update_3);
            echo("<script>window.location.href = 'updaterecipes.php?name=$chef&username=$username&email=$mail';</script>");
            


        }
        elseif(isset($_POST["delete_rec"])){
            
            $server_name = "localhost";
            $mysql_username = "id18865561_chefs_maaz";
            $mysql_password = "Nni]w*9rqV#52F6Q";
            $mysql_database = "id18865561_chefs";

            // Connecting to dbms
            $conn = mysqli_connect($server_name, $mysql_username, $mysql_password, $mysql_database);

            $del = "DELETE FROM `Recipes` WHERE Rec_id='$rec_id'";
            mysqli_query($conn, $del);
            $ro = "SELECT * FROM Recipes";
            $res = mysqli_query($conn, $ro);
            $total_rows = mysqli_num_rows($res);
			if($total_rows==0){
            $dele = "DROP TABLE `Recipes`,`Chefs`";
            mysqli_query($conn, $dele);
            rmdir("https://chefs-book.000webhostapp.com/images");
			}
            echo("<script>window.location.href = 'updaterecipes.php?name=$chef&username=$username&email=$mail';</script>");

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

