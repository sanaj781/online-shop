<div class="container-md text-center mt-3 border-section">
  <div class="row featured-collection">
    <div class="col-md-6 offset-md-3 fs-4 pt-3 pb-3">
      <h2>Featured collection</h2>
    </div>
    <div class="row"></div>

    <?php
    $sql = "SELECT * FROM products;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        if ($row['id'] > 16) {
          echo '<div class="col-md-3 offset-md-0 col-sm-4 offset-sm-1 col-6 pt-1 pb-2">
           <a  href="?page=product-page&product=' . $row['title'] . '" class="text-dark text-decoration-none">
            <img src="' . $row['small_image'] . '" class="img-thumbnail"> 
            <p style="color: #016e6e">' . $row['title'] . '</p></a>
             </div>';
        }
      }
    }
    ?>
  </div>
</div>