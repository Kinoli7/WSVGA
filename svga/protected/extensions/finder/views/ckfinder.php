<script type="text/javascript" src="<?php echo $path."/ckfinder.js"; ?>"></script>
<script type="text/javascript">

	function BrowseServer()
	{
		// You can use the "CKFinder" class to render CKFinder in a page:
		var finder = new CKFinder();
		finder.popup();
	}

	// This is a sample function which is called when a file is selected in CKFinder.
	function SetFileField( fileUrl )
	{
		document.getElementById( '<?php echo 'x'.$fieldName; ?>' ).value = fileUrl;
	}
</script>

		<input id="<?php echo 'x'.$fieldName; ?>" name="<?php echo $fieldName; ?>" type="text" size="60" />
		<input type="button" value="Select" onclick="BrowseServer();" />