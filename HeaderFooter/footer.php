<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0px;
            padding: 0px;
        }
        .footer {
            padding-top:60px ;
            padding-bottom: 40px;

            background-color: white;
            color: black;
            font-family: Arial, Helvetica, sans-serif;
            background-color: #263675;
        }

       .box-container{
        display: flex;
      
       }
       .box a{
        display: block;
        text-decoration: none;
        color:white ;  
        padding-bottom: 20px;
       }
       .box p{
        padding-bottom: 20px;

        color: white;
       }
       .box h3{
        text-transform: uppercase;
        font-weight: bold;
        font-size: 20px;
        margin-bottom: 30px;
        color: #A8AFC8;
       }
       .box{
        margin-left: 180px;
       }
       .credit{
        background-color: #0B1B5B;
        color: white;
        font-size: 15px;
        padding: 25px;
        display: flex;
        justify-content: center;
       }
    </style>
</head>

<body>
    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3>quick links</h3>
                <a href="home.php">home</a>
                <a href="about.php">about</a>
                <a href="contact.php">contact</a>
                <a href="shop.php">shop</a>
            </div>

            <div class="box">
                <h3>Opening time</h3>
                <a href="#">Monday-Friday</a>
                <a href="#p">06:00 am to 06:00 pm</a>
                <a href="#">Saturday-sunday</a>
                <a href="#">09:00 am to 05:00 pm</a>
            </div>

            <div class="box">
                <h3>contact info</h3>
                <p> <i class="fas fa-phone"></i>9843225292 </p>
                <p> <i class="fas fa-phone"></i> 9841179310 </p>
                <p> <i class="fas fa-envelope"></i> Roshik9841@gmail.com </p>
                <p> <i class="fas fa-map-marker-alt"></i>Mhepi,Kathmandu </p>
            </div>

            <div class="box">
                <h3>follow us</h3>
                <a href="https://www.facebook.com/profile.php?id=100009553355683"><i
                        class="fab fa-facebook-f"></i>facebook</a>
                <a href="https://www.instagram.com/roshikmaharjan/"><i class="fab fa-twitter"></i>twitter</a>
                <a href="https://x.com/RoshikMaharjan1"><i class="fab fa-instagram"></i>instagram</a>
                <a href="https://www.linkedin.com/in/roshik-maharjan-ba1130139/"><i
                        class="fab fa-linkedin"></i>linkedin</a>
            </div>

        </div>
   
       

    </section>
   
    <div class="credit">&copy; copyright @
        <?php echo date('Y'); ?> by <span>Mr.Roshik. All Rights reserved</span>
    </div>

</body>

</html>