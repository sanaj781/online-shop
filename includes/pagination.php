     <!-- Pagination section -->
     <div class="row justify-content-center">
         <div class="col-auto pt-5">
             <nav aria-label="Products pagination">
                 <ul class="pagination ">

                     <?php 
    if($_SESSION['itemsonpage']>=20){
        
    }
    else{
        if($currentpage>$pages||$currentpage<=0)
{
    echo 'Ooops wrong page number';
}
       else{
        //Previous page button adding bootstrap class disabled when on the first page
    echo '<li class="page-item ';
    if($currentpage<2)
    {
        echo 'disabled"><a class="page-link">';
    }  
   else{
       //changing page nr on press Previous
    echo '"><a class="page-link" href="?page=all-products&itemsonpage='.$_SESSION['itemsonpage'].'&currentpage=' .($currentpage-1) .'&width='.$_SESSION['width'].'">';
   }?>Previous</a></li>

                     <?php
    //Creating pagination buttons 1,2,3.. and adding bootstrap class active
    for($i=1;$i<=$pages;$i++){
        echo '<li class="page-item';
        if ($currentpage==$i){
            echo ' active';
        }
        echo '"><a class="page-link" href="?page=all-products&itemsonpage='.$_SESSION['itemsonpage'].'&currentpage=' .$i .'&width='.$_SESSION['width'].'">' .$i. '</a></li>';
    }
    //Next page button adding bootstrap class disabled when on the last page
    echo '<li class="page-item';
    if($currentpage==$pages){
        echo ' disabled"><a class="page-link">';
    }
    else{
        echo '"><a class="page-link" href="?page=all-products&itemsonpage='.$_SESSION['itemsonpage'].'&currentpage=' .($currentpage+1) . '&width='.$_SESSION['width'].'">';

    }

    ?>
                     Next</a>

                     </li>
                 </ul>
             </nav>
             <?php 
} }?>
         </div>

     </div>