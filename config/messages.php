<?php  if(isset($result) and $result == 1){ ?>
	<div id="mensaje" class="ok"><p><img src="images/ok.gif" align="absmiddle" /> &nbsp; Datos guardados correctamente</p></div>
<?php  }elseif(isset($result) and $result == 2){ ?>
	<div id="mensaje" class="ok"><p><img src="images/ok.gif" align="absmiddle" /> &nbsp; Datos actualizados correctamente</p></div>
<?php  }elseif(isset($result)){ ?>
	<div id="mensaje" class="error"><p><img src="images/error.gif" align="absmiddle" /> &nbsp; <?php echo $result?></p></div>
<?php  } ?>