<?php

class FoundationOffCanvas
{

	public function start()
	{
		echo "<!-- // START FOUNDATION OFF-CANVAS  -->\n<div class=\"off-canvas-wrapper\"><div class=\"off-canvas-wrapper-inner\" data-off-canvas-wrapper>";
	}

	public function startLeft()
	{
		echo "<!-- // START LEFT FOUNDATION OFF-CANVAS  -->\n<div class=\"off-canvas position-left\" id=\"offCanvasLeft\" data-off-canvas data-position=\"left\">";
	}

	public function endLeft()
	{
		echo "</div>\n<!-- // END LEFT FOUNDATION OFF-CANVAS  -->";
	}

	public function startRight()
	{
		echo "<!-- // START RIGHT FOUNDATION OFF-CANVAS  -->\n<div class=\"off-canvas position-right\" id=\"offCanvasRight\" data-off-canvas data-position=\"right\">";
	}

	public function endRight()
	{
		echo "</div>\n<!-- // END RIGHT FOUNDATION OFF-CANVAS  -->";
	}

	public function startContent()
	{
		echo "<!-- // START CONTENT FOUNDATION OFF-CANVAS  -->\n<div class=\"off-canvas-content\" data-off-canvas-content>";
	}

	public function end()
	{
		echo "</div></div></div>\n<!-- // END FOUNDATION OFF-CANVAS  -->";
	}

}

$GLOBALS['offcanvas'] = new FoundationOffCanvas();
function foundation_offcanvas_start() {
	$GLOBALS['offcanvas']->start();
}
function foundation_offcanvas_end() {
	$GLOBALS['offcanvas']->end();
}
function foundation_offcanvas_startcontent() {
	$GLOBALS['offcanvas']->startContent();
}
function foundation_offcanvas_startleft() {
	$GLOBALS['offcanvas']->startLeft();
}
function foundation_offcanvas_endleft() {
	$GLOBALS['offcanvas']->endLeft();
}
function foundation_offcanvas_startright() {
	$GLOBALS['offcanvas']->startRight();
}
function foundation_offcanvas_endright() {
	$GLOBALS['offcanvas']->endRight();
}
