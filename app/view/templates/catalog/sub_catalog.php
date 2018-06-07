<?php include_once  'header.php' ?>
    
    <!-- Основной блок -->
    <div class="main">
    
    <!-- Левый блок -->
    <div class="left">
        
        <!-- Меню -->
	<?php include_once  'menu.php'?>

        
        <div class="open">
<p>now<br>is<br>open!</p>

        </div>
        
    </div>
        
    <!-- Правый блок -->
    <div class="right">
<?php include_once  'bread_crumbs.php' ?>

<div class="tovar_catalog">
  <div class="namecat">
    <h2 class="namecat">{{ content_data.name }}</h2>
  </div>
		<?php include_once  'catalog/product_catalog.php' ?>



</div>


        
    </div>
        
    <!-- Нижняя часть главного блока -->
	<?php include_once  'brand.php' ?>
        
	<?php include_once  'instagram.php' ?>
    
     <?php include_once  'network.php' ?>
    
    </div>

	<?php include_once  'footer.php' ?>

</body>
    
</html>