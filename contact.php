
<?php
include("dbconnection.php");
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comments = $_POST['comments'];

    $query = mysqli_query($con, "insert into contact(name,email,msg) value('$name','$email','$comments')");
    if ($query) {
        echo "<script>alert('You have successfully inserted the data');</script>";
        echo "<script type='text/javascript'> document.location ='contact.php'; </script>";
      }
      else
        {
          echo "<script>alert('Something Went Wrong. Please try again');</script>";
        }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
   <link rel="stylesheet" href="styles/style.css">
</head>

<body>
      <?php
    include('HeaderFooter/header.php');
    ?>

    <div class="contact-container">
        <div class="contact-text">
            <p>Get in touch with us</p>
        </div>

        <div class="contact-main-box">
            <div class="contact-box">
                <img src="images/location.png" style="width:80px; height:70px">
                <p class="contact-text1">Location</p>
                <p>Khushibu, Nayabazar, Kathmandu</p>
            </div>
            <div class="contact-box">
                <img src="images/email.png" style="position: relative; bottom: 45px;">
                <p class="contact-text2">Email</p>
                <p style="bottom: 22px;">roshik9841@gmail.com</p>
            </div>
            <div class="contact-box">
                <img src="images/phone.png" style="width:170px; height:150px; position: relative; bottom: 70px;">
                <p class="contact-text3">Contact Us</p>
                <p style="bottom: 80px;">9843225292</p>
            </div>
        </div>

        <div class="contact-form">
            <form action="" method="POST">
                <p class="contact-form-text">Connect with Us</p>
                <p>
                    <label for="name">Name(Required)*</label><br>
                    <input type="text" name="name" class="contact-input" required><br>
                </p>
                <p>
                    <label for="email">Email(Required)*</label><br>
                    <input type="email" name="email" class="contact-input" required><br>
                </p>
                <p>
                    <label for="comments">Message(Required)*</label><br>
                    <textarea id="comments" name="comments" rows="6" cols="50" style="color:black;margin-bottom: 20px;" maxlength="200" required></textarea>
                </p>
                <p>
                    <button type="submit" name="submit" class="contact-form-submit">Submit</button>
                </p>
            </form>
        </div>

        <p>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28256.050311769446!2d85.26461967431644!3d27.717092100000006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18ef67a22d9f%3A0xedf3e2c86d367586!2sPrime%20College!5e0!3m2!1sen!2snp!4v1725178280794!5m2!1sen!2snp"
                width="100%" height="550" style="border:0;" allowfullscreen="" loading="lazy" class="contact-map"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </p>

    </div>

    <?php
    include('HeaderFooter/footer.php');
    ?>
</body>

</html>
