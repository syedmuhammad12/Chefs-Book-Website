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
    <!-- <link rel="stylesheet" href="updaterecipes.css"> -->
    <link rel="stylesheet" href="updaterecipes.css?v=<?php echo time(); ?>">

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

<!-- header section ends -->


    <div class="main">

      <section class="policies" id="policies">

      <?php

            // Connecting to database
            $server_name = "localhost";
            $mysql_username = "id18865561_chefs_maaz";
            $mysql_password = "Nni]w*9rqV#52F6Q";
            $mysql_database = "id18865561_chefs";


            // Connecting to dbms
            $conn = mysqli_connect($server_name, $mysql_username, $mysql_password, $mysql_database);

            $read = "SELECT * FROM Recipes JOIN Chefs ON Recipes.Username = Chefs.Username WHERE Recipes.Username = '$username'";
            $result = mysqli_query($conn, $read);
            if($result){
            $total_rows = mysqli_num_rows($result);
            while($row = mysqli_fetch_assoc($result)){
                $rows[] = $row;
            }
            }
        ?>
            <?php if(isset($total_rows)): ?>
            <?php if($total_rows>0): ?>
            <?php foreach($rows as $row): ?>
                <?php
                    $rec_id=$row["Rec_id"];
                    $rec_name=$row["RecipeName"];
                    $rec_ing=$row["Ingredients"];
                    $rec_proc=$row["Procedure"];
                    $rec_image=$row["Image"];
                    $rec_image = "https://chefs-book.000webhostapp.com/images/$rec_image";
                ?>
                <div class="box-container">
                    <div class="box reveal">
                        <img src="<?php echo $rec_image; ?>" alt="">
                        <h3><?= $rec_name ?></h3>
                        <p><?= $rec_ing ?></p>
                        <a href="updaterecipe.php?name=<?= $rec_name ?>&rec_id=<?= $rec_id ?>&ing=<?= $rec_ing ?>&procedure=<?=$rec_proc?>&img=<?= $rec_image ?>&chef=<?= $chef_name ?>&chef_username=<?= $username ?>&email=<?= $email ?>" class="btn">Update</a>-
                    </div>
                </div>
                
            <?php endforeach; ?>
            <?php endif; ?>
            <?php endif; ?>

    </section>

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