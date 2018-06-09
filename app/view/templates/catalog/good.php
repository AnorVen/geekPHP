<?php include_once  'header.php';  ?>
    
    <!-- Основной блок -->
    <div class="main">
    
    <!-- Левый блок -->
    <div class="left">
        
        <!-- Меню -->
	<?php include_once  'menu_base.php' ?>
        
        <div class="open">
            <p>now<br>is<br>open!</p>
        </div>
        
    </div>
        
    <!-- Правый блок -->
    <div class="right">
        <?php include_once  'bread_crumbs.php' ?>
        
        <?php include_once  'catalog/product_info.php' ?>

     
     
        <?php include_once  'top-product.php'?>
        
		<?php include_once  'new-product.php' ?>
        
        <?php include_once  'network.php' ?>

        </div>
    </div>
    
     
    
    </div>

	<?php include_once  'footer.php' ?>

</body>
    
</html>