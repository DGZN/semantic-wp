<?php
/*==========================
 BREADCRUMBS PART
===========================*/
function wp_custom_breadcrumbs() {

	$showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
	$delimiter = '<span class="divider"></span>'; // delimiter between crumbs
	$home = 'Home'; // text for the 'Home' link
	$showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
	$before = '<li property="itemListElement" typeof="ListItem" class="active"><span property="name" class="current">'; // tag before the current crumb
	$schema_itemListElement = 'property="itemListElement" typeof="ListItem" ';
	$schema_item = 'property="item" typeof="WebPage"';

	global $post;
	$homeLink = esc_url( home_url() );

	if (is_home() || is_front_page()) {

		if ($showOnHome == 1) echo '<ul vocab="http://schema.org/" typeof="BreadcrumbList" class="breadcrumb"><li property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" href="' . $homeLink . '"><span property="name">'.$home.'</span></a><meta property="position" content="1"></li></ul>';
	
	} 
	
	else {
	 
		echo '<ul vocab="http://schema.org/" typeof="BreadcrumbList" class="breadcrumb">';
			echo '<li property="itemListElement" typeof="ListItem">';
				echo '<a '.$schema_item.' href="' . $homeLink . '">'. content_tag($home, "1") .' ' . $delimiter;
			echo '</li> ';
	 	
		if ( is_category() ) {
			$thisCat = get_category(get_query_var('cat'), false);
		   		if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
		    		echo $before . '' . single_cat_title('', false) . '' . after_tag();
	 
		} 
		 
		elseif ( is_search() ) {
			echo $before . 'Search results for "' . get_search_query() . '"' . after_tag();
		} 
		 
		elseif ( is_day() ) {
			echo '<li '.$schema_itemListElement.'><a '.$schema_item.' href="' . get_year_link(get_the_time('Y')) . '">' . content_tag(get_the_time('Y')) . ' ' . $delimiter . '</li> ';
			echo '<li '.$schema_itemListElement.'><a '.$schema_item.' href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . content_tag(get_the_time('F'), "3") . ' ' . $delimiter . '</li> ';
			echo $before . get_the_time('d') . after_tag("4");
		}
		 
		elseif ( is_month() ) {
			echo '<li '.$schema_itemListElement.'><a '.$schema_item.' href="' . get_year_link(get_the_time('Y')) . '">' . content_tag(get_the_time('Y')) . ' ' . $delimiter . '</li> ';
			echo $before . get_the_time('F') . after_tag("3");
		}
		 
		elseif ( is_year() ) {
			echo $before . get_the_time('Y') . after_tag();
		}
		 
		elseif ( is_single() && !is_attachment() ) {
			if ( get_post_type() != 'post' ) {
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				echo '<li '.$schema_itemListElement.'><a '.$schema_item.' href="' . $homeLink . '/' . $slug['slug'] . '/">' . content_tag($post_type->labels->singular_name);
				
				if ($showCurrent == 1) echo ' ' . $delimiter . '</li> ' . $before . get_the_title() . after_tag("3");
			}
		  
			else {
				$cat = get_the_category(); 
				$cat = $cat[0];
				$cat_link = get_category_link($cat->cat_ID);
				$cats = "<li $schema_itemListElement><a $schema_item href='" . $cat_link . "'><span property=\"name\">" . get_category_parents($cat, false , '</span></a><meta property="position" content="2"> ' . $delimiter . '</li> ');
		   
		   		if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
		    		echo $cats;
		   		if ($showCurrent == 1) echo $before . get_the_title() . after_tag("3");
			}
		}
		 
		elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			$post_type = get_post_type_object(get_post_type());
		  	echo $before . $post_type->labels->singular_name . after_tag(); 
		}
		 
		elseif ( is_attachment() ) {

			$parent = get_post($post->post_parent);
			$cat = get_the_category($parent->ID); 
			
			if(is_single()):
				$cat = $cat[0];			
				echo '<li '.$schema_itemListElement.'>' . get_category_parents($cat, TRUE, ' ' . $delimiter . '</li> ');
			endif;
			
		  	echo '<li '.$schema_itemListElement.'><a '.$schema_item.' href="' . get_permalink($parent) . '">' . content_tag($parent->post_title);
		  	
		  	if ($showCurrent == 1) echo ' ' . $delimiter . '</li> ' . $before . get_the_title() . after_tag("4");
		
		}
		 
		elseif ( is_page() && !$post->post_parent ) {
		  	if ($showCurrent == 1) echo $before . get_the_title() . after_tag();
		}
		 
		elseif ( is_page() && $post->post_parent ) {
		  	$parent_id = $post->post_parent;
		  	$breadcrumbs = array();
		   	$ctr = 2;
		   	while ($parent_id) {
		    	$page = get_page($parent_id);
		    	$breadcrumbs[] = '<li '.$schema_itemListElement.'><a '.$schema_item.' href="' . get_permalink($page->ID) . '">' . content_tag(get_the_title($page->ID, $ctr));
		    	$parent_id = $page->post_parent;
				$ctr++;
			}
		   
		  	$breadcrumbs = array_reverse($breadcrumbs);
		  
		   	for ($i = 0; $i < count($breadcrumbs); $i++) {
		    	echo $breadcrumbs[$i];
		    
		    	if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . '</li> ';
		   	}
		   	
		   	if ($showCurrent == 1) echo ' ' . $delimiter . '</li> ' . $before . get_the_title() . after_tag($ctr+1);
		}
		 
		elseif ( is_tag() ) {
		  	echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . after_tag();
		}
		 
		elseif ( is_author() ) {
		  	global $author;
		  	$userdata = get_userdata($author);
		  	echo $before . 'Articles posted by ' . $userdata->display_name . after_tag();
		}
		 
		elseif ( is_404() ) {
		  	echo $before . 'Error 404' . after_tag();
		}
		 
			if ( get_query_var('paged') ) {
		  		if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ){
				
					echo $before . __('Page', 'medical-rehab') . ' (' . get_query_var('paged');
				
				}
				
		  		if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
		 	}
		 
		echo '</ul>';
	
	}

} // end wp_custom_breadcrumbs()

function content_tag($title, $position = "2"){
	$content = '<span property="name">'.$title.'</span></a><meta property="position" content="'.$position.'">'; 
	return $content;
}


function after_tag($meta_content = "2"){
	$after = '</span><meta property="position" content="'.$meta_content.'"></li>'; // tag after the current crumb
	return $after;	
}
