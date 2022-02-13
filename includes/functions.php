<?php

//Destroying a current Session after 5 minutes if a user is inactive 
function destroyCurrentSession()
{
  if (time() - $_SESSION['time'] > 5 * 60) {
    session_destroy();
  }
}
//view og product list dependent on choosed parameteres
function allProductsUrl($atitle)
{
  echo '<a href="?page=all-products&itemsonpage=';

  if (isset($_SESSION['itemsonpage'])) {
    echo $_SESSION['itemsonpage'];
  } else {
    echo '4';
  }
  echo '&currentpage=1&width=';
  if (isset($_SESSION['width'])) {
    echo $_SESSION['width'];
  } else {
    echo '3';
  }
  echo '" class="nav-link';
  if ($_GET['page'] === "all-products" || $_GET['page'] === "product-page") {
    echo " active";
  }


  echo '">' . $atitle . '
  </a>';
}
//Counting items added to cart during curent Session
function countCartItems()
{
  $_SESSION['cartcounter'] = 0;
  if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $k => $v) {
      $_SESSION['cartcounter'] += +$v['qty'];
    }
  }
  if (isset($_POST['qty'])) {
    $_SESSION['cartcounter'] += $_POST['qty'];
  }
}


// Adding an item to a cart on submiting a from
function addItemToCart()
{
  if ($_GET['action'] === "add") {
    $qty = $_POST['qty'];
    $id = $_GET['id'];
    if (isset($_SESSION['cart'][$id])) {
      $_SESSION['cart'][$id]['qty'] += $qty;
    } else {
      $_SESSION['cart'][$id] = array(

        'id' => $id,
        'qty' => $qty
      );
    }
  }
}

//Deleting an item from a cart
function deleteItemFromCart()
{
  if ($_GET['action'] === "delete") {
    $_SESSION['cart'][$_GET['id']]['qty'] = 0;
  }
}

function increaseItemQty()
{
  if ($_GET['action'] === "increase") {
    $_SESSION['cart'][$_GET['id']]['qty'] += 1;
  }
}

function decreaseItemQty()
{
  if ($_GET['action'] === "decrease" && $_SESSION['cart'][$_GET['id']]['qty'] != 0) {
    $_SESSION['cart'][$_GET['id']]['qty'] -= 1;
  }
}

function createOrder()
{
  if ($_GET['action'] === "buy") {

    foreach ($_SESSION['cart'] as $id => $value) {
      $_SESSION['cart'][$id]['qty'] = 0;
      $_SESSION['cartcounter'] = 0;
    }
  }
}
