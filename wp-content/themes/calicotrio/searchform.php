<?php 
	$taxonomies = array('categorias');
	$args = array(
	    'orderby'		=> 'name', 
	    'order'			=> 'ASC',
	    'hide_empty'	=> false
	);

$terms = get_terms($taxonomies, $args);
$i = 0;
$categories = $_GET['terms'];
?>

<form role="search" method="post" id="filter-portfolio" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<?php foreach($terms as $term): ?>
		<label><input
		<?php if($categories): ?>
			<?php foreach($categories as $category): ?>
				<?php if( $category == $term->slug ): ?>checked="checked" <?php endif; ?>
			<?php endforeach; ?>
		<?php endif; ?>
		type="checkbox" name="terms[]" value="<?php echo $term->slug; ?>"> <?php echo $term->name; ?></label>
	<?php $i++; endforeach; ?>
</form>
