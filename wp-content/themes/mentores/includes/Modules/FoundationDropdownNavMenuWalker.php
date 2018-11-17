<?php

class FoundationDropdownNavMenuWalker extends Walker_Nav_Menu
{

	public function start_lvl(&$output, $depth = 0, $args = array())
	{
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"menu sub-menu\">\n";
	}

	public function end_lvl(&$output, $depth = 0, $args = array())
	{
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
	}

}
