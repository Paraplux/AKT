<?php include "../controllers/controller-stock.php"; ?>

<?php
if($refData['qty'] == 0) :
?>
<button disabled type="submit" class="add-to-cart">No more</button>
<?php 
else : 
?>
<button type="submit" class="add-to-cart">Add to cart</button>
<?php 
endif;
?>