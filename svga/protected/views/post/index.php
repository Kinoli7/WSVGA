<?php
/* @var $this PostController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Home',
);

$this->menu=array(
	array('label'=>'Crear Post', 'url'=>array('create')),
	array('label'=>'Gestionar Post', 'url'=>array('admin')),
);
?>

<div class="container"><h1>Bienvenido a la página web de SVGA</h1></div>
<!-- 	<h2>Noticias</h2> -->

<!-- MINIATURAS IMAGEN PARA NOTICIAS -->
<h2>Destacados</h2>
<div class="featured-covers">
					
	<div class="featured-covers-inner" class="clearfix">												
								
		<article id="post-55507" class="post-55507 post type-post status-publish format-standard hentry category-news tag-cardo tag-lola-monroe tag-taylor-gang tag-wiz-khalifa  cover-left" role="article">
			
				<a href="http://localhost/svga/index.php/post/view?id=4" rel="bookmark" title="Sorteig entrada Telecogresca 2013"><img class="nailthumb-container" src="http://localhost/svga/images/winner.jpg" alt="post thumbnail"></a>
											
			<header class="shadow ">
				
				<p class="meta"><a href="http://localhost/svga/index.php/post/view?id=4" title="Sorteig entrada Telecogresca 2013" rel="category tag">News</a> - <time datetime="2013-09-18" pubdate="">18/09/13</time></p>
				
				<h1 class="h2"><a href="http://localhost/svga/index.php/post/view?id=4" rel="bookmark" title="Sorteig entrada Telecogresca 2013">Sorteig entrada Telecogresca 2013</a></h1>

			</header> <!-- end article header -->

		</article> <!-- end article -->
		
													
								
		<article id="post-55482" class="post-55482 post type-post status-publish format-standard hentry category-news tag-dre-films tag-fabolous tag-gunplay tag-omarion tag-pusha-t tag-rick-ross tag-topshelf-junior tag-yo-gotti" role="article">
			
				<a href="http://localhost/svga/index.php/post/view?id=5" rel="bookmark" title="Ganadores del Primer Torneo de LOL"><img src="http://localhost/svga/images/lolwin.jpg" alt="post thumbnail"></a>
											
			<header class="shadow ">
				
				<p class="meta"><a href="http://localhost/svga/index.php/post/view?id=5" title="Ganadores del Primer Torneo de LOL" rel="category tag">News</a> - <time datetime="2013-09-17" pubdate="">17/09/13</time></p>
				
				<h1 class="h2"><a href="http://localhost/svga/index.php/post/view?id=5" rel="bookmark" title="Ganadores del Primer Torneo de LOL">Ganadores del Primer Torneo de LOL</a></h1>

			</header> <!-- end article header -->

		</article> <!-- end article -->
		
													
								
		<article id="post-55396" class="post-55396 post type-post status-publish format-standard hentry category-news tag-meek-mill  cover-right" role="article">
			
				<a href="http://localhost/svga/index.php/post/view?id=6" rel="bookmark" title="SVGA prepara nuevos torneos para el siguiente cuadrimestre"><img src="http://localhost/svga/images/torneos.jpg" alt="post thumbnail"></a>
											
			<header class="shadow ">
				
				<p class="meta"><a href="http://localhost/svga/index.php/post/view?id=6" title="SVGA prepara nuevos torneos para el siguiente cuadrimestre" rel="category tag">News</a> - <time datetime="2013-09-12" pubdate="">12/09/13</time></p>
				
				<h1 class="h2"><a href="http://localhost/svga/index.php/post/view?id=6" rel="bookmark" title="SVGA prepara nuevos torneos para el siguiente cuadrimestre">SVGA prepara nuevos torneos para el siguiente cuadrimestre</a></h1>

			</header> <!-- end article header -->

		</article> <!-- end article -->											
										
	</div> <!-- end featured-covers-inner -->
						
</div>				
<!-- ACABA MINIATURAS IMAGEN PARA NOTICIAS -->
<br />
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'sortableAttributes'=>array(
          'title',
          'create_time'=>'Fecha',
      ),
)); ?>






