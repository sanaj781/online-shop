<div class="container-md mb-5">
    <div class="row">
        <h2 class="text-center mt-5 mb-5">Recently viewed</h2>
        <?php
        foreach (array_reverse($_SESSION['lastproducts'], -6) as $t => $v) {
            $sql = "SELECT * FROM products WHERE title='$t'";

            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            $num_rows = mysqli_num_rows($result);

            //getting products form Mysql database
            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {



                    echo '
<div class="col-lg-2 col-md-3 col-sm-3 col-6">
           <a href="?page=product-page&product=' . $row['title'] . '" class="text-decoration-none text-dark">
            <img src="' . $row['small_image'] . '" class="img-thumbnail"> 
            <p style="color:#016e6e" class="text-center">' . $row['title'] . '</p></a>
             </div>';
                }
            }
        } ?>
    </div>
</div>