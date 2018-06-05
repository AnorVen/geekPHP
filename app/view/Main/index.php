<?php

echo $template->render('variables', 'awfawfawf');



foreach ($photos as $photo): ?>
	<h3><?=$photo['name_file']?></h3>
	<img src="<?='/image/small/' . $photo['hash_file'] ?>" alt="">
<?php endforeach; ?>
