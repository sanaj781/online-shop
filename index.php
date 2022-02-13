<?php include_once 'includes/header.php'; ?>


<?php if (isset($_GET['page'])) {
  $pageurl = filter_var($_GET['page'], FILTER_SANITIZE_STRING);
  if (!empty($pageurl)) {
    if (is_file($pageurl . '.php')) {
      include($pageurl . '.php');
    } else {
      echo 'Page does not exist';
    }
  }
} else {
  include 'slides.php';
  include 'includes/featured-collection.php';
  include 'contact.php';
}

?>



<?php include 'includes/footer.php'; ?>