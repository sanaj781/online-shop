<div class="container-md">
  <?php
  addItemToCart();

  $product = $_GET['product']; //getting product title from url

  $sql = "SELECT * FROM products;";
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);

  if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

      if ($row['title'] === $product) {
        $errormessage = 1;
        $id = $row['id'];
        $img = $row['small_image'];
        $title = $row['title'];
        $price = $row['price'];
        echo '
        <div class="row pt-5 product-section">
       <div class="col-lg-1 col-md-2 col-12 order-md-first text-center d-md-block">
       <img src="' . $row['small_image'] . '" class="img-fluid img-thumbnail small-product-image" />
       <img src="' . $row['small_image'] . '" class="img-fluid img-thumbnail small-product-image" />
       <img src="' . $row['small_image'] . '" class="img-fluid img-thumbnail small-product-image" />
       <img src="' . $row['small_image'] . '" class="img-fluid img-thumbnail small-product-image" />

       </div>
        <div class="col-md-5 col-sm-12 text-center order-first image-container">

        <img src="' . $row['small_image'] . '" class="img-fluid img-thumbnail product-image"/>
        </div>
        <div class=" col-md-4 offset-md-1  text-start">
        <p class="fs-5 pt-3 pt-md-0">' . $row['title'] . '</p>
        <p class="fs-5 "> Price: ' . $row['price'] . '$</p>
    <p class="fs-5 "> Product description:<br></p><p>'
          . $row['description'] .
          '</p>';

        $_SESSION['time'] = time();

        function lastvisited()
        {
          if ($_GET['page'] === "product-page") {
            $lastproducttitle = $_GET['product'];

            $_SESSION['lastproducts'][$lastproducttitle] = array(

              'lastproducttitle' => $lastproducttitle,

            );
            $_SESSION['lastproducts'] = array_slice($_SESSION['lastproducts'], -6);
          }
        }
        lastvisited();

  ?>
        <script src="./js/productpageHandler.js"></script>
        <input type="hidden" id="phpVarRowId" value="<?php echo $id; ?>">
        <input type="hidden" id="phpVarRowTitle" value="<?php echo $title; ?>">
        <input type="hidden" id="phpVarRowPrice" value="<?php echo $price; ?>">

        <form class="pt-4" action="?page=product-page&action=add&id=<?php echo $id ?>&product=<?php echo $title ?>" method="post">


          <input id="qty" type="number" min="1" value="1" name="qty" class="col-2" placeholder="1" />
          <input id="submit" id="addtocart" type="submit" value="Add to Basket" class="btn-success ">

        </form>
        <div class="pt-5 productsanchor">
          <?php allProductsUrl("Check out other products"); ?>
        </div>
        <script>
          $("#qty").focus(function() {
            $("#qty").attr("value", "");
          })
          $("#qty").focusout(function() {
            $("#qty").attr("value", "1");
          })
        </script>
</div>
</div>
</div>
<!-- Modal for item added -->
<div class="modal" id="modal-item-added">

  <div class="modal-wrapper row align-items-center">

    <div class="added-info offset-md-3 col-md-6 col-12 p-5">
      <p>Product added to the basket</p>
      <img src="<?php echo $img ?>" class="img-thumbnail img-added mb-3" />

      <p><?php echo $title ?></p>
      <p id="itemqty"></p>
      <p id="modalprice"><?php echo $price . ' $' ?></p>

      <div class="buttons d-flex flex-row justify-content-between">
        <a id="close-modal" class="btn btn-outline-success">Continue shoping</a>
        <a class="btn  btn-outline-secondary" href="?page=basket">Go to basket</a>
      </div>

    </div>

  </div>

</div>
<!-- Modal for picture view -->
<div class="modal" id="modal-picture-view">
  <div class="row modal-wrapper">
    <div class="col-12 d-flex flex-column align-items-center justify-content-center">
      <div class="close-modal align-self-end me-2">
        <i class="bi bi-x-circle"></i>
      </div>
      <div class="d-flex flex-row align-items-center">
        <div class="d-md-block d-none previous-modal me-5">

          <i class="bi bi-arrow-left"></i>

        </div>
        <img src="<?php echo $img ?>" alt="" class="pb-2 fs-modal-image img-fluid">

        <div class="d-md-block d-none next-modal ms-5">
          <i class="bi bi-arrow-right"></i>
        </div>
      </div>
    </div>
  </div>
</div>


<?php
      }
    }
    if (!isset($errormessage)) {
      echo 'Ooops, Wrong item id';
    }
  }
  if (isset($_SESSION['lastproducts'])) {
    include 'includes/lastvisited.php';
  }

?>