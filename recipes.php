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
    <link rel="stylesheet" href="recipes.css?v=<?php echo time(); ?>">

</head>

<?php
    $name = $_GET['name'];
    $ing = $_GET['ing'];
    $proc = $_GET['procedure'];
    $img = $_GET['img'];
    $chef = $_GET['chef'];
    
    if(isset($_GET['acc_name']) || isset($_GET['user']) || isset($_GET['email'])) {
    $acc_name = $_GET['acc_name'];
    $user = $_GET['user'];
    $email = $_GET['email'];
}

?>

<body>

    <div class="main">
      <nav>
         <?php if(isset($_GET['acc_name']) || isset($_GET['user']) || isset($_GET['email'])): ?>
        <button class="button"><a href="mainpage.php?name=<?= $acc_name ?>&user=<?= $user ?>&email=<?= $email ?>"><b>Go Back</b></a></button>
        <?php endif; ?>
        <?php if(!isset($_GET['acc_name'])):?>
        <button class="button"><a href="index.php"><b>Go Back</b></a></button>
        <?php endif; ?>
        
      </nav>

      <section class="policies" id="policies">
        <div class="box-container">
            <div class="box reveal">
                <img src="<?php echo $img; ?>" alt="">
                <h3><?= $name ?></h3>
                 <p><i><?= "BY: $chef" ?></i></p> 
                <h5>Ingredients</h5>
                <p><?= $ing ?></p>
                <h5>Methods</h5>
                <p><?= $proc ?></p>
                 
            </div>
            <!-- <div class="box reveal">
                <img src="./images/product-2.jpg" alt="">
                <h3>Lean & Green Taco Salad</h3>
                <p>We value your trust in providing us your Personal Information, thus we are striving to use commercially acceptable means of protecting it. But remember that no method of transmission over the internet, or method of electronic storage is 100% secure and reliable, and we cannot guarantee its absolute security.</p>
            </div>
            <div class="box reveal">
                <img src="logo.jpg" alt="">
                <h3>Changes to This Privacy Policy</h3>
                <p>We may update our Privacy Policy from time to time. Thus, you are advised to review this page periodically for any changes. We will notify you of any changes by posting the new Privacy Policy on this page. This policy is effective as of 2022-03-09</p>
            </div>
            <div class="box reveal">
                <img src="logo.jpg" alt="">
                <h3>Log Data</h3>
                <p>Our app OBD Charm fetches the location and OBDII data from cars and saves it in an excel file visible to the user Our App runs 24/7 in the foreground auto connect to OBDII Device and starts fetching data , given that a user might forget to open the app while he is driving We therefore cannot move our logic to the activity .In future our app would also tell the users about road traffic conditions with GPS locations.</p>
            </div>
            <div class="box reveal">
                <img src="logo.jpg" alt="">
                <h3>Children’s Privacy</h3>
                <p>These Services do not address anyone under the age of 13. We do not knowingly collect personally identifiable information from children under 13 years of age. In the case we discover that a child under 13 has provided us with personal information, we immediately delete this from our servers. If you are a parent or guardian and you are aware that your child has provided us with personal information, please contact us so that we will be able to do the necessary actions.</p>
            </div> -->
    
        </div>
    
    </section>
    
</body>
</html>