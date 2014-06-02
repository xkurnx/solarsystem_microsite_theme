<?php 
/**
 * wrap content to $len length content, and add '...' to end of wrapped conent
 */
function wrap_content($content, $len, $strip_html = false, $sp = '\n\r', $ending = '...') {
	if ($strip_html) {
		$content = strip_tags($content);
	}
	$c_title_wrapped = wordwrap($content, $len, $sp);
	$w_title = explode($sp, $c_title_wrapped);
    if (strlen($content) <= $len) { $ending = ''; }
	return $w_title[0].$ending;
}
/**
 * 
 * get page link
 * @param string $path
 */
function get_page_link_by_path($path) {
    $p = get_page_by_path($path);
    if ($p == NULL) {
        return '#';
    } else {
        return get_page_link($p->ID);
    }
}

// enable theme menu feature
if (function_exists('add_theme_support')) {
    add_theme_support('menus');
}

remove_filter('the_content', 'wpautop');

add_post_type_support( 'page', 'excerpt' );

/**
 * Nav custom walker.
 * Needed to customize the navigation styling
 */
class increment_walker extends Walker_Nav_Menu
{
		
	function start_el(&$output, $item, $depth, $args)
	{
		global $wp_query;
		static $ctr;
				
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		
		$class_names = $value = '';
		
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		
		if ($item->menu_item_parent==0) {
			$ctr++;
		}
		
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="'. esc_attr( $class_names ) . ' nav-'.$ctr.'"';
		
		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
		
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		
		
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;
		
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}
// END of Nav walker

/**
 * Start of Theme Options
 */
function themeoptions_admin_menu() {
    add_theme_page("Theme Options", "Theme Options", 'edit_themes', basename(__FILE__), 'themeoptions_page');
}
add_action('admin_menu', 'themeoptions_admin_menu');

function themeoptions_page()
{
	if ( $_POST['update_themeoptions'] == 'true' ) { themeoptions_update(); }  //check options update
	// here's the main function that will generate our options page
	?>

	<div class="wrap">
		<div id="icon-themes" class="icon32"><br /></div>
		<h2>The Tech Challenge Minisite option</h2>

		<form method="POST" action="" enctype="multipart/form-data">
			<input type="hidden" name="update_themeoptions" value="true" />		
			<?php 
                $link = "";
                $banner = get_option("banner");
                $topLogo = get_option("topLogo");
				$isImageChecked = get_option("useUploadedImage") == "true" ? " CHECKED " : "";
            ?>
            <p>
                <label for="useUploadedImage"><strong>Use Uploaded Image</strong></label><br />
                <input type="checkbox" name="useUploadedImage" value="true" <?php echo $isImageChecked; ?>/>
                <span>P.S.Check it will use or use default one.</span>
            </p>
			<p>
                <label for="banner"><strong>Home Banner</strong></label><br />
                <input type="file" name="banner" />
				<?php if($banner!=null) echo "<img src='".$link.$banner."'></img>"; ?>
            </p>
            <p>
                <label for="topLogo"><strong>Top Logo</strong></label><br />
                <input type="file" name="topLogo" />
				<?php if($topLogo!=null) echo "<img src='".$link.$topLogo."'></img>"; ?>
            </p>
			
			<br />
			<p><input type="submit" name="submit" value="Update Options" class="button button-primary" /></p>
		</form>

	</div>
	<?php
}

// Update options function
function themeoptions_update() {	
    update_option('useUploadedImage', $_POST['useUploadedImage']);
	uploadAndSave('banner', 'banner');
	uploadAndSave('topLogo', 'topLogo');
}
/**
 * function to upload image and save to theme options variable
 */
function uploadAndSave($fileField,$themeVar) {
	$templateDir = wp_upload_dir();
	try {
		$filename = $_FILES["".$fileField]["name"];
		$a = move_uploaded_file( $_FILES["".$fileField]["tmp_name"], $templateDir['path']."\\".$_FILES["".$fileField]["name"]);
		$savedURL = $templateDir['url'].'/'.$_FILES["".$fileField]["name"];
		if( $filename != null )
			update_option(''.$themeVar, $savedURL);
	}
	catch(Exception $e) {
		throw new Exception($e->getMessage());
	}
}
/**
 * add concept costom post type
 */
add_action('init', 'create_post_types');

add_post_type_support('page', 'excerpt');

/**
 * function to create project custom post type and cutomer custom post type
 */
function create_post_types()
{

    // Contest
    register_post_type('contest',
        array(
            'labels' => array(
                'name' => __('Contest'),
                'singular_name' => __('Contest'),
                'add_new' => _x('Add New', 'Contest'),
                'add_new_item' => __('Add New Contest'),
                'edit_item' => __('Edit Contest'),
                'new_item' => __('new Contest'),
                'view_item' => __('View Contest'),
                'search_item' => __('Search Contest'),
                'not_found' => __('No Contest found'),
                'menu_name' => __('Contest')
            ),
            'public' => true,
            'has_archive' => true,
            'taxonomies' => array('post_tag', 'category'),
            'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-field-template', 'page-attributes', 'revision')
        )
    );

    flush_rewrite_rules(false);
}

if ( ! function_exists('tdav_css') ) {
	function tdav_css($wp) {
		$wp .= ',' . get_template_directory_uri() . '/css/style.css';
	return $wp;
	}
}
add_filter( 'mce_css', 'tdav_css' );
	
;?>