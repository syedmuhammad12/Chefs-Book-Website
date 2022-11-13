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
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">

</head>

<body>
    
<!-- header section starts  -->

<header>

    <!--<img src="charm.png" class="logo">-->

    <input type="checkbox" id="menu-bar">
    <label for="menu-bar" class="fas fa-bars"></label>

    <nav class="navbar">
        <a href="#home">home</a>
        <a href="#footer">contact</a>
        <a href="registerform.php">sign-up</a>
    </nav>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

    <div class="content">
        <h3>chef's <span>book</span></h3>
        <p>You Can Only Be As Good As Your Tastes. Find Best Food From All Over The World And Publish Your Own.
        One Stop Shop For Your Food Craving.</p>
        <!--<a href="#" class="btn">dashboard</a>-->
    </div>

    <div class="image">
        <img src="chef.png" alt="">
    </div>

</section>

<!-- home section ends -->

<!-- features section starts  -->

<section class="recipes">

    <h1 class="heading"> Recipe's </h1>

    <div class="box-container">

        <?php

        // Connecting to database
            // $server_name = "localhost";
            // $mysql_username = "id18865561_chefs_maaz";
            // $mysql_password = "Nni]w*9rqV#52F6Q";
            // $mysql_database = "id18865561_chefs";
            $server_name = "localhost";
            $mysql_username = "id18865561_chefs_maaz";
            $mysql_password = "Nni]w*9rqV#52F6Q";
            $mysql_database = "id18865561_chefs";

            // Connecting to dbms
            $conn = mysqli_connect($server_name, $mysql_username, $mysql_password, $mysql_database);

            $read = "SELECT * FROM Recipes JOIN Chefs ON Recipes.Username = Chefs.Username";
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
                $rec_name = $row["RecipeName"];
                $rec_ing = $row["Ingredients"];
                $rec_proc = $row["Procedure"];
                $rec_image = $row["Image"];
                $rec_image = "https://chefs-book.000webhostapp.com/images/$rec_image";
                $rec_chef = $row["Chefname"];
                $rec_user = $row["Username"];
                $rec_mail = $row["Chefemail"];
            ?>
            <div class="box reveal">
                <img src="<?php echo $rec_image; ?>" alt="">
                <h3><?= $rec_name ?></h3>
                <p><i><?= "BY: $rec_chef" ?></i></p>
                <a role="button" href="recipes.php?name=<?= $rec_name ?>&ing=<?= $rec_ing ?>&procedure=<?=$rec_proc?>&img=<?= $rec_image ?>&chef=<?= $rec_chef ?>" class="btn">View</a>
            </div>
            
                
        <?php endforeach; ?>
        <?php endif; ?>
        <?php endif; ?>
        

        <!-- <div class="box reveal">
            <img src="icon2.jpg" alt="">
            <h3>Lean & Green Taco Salad</h3>
            <p><i>"To remember a successful salad is to remember a successful dinner. This salad is not just the meal, it's the style."</i></p>
            <a href="recipes.php" class="btn">View</a>
        </div>

        <div class="box reveal">
            <img src="icon3.jpg" alt="">
            <h3>Chicken Fillet</h3>
            <p><i>"If you know somethin' well, you can always paint it but people would be better off buyin chickens."</i></p>
            <a href="recipes.php" class="btn">View</a>
        </div>

        <div class="box reveal">
            <img src="icon4.jpg" alt="">
            <h3>Marinated Chicken</h3>
            <p><i>"Life was just a tire swing... Blackberry pickin', eatin' fried chicken."</i></p>
            <a href="recipes.php" class="btn">View</a>
        </div>

        <div class="box reveal">
            <img src="icon5.jpg" alt="">
            <h3>Popcorn Chciken Nuggets</h3>
            <p><i>"If you look at me close enough, there's a small resemblance to a chicken nugget. I don't know if it's my skin texture or my hair, but the resemblance is definitely there."</i></p>
            <a href="recipes.php" class="btn">View</a>
        </div> -->

    </div>

</section>

<!-- features section ends -->


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

<script type="text/javascript">
        window.addEventListener("scroll", reveal);
        function reveal(){
            var reveals = document.querySelectorAll(".reveal");

            for(var i = 0; i < reveals.length; i++){
                var windowheight = window.innerHeight;
                var revealtop = reveals[i].getBoundingClientRect().top;
                var revealpoint = 150;

                if(revealtop < windowheight - revealpoint){
                    reveals[i].classList.add("active");
                }
                else{
                    reveals[i].classList.remove("active");
                }
            }
        }
</script>

</body>
</html>