<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About us</title>

    <style>
    
        .big-text {
            color: black;
            font-size: 35px;

        }

        .info-text {
            color: #BDBDBD;
            font-size: 18px;
        }

        .about-text {
            margin: 100px;
            position: relative;
            line-height: 40px;
            text-align: center;
            margin-bottom: 20px;
        }

        .food-item {
            display: flex;
            justify-content: space-around;
            margin: 100px;
        }

        .food-item img {
            height: 225px;

            border-radius: 20px;
            box-shadow: 5px 5px 10px gray;
            width: 275px;
        }

        .food-item p {
            line-break: anywhere;
        }

        .menu-item {
            display: flex;
            margin-bottom: 50px;
        }

        .menu-item img {
            width: 90px;
            height: 100px;
        }

        .alignment {
            margin: 0px 50px 50px 50px;
            text-align: center;
        }

        .menu-item {
            display: flex;
        }

        .item1,
        .item2,
        .item3,
        .item4,
        .item5,
        .item6,
        .item7,
        .item8 {
            background-color: #DCDCDC;
  
            border-radius: 10px;
            padding: 20px 40px;
            margin: 10px;
        }

        .menu-container {
            display: flex;
            width: 55%;
            flex-wrap: wrap;
            height: fit-content;
        }
        .menu-container p {
            display: flex;
            justify-content: center;
        }

        .text-alignment {
            margin-left: 120px;
            margin-top: 150px;
            font-weight: bold;
            margin-right: 50px;
        }
    </style>

</head>

<body>
    <?php
    include('HeaderFooter/header.php');
    ?>
    <div class="about-us-container">
        <div class="about-text">
            <p class="info-text">WHO WE ARE <br>
                <span class="big-text">About us</span>
            </p>
        </div>
        <div class="food-item">
            <img src="images/momo.jpg">
            <div class="alignment">
                <p class="big-text">Best Dishes and Beverages in the <br> college.
                    <br><span class="info-text">We make the Best Food in your College and you can get it fresh<br> and
                        hot
                        within the best budget.
                    </span>
                </p>
            </div>
            <img src="images/sandwich.jpg">
        </div>
        <div class="menu-item">
            <div>
                <p class="big-text text-alignment">We provide best food item <br>in the canteen</p>
            </div>
            <div class="menu-container">


                <div class="item1"><img src="images/momoLogo-removebg-preview.png">
                    <p> Momo</p>
                </div>
                <div class="item2">
                    <img src="images/Screenshot_3-removebg-preview.png">
                    <p> Chowmein </p>
                </div>
                <div class="item3">
                    <img src="images/samoshaLogo.png">
                    <p> Samosha</p>
                </div>
                <div class="item4">
                    <img src="images/Screenshot_5-removebg-preview.png">
                    <p> Kulfi </p>
                </div>

                <div class="item5">
                    <img src="images/coldDrinkLogo-removebg-preview.png">
                    <p> Cold Drink</p>
                </div>
                <div class="item6">
                    <img src="images/sandwichLogo.png">
                    <p> Sandwich</p>
                </div>
                <div class="item7">
                    <img src="images/Screenshot_4-removebg-preview.png">
                    <p> Pakoda</p>
                </div>
                <div class="item8">
                    <img src="images/bugerLogo-removebg-preview.png">
                    <p> Burger</p>
                </div>
            </div>
        </div>
    </div>
    <?php
    include('HeaderFooter/footer.php');
    ?>
</body>

</html>