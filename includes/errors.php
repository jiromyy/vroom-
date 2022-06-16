<?php  if (count($errors) > 0) : ?>
 <div class="alert alert-danger"><b>
  	<?php foreach ($errors as $error) : ?>
  	  <p style="color: red"><?php echo $error ?></p>
	  <?php endforeach ?>
 </b> </div>
<?php  elseif (count($popup) > 0) : ?>
 <div class="alert alert-success"><b>
  	<?php foreach ($popup as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </b></div>
<?php  endif ?>