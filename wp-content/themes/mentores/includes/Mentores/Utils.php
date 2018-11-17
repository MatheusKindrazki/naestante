<?php

class MentoresUtils
{

    public function __construct()
    {
        add_filter("body_class", 										array('MentoresUtils', 'addCategoryToSingle'), null, 2);
        add_filter("body_class", 										array('MentoresUtils', 'addHasThumbnailToSingle'), null, 2);
		add_filter("upload_mimes",										array('MentoresUtils', 'cc_mime_types'));

		add_action('wp_loaded', 										array('MentoresUtils', 'allAuthorsFromPostType'));
		add_action('login_footer', 										array('MentoresUtils', 'customWpAdminLoginPage'));
		
	}


	// WP-Login Footer
	public static function customWpAdminLoginPage() {
	?>
		<div class="developed-mentores">
			<p>Desenvolvido por <a href="http://mentores.com.br/">Mentores Digital ♥</a></p>
		</div>
		<style>
			.login h1 a {
				background-image: url('<?php echo get_field('logotipo', 'options')['sizes']['large']; ?>');
			}
		</style>
	<?php }

	// Allow SVG Upload
	function cc_mime_types($mimes) {
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}

	public static function allAuthorsFromPostType()
	{
		$authors = array();
		$args = array(
			'post_type'	=> 'flowtv',
			'posts_per_page'	=> -1
		);
		$flowTvAuthors = new WP_Query($args);

		while($flowTvAuthors->have_posts()): $flowTvAuthors->the_post();
			$authors[$flowTvAuthors->post->post_author] = get_the_author();
		endwhile;

		return $authors;
	}

    public static function addCategoryToSingle($classes, $class)
    {
    	if (is_single()) {
    		global $post;
    		foreach ((get_the_category($post->ID)) as $category) {
                $classes[] = $category->slug;
    			$classes[] = 'term-'.$category->taxonomy.'-'.$category->slug;
                if (!in_array('taxonomy-'.$category->taxonomy, $classes)) {
    			    $classes[] = 'taxonomy-'.$category->taxonomy;
                }
    		}
    	}
    	return $classes;
    }

    public static function addHasThumbnailToSingle($classes, $class)
    {
    	if (is_single()) {
    		global $post;
    		if (has_post_thumbnail($post->ID)) {
                $classes[] = 'has-thumbnail';
    		} else {
                $classes[] = 'has-not-thumbnail';
            }
    	}
    	return $classes;
    }



}

