<?php

class MentoresWidgets
{
		public $widgetsPath;

		public function __construct()
		{
			$this->widgetsPath = get_stylesheet_directory() . '/includes/Mentores/Widgets/';
			$this->includes();

			add_action('widgets_init', array($this, 'register'));
		}

		public function register()
		{

		}

		public function includes()
		{

		}

}
