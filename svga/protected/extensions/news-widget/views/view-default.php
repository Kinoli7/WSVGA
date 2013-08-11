<div id="noticies">
	
	
<?php

$this->widget('bootstrap.widgets.TbListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_new_in_list', 
    'template' => '{items} {pager}'
));
?>
	
</div>
