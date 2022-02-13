<?php
$_SESSION['time'] = time();
//current page of pagination
$currentpage = $_GET['currentpage']; //getting page nr from url
?>
<div class="container-md text-center pt-4">
    <div class="row">

        <div class="col-6 offset-3 fs-4 pb-3">
            <h2>Our products</h2>
        </div>
        <div class="col-md-6 offset-md-3 col-12 pb-3 d-md-block d-sm-none d-none">
            Items in a row
            <a class="text-dark 
            <?php
            if ($_GET['width'] != 2) {
                echo " text-decoration-none";
            }
            ?>
            " href="?page=all-products&itemsonpage=<?php echo $_GET['itemsonpage'];

                                                    ?>&currentpage=1&width=2">6</a>
            <a class="text-dark
            <?php
            if ($_GET['width'] != 3) {
                echo " text-decoration-none";
            }
            ?>
            " href="?page=all-products&itemsonpage=<?php echo $_GET['itemsonpage']; ?>&currentpage=1&width=3">4</a>
            <a class="text-dark 
            <?php
            if ($_GET['width'] != 4) {
                echo " text-decoration-none";
            }
            ?>
            " href="?page=all-products&itemsonpage=<?php echo $_GET['itemsonpage']; ?>&currentpage=1&width=4">3</a>
            <a class="text-dark 
            <?php
            if ($_GET['width'] != 6) {
                echo " text-decoration-none";
            }
            ?>
            " href="?page=all-products&itemsonpage=<?php echo $_GET['itemsonpage']; ?>&currentpage=1&width=6">2</a>
        </div>

        <div class="row "></div>


        <?php
        $idOfFirstItemOnPage = ($currentpage - 1) * $_GET['itemsonpage'] + 1;
        $idOfLastItemOnPage = $currentpage * $_GET['itemsonpage'];

        $sql = "SELECT * FROM products;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        $num_rows = mysqli_num_rows($result);

        if ($num_rows % $_GET['itemsonpage'] === 0) {
            $pages = $num_rows / $_GET['itemsonpage'];
        } else {
            $pages = intdiv($num_rows, $_GET['itemsonpage']) + 1;
        }

        //getting products form Mysql database
        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['id'] <= $idOfLastItemOnPage && $row['id'] >= $idOfFirstItemOnPage) {
                    echo '<div class="col-6 col-sm-4 col-md-' . $_SESSION['width'] . '">
           <a href="?page=product-page&product=' . $row['title'] . '" class="text-decoration-none">
            <img src="' . $row['small_image'] . '" class="img-thumbnail"> 
            <p style="color:#016e6e">' . $row['title'] . '</p></a>
             </div>';
                }
            }
        }
        ?>
        <div class="row pt-3">
            <div class="col-md-6 offset-md-3 col-12">
                Items on page
                <a class="text-dark <?php if ($_GET['itemsonpage'] != 4) {
                                        echo 'text-decoration-none';
                                    } ?>" href="?page=all-products&itemsonpage=4&currentpage=1&width=<?php echo $_GET['width']; ?>">4</a>
                <a class="text-dark <?php if ($_GET['itemsonpage'] != 8) {
                                        echo 'text-decoration-none';
                                    } ?>" href="?page=all-products&itemsonpage=8&currentpage=1&width=<?php echo $_GET['width']; ?>">8</a>
                <a class="text-dark <?php if ($_GET['itemsonpage'] != 10) {
                                        echo 'text-decoration-none';
                                    } ?>" href="?page=all-products&itemsonpage=10&currentpage=1&width=<?php echo $_GET['width']; ?>">10</a>
                <a class="text-dark <?php if ($_GET['itemsonpage'] != 20) {
                                        echo 'text-decoration-none';
                                    } ?>" href="?page=all-products&itemsonpage=20&currentpage=1&width=<?php echo $_GET['width']; ?>">20</a>
            </div>
        </div>
        <?php include 'includes/pagination.php'; ?>
    </div>
</div>