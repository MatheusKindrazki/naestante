<?php

class FoundationDrilldownNavMenuWalker extends Walker_Nav_Menu
{

	public function start_lvl(&$output, $depth = 0, $args = array())
	{
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"menu vertical sub-menu\">\n";
	}

	public function end_lvl(&$output, $depth = 0, $args = array())
	{
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
	}

}

function foundation_nav_menu($args = array()) {
	$defaults = array(
		'container' => false,
		'items_wrap' => '<ul id="%1$s" class="vertical %2$s" data-drilldown>%3$s</ul>',
		'walker' => new FoundationDrilldownNavMenuWalker()
	);
	$args = wp_parse_args($args, $defaults);
	wp_nav_menu($args);
}
