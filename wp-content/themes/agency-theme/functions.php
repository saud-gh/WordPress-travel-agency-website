
<?php 
	function bootstrap_files(){
		wp_enqueue_style('bootstrap-css','//stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css');
		wp_enqueue_script('bootstrap-js','//code.jquery.com/jquery-3.3.1.slim.min.js', array( 'jquery' ), true);
		wp_enqueue_style('font_awsome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
	}

	function custom_styles(){
		wp_enqueue_style( 'main-style', get_template_directory_uri() . '/style.css', false, '1.0', 'all' );
		//wp_enqueue_style('header-style',get_template_directory_uri().'/css/header_style.css',array(),null,'all');
		wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Montserrat');
	}

	function agency_adjust_queries($query){
		if (!is_admin() AND is_post_type_archive('package') AND $query->is_main_query()) {
			$query->set('orderby', 'title');
			$query->set('order', 'ASC');
			$query->set('posts_per_page', -1);
		}
	}

	add_action('wp_enqueue_scripts', 'bootstrap_files');
	add_action('wp_enqueue_scripts', 'custom_styles');
	add_action('pre_get_posts', 'agency_adjust_queries');
?>
