<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  
      <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/styleCarousel.css">
</head>

<body>
    <div class="container">
        <?php
            include('HeaderFooter/header.php');
        ?>
        <input type="text" class="js-input inputBar" placeholder="search here...">
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
        <div>
            <p class="section-title">Get the Taste of <span class='color'>Prime!</span></p>
        </div>
       
        <?php
            include('HeaderFooter/footer.php');
        ?>

    </div>

     <script src="scripts/scriptCarousel.js"></script>
</body>

</html>