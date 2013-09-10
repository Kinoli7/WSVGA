<div class="row-fluid blog-page">    
	
	
<?php

$this->widget('bootstrap.widgets.TbListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_new_in_list', 
    'template' => '{items} {pager}',
    'pagerCssClass' => 'pagination pagination-centered'
));
?>
	
</div>
