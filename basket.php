<?php



if (!isset($_SESSION['cart']) || $_SESSION['cartcounter'] === 0) {
    if ($_GET['action'] === "buy") {

        echo '<div class="col-12 text-center pt-5"> We have received your order! It will be delivered soon. Check out our Featured Collection</div>';
        include 'includes/featured-collection.php';
    } else {
        echo '<div class="col-12 text-center mt-5 pt-2"> ';
        allProductsUrl("Your Baket is emty. Add some products first!");
        echo '</div>';
        include 'includes/featured-collection.php';
    }
} else {


?>
    <div class="container-md">
        <div class="row mt-5 mb-5">
            <div class="col-12">
                <h2 class="text-center mb-5">Basket</h2>

                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th class="d-none d-sm-table-cell" scope="col">Product</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price per 1 pc</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php



                        foreach ($_SESSION['cart'] as $id => $value) {
                            if ($_SESSION['cart'][$id]['qty'] > 0) {
                                $arrProductIds[] = $id;
                            }
                        }



                        $sql = "SELECT * FROM products;";
                        $result = mysqli_query($conn, $sql);
                        $resultCheck = mysqli_num_rows($result);
                        $row_number = 1;
                        if ($resultCheck > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {

                                if (in_array($row['id'], $arrProductIds)) {
                                    $wholeprice += $row['price'] * $_SESSION['cart'][$row['id']]['qty'];

                                    echo '
                         
                              <tr class="align-middle">
                                <th scope="row">' . $row_number . '</th>
                                <td>
                                <a href="?page=product-page&product=' . $row['title'] . '"class="">
                                <img class="small-product-image img-thumbnail" src="' . $row['small_image'] . '">
                                </a>
                                </td>
                                <td class="d-none d-sm-table-cell">                                 
                                <a href="?page=product-page&product=' . $row['title'] . '"class="text-dark text-decoration-none">
                                '
                                        . $row["title"] . '
                                </a>
                                </td>
                                <td><span id="qty' . $row['id'] . '">' .  $_SESSION['cart'][$row['id']]['qty'];
                                    '</span>';


                                    echo '</span>
                                <a onclick="event.preventDefault();increase(' . $row['id'] . ',' . $row['price'] . ')" 
                                class="text-dark text-decoration-none"
                                href="?page=basket&id=' . $row['id'] . '&action=increase"
                                >+
                                </a>
                                <a onclick="event.preventDefault();decrease(' . $row['id'] . ',' . $row['price'] . ')"
                                class="text-dark text-decoration-none"
                                href="?page=basket&id=' . $row['id'] . '&action=decrease"

                                >-
                                </a>
                                </td>
                                <td>'
                                        .  $row['price'] . '
                                </td>
                              
                                <td>
                                <a class="text-dark" id="delete" href="?page=basket&action=delete&id=' . $row['id'] . '"class="">
                                <i class="bi bi-trash"></i>
                                </a>
                                </td>
                              </tr>
                              
                            ';
                                    $row_number++;
                                }
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class=" col-md-12 pt-3 text-center">
                <span class="wholePrice">
                    <noscript>
                        <?php echo 'Whole price: ' . $wholeprice . ' $<br>'; ?>
                    </noscript>

                </span><br>
                <form class="pt-2" action="?page=basket&action=buy" method="post">

                    <input id="buy" type="submit" value="Purchase" class="text-center btn-lg btn btn-success">

                </form>
                <?php


                ?>
            </div>
        </div>

    </div>
    <input type="hidden" id="phpVarEndPrice" value="<?php echo $wholeprice; ?>">

    <div class="modal" id="modal-create-order">

        <div class="modal-wrapper row align-items-center">

            <div class="added-info offset-md-3 col-md-6 col-12 p-5">
                <form id="submit-order">

                    <div class="pb-3">
                        <label for="FormControlInput1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="mb-3">
                        <label for="FormControlTextarea1" class="form-label">Your address</label>
                        <textarea class="form-control" id="FormControlTextarea" rows="3"></textarea>
                        <button type="submit" id="btn-create-order" class="btn-success btn-lg col-12 mt-4">Create an order</button><br />
                    </div>
                </form>

                <div class="buttons d-flex flex-row justify-content-center">
                    <a id="close-modal" class="btn btn-outline-primary">Continue shoping</a>
                </div>

            </div>

        </div>

    </div>


<?php
}

?>
<script src="./js/cartViewer.js"></script>
<script src="./js/basketHandling.js"></script>