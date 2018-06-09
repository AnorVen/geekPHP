<?php include_once  'header.php' ?>
    
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
 
 	<a href="{{ domain }}galery/galery/">Фотогаллерея классическая</a> <br>
    <a href="{{ domain }}galery/galery_ajax/">Фотогаллерея AJAX</a>       
        
    <!-- Нижняя часть главного блока -->
	<?php include_once  'brand.php' ?>
        
	<?php include_once  'instagram.php' ?>
    
     <?php include_once  'network.php' ?>
    </div>
    
     
    
    </div>
	<?php include_once  'footer.php' ?>
</body>
    
</html>