<?php include_once  'header.php' ?>
    
    <!-- Основной блок -->
    <div class="main">
    
    <!-- Левый блок -->
    <div class="left">
        
        <!-- Меню -->
        
		<?php include_once  'menu.php' ?>
        
        
        <div class="open">
        	
            {{ mainText }}
        </div>
        
    </div>
        
    <!-- Правый блок -->
    <div class="right">
    	<?php include_once  'bread_crumbs.php' ?>

		<?php include_once  'new-product.php' ?>
        
		<?php include_once  'top-product.php'?>
        
		<?php include_once  'sale-product.php' ?>
        
    </div>
        
    <!-- Нижняя часть главного блока -->
	<?php include_once  'brand.php' ?>
        
	<?php include_once  'instagram.php' ?>
    
     <?php include_once  'network.php' ?>
    
    </div>
    
		<?php include_once  'footer.php' ?>
</body>
    
</html>