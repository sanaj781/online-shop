<?php
//creating a session
session_start();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once 'includes/dbh.php';
include_once 'includes/functions.php';
increaseItemQty();
decreaseItemQty();
deleteItemFromCart();

//Calling a function for calling items added by user to cart during a Session
countCartItems();

//deleting items from basket if order was submited
createOrder();


if (isset($_GET['width'])) {
    $_SESSION['width'] = $_GET['width'];
}
if (isset($_GET['itemsonpage'])) {

    $_SESSION['itemsonpage'] = $_GET['itemsonpage'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <script src="./js/jquery-3.6.0.min.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="./images/favicon.ico" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+P+One&display=swap" rel="stylesheet">
    <title>Bootstrap shop</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <?php
    include 'cv.php'; ?>
    <div class="wrapper container-fluid">
        <div class="container-md">
            <div class="row top-nav">
                <nav class="navbar navbar-expand-lg navbar-dark col-4">

                    <button class="navbar-toggler order-first" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <ul class="navbar-nav mb-2 mb-lg-0">
                            <a href="index.php" class="nav-link
                            <?php
                            if (!isset($_GET['page'])) {
                                echo "active";
                            }
                            ?>
                            "> Home</a>
                            <?php allProductsUrl("Products") ?>

                            <a href="?page=contact" class="nav-link <?php
                                                                    if ($_GET['page'] === "contact") {
                                                                        echo "active";
                                                                    }
                                                                    ?>"> Contact</a>

                            <a href="?page=login" class="d-lg-none nav-link <?php
                                                                            if ($_GET['page'] === "login") {
                                                                                echo "active";
                                                                            }
                                                                            ?>">
                                <i class="bi bi-person "></i>

                            </a>
                        </ul>
                </nav>

                <nav class="logo col-4 navbar navbar-expand navbar-dark justify-content-center">

                    <a style="color:white; font-family: 'Mochiy Pop P One', sans-serif;" class="nav-link text-center fs-5" href="index.php">DS</a>
                </nav>

                <nav class="basket-section navbar navbar-expand navbar-dark col-4 ">
                    <ul class="navbar-nav align-items-center ">

                        <a style="display: none;" href="?page=login" class="d-lg-block nav-link person <?php
                                                                                                        if ($_GET['page'] === "login") {
                                                                                                            echo " active";
                                                                                                        }
                                                                                                        ?>">
                            <i class="bi bi-person "></i>

                        </a>
                        <a href="?page=basket" class="nav-link<?php
                                                                if ($_GET['page'] === "basket") {
                                                                    echo " active";
                                                                }
                                                                ?>">
                            <i class="bi bi-basket">
                                <span class="counter">
                                    <noscript><?php echo $_SESSION['cartcounter']; ?></noscript>

                                </span>

                            </i>

                        </a>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <input type="hidden" id="phpVarCartCounter" value="<?php echo $_SESSION['cartcounter']; ?>">

    <script>
        $(document).ready(function() {
            $(".navbar-toggler").click(function() {
                if ($(".basket-section").css("align-items") == "center") {
                    $(".logo").css({
                            "align-items": "flex-end"
                        }

                    );
                    $(".basket-section").css({
                        "align-items": "flex-end"
                    });
                } else {
                    setTimeout(function() {

                        $(".basket-section").css({
                            "align-items": "center"
                        });

                    }, 300)



                }
            });
        });
    </script>