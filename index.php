<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="styles/style.css" type="text/css">
    <link rel="stylesheet" href="styles/styleCarousel.css">
   

</head>

<body>
    <?php
            include('HeaderFooter/header.php');
        ?>
    <div class="container">

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
            <p class="section-title">Get the Taste of <span class='color'> Prime!</span></p>
         
            <div class="categories">
                <div class="meals-description">
                    <img src="images/breakfast.jpg" class="meals-img">
                    <p class="meals-text">Breakfast</p>
                    <button class="categories-btn">View Details</button>
                </div>
                <div class="meals-description">
                    <img src="images/nonveg.webp" class="meals-img">
                    <p class="meals-text">Non veg Items</p>
                    <button class="categories-btn">View Details</button>
                </div>
                <div class="meals-description">
                    <img src="images/veg.jpg" class="meals-img">
                    <p class="meals-text">Veg Items</p>
                    <button class="categories-btn">View Details</button>
                </div> 
                <div class="meals-description">
                    <img src="images/drinks.jpg" class="meals-img">
                    <p class="meals-text">Drinks</p>
                    <button class="categories-btn">View Details</button>
                </div> 
            </div>
        </div>


    </div>
    <?php
            include('HeaderFooter/footer.php');
        ?>

    <script src="scripts/scriptCarousel.js"></script>
</body>

</html>