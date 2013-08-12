<form action="<?PHP echo $variables['action']; ?>" method="POST">
	<label for="name">Name</label> <input name="name" <?PHP  echo ($variables['edit'] ? 'value="' . $variables['producer']->name . '"' : ''); ?>  />
	<label for="description">Description</label> <input name="description" <?PHP echo ($variables['edit'] ? 'value="' . $variables['producer']->description . '"' : ''); ?>/>
</form>	
