<?php include_once  'header.php'?>
    
    <!-- Основной блок -->
    <div class="main">
    
    <!-- Левый блок -->
    <div class="left">
        
        <!-- Меню -->
	<?php include_once  'menu.php' ?>
        
        <div class="open">
            <p>now<br>is<br>open!</p>
        </div>
        
    </div>
        
    <!-- Правый блок -->
    <div class="right">
<?php include_once  'bread_crumbs.php'?>
    
    
 {% for item in content_data %}    
   <div>
    <div class="h_stycky"> 
<h2 class="namecat">{{ item.name }}</h2></div>
  <div class="tovar_category">
  {% for item1 in item.sub_category %} 
    <div class="product_category">
      <div><h2>{{ item1.name }}</h2></div>
      <a  href="{{ domain }}catalog/{{ item.url }}/{{ item1.url }}/"><img src="{{ domain }}{{ item1.foto_category }}" style=""></a> </div>  
  {% endfor %}  
  
</div>
    </div>
 {% endfor %}         
        
        
    <!-- Нижняя часть главного блока -->
	<?php include_once  'brand.php' ?>
        
	<?php include_once  'instagram.php' ?>
    
     <?php include_once  'network.php' ?>
    </div>
    
     
    
    </div>
	<?php include_once  'footer.php' ?>
</body>
    
</html>