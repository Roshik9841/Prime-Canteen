<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/styleCarousel.css">
    <style>
        .index-info{
            display: flex;
            margin: 70px 150px 30px 150px;
        }   
        .h1-text{
            font-size: 50px;
            font-weight: bold;
            text-align: center;
            line-height: 1.5cm;
            margin-bottom: 20px;
            margin-right: 70px;
        }
        .index-text-color{
            color: #808080;
            font-size: 23px;
            margin-bottom: 50px;
        }
        .index-info-text button{
            background-color: #F4BE40;
            padding: 15px 30px;
            border-radius: 50px;
            border: none;
            cursor: pointer;
           
        }
        .index-info-text button a{
            text-decoration: none;
            color: white;
            font-weight: bold;

        }.index-info-logo img{
            width: 70px;
            height: 70px;
            background-color: #F4BE40;
            border-radius: 50%;
        }
        .index-info-logo{
            display: flex;
       
            width: 600px;
            flex-wrap: wrap;
        }
        .info-index-1,.info-index-2,.info-index-3,.info-index-4{
            margin: 0px 40px 30px 40px;
            font-size: 19px;
        }
    </style>

</head>

<body>
    <div class="container">
        <?php
            include('HeaderFooter/header.php');
        ?>
        <div class="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/samosha.avif" alt="Slide 1">
                </div>
                <div class="carousel-item">
                    <img src="images/aalochop.avif" alt="Slide 2">
                </div>
                <div class="carousel-item">
                    <img src="images/360_F_638251062_drqv8k8NABIqhajzp0P0iiDTehyHL1LF.jpg" alt="Slide 3">
                </div>
                <div class="carousel-item">
                    <img src="images/muffin.avif" alt="Slide 4">
                </div>
            </div>
            <button class="carousel-control prev" onclick="prevSlide()">&#10094;</button>
            <button class="carousel-control next" onclick="nextSlide()">&#10095;</button>
            <div class="carousel-indicators">
                <span class="indicator active" onclick="goToSlide(0)"></span>
                <span class="indicator" onclick="goToSlide(1)"></span>
                <span class="indicator" onclick="goToSlide(2)"></span>
                <span class="indicator" onclick="goToSlide(3)"></span>
            </div>

        </div>
        <div class="index-info">
            <div class="index-info-text">
                <p class="h1-text">We make the Best <br>Food in your College</p>
                <p class="index-text-color">Best food in budget and you can get it fresh and<br> hot.</p>

                <button><a href="about.php">Know More About us</a></button>
            </div>
            <div class="index-info-logo">
                <div class="info-index-1">
                    <img src="images/bugerLogo-removebg-preview.png">
                    <p>Right food baked with<br> natural ingredient</p>
                </div>
                <div class="info-index-2 ">
                    <img src="images/momoLogo-removebg-preview.png">
                    <p>The use of natural best <br> quality products</p>
                </div>
                <div class="info-index-3 ">
                    <img src="images/Screenshot_4-removebg-preview.png">
                    <p>Nepal's best chef and <br> Nutritionists!</p>
                </div>
                <div class="info-index-4 ">
                    <img src="images/Screenshot_3-removebg-preview.png">
                    <p>Fastest order prepared <br>and easy pick-up</p>
                </div>
               
            </div>

        </div>
        <div class="photo-gallery">
            <p class="section-title">Get the Taste of <span class='color'>Prime!</span></p>
            <p class="index-text-alignment">Food Gallery</p>
            <div class="index-photo-item"></div>
        </div>

        <?php
            include('HeaderFooter/footer.php');
        ?>

    </div>

    <script src="scripts/scriptCarousel.js"></script>
</body>

</html>