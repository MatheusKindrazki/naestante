=== Trending/Popular Post Slider and Widget ===
Contributors: wponlinesupport, anoopranawat, pratik-jain
Tags: popular post, popular posts,trending, slick slider for post, trending posts carousel trending post, trending posts, trending posts carousel, popular posts slider, trending posts slider, widget, shortcodes, slider, post slick slider, trending posts widget, popular posts widget, counter, daily popular, page views, popular posts, statistics, top 10, top posts
Requires at least: 3.5
Tested up to: 4.9.8
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A quick, easy way to add Popular/Trending posts slider, grid block and widget.

== Description ==
WP Trending Post Slider and Widget allows you to displays the most popular posts/trending posts on your blog by posts views or posts comments. Display your popular post in a page by shortcode or in a sidebar by widget with desired time range.

= You can display popular/trending posts as =
* Grid Block
* Slider
* Carousel
* Widget

View [DEMO](https://www.wponlinesupport.com/wp-plugin/trending-post-slider-widget/) | [PRO DEMO and Features](https://www.wponlinesupport.com/wp-plugin/trending-post-slider-widget/) for additional information.

Checkout our new plugin - [PowerPack - Need of Every Website](https://wordpress.org/plugins/powerpack-lite/)

Need Featured Post section in your website? Try our plugin [Featured Post Creative](https://wordpress.org/plugins/featured-post-creative/)

**Note:** After inserting shortcode or widget to site, if you are not seeing any post list then kindly visit blog/post section on frontend. It will store the post count on the database** 

WP Trending Post Slider and Widget will list post based on your post views or Comment Count. Once you visit post page then plugin will automatic take that post into list.

= WP Trending Post Slider and Widget plugin contain 3 shortcode and 1 widget =
* Display popular/trending posts in a slider view. 

<code>[wtpsw_popular_post]</code>

* Display popular/trending posts in a Carousel view. 

<code>[wtpsw_carousel]</code> 

* Display popular/trending posts in a Grid Block view. 

<code>[wtpsw_gridbox]</code> 


= Shortcode parameters =

**Use Following parameters with shortcode**

<code>[wtpsw_popular_post]</code>

* **Limit:**
[wtpsw_popular_post limit="10"] (Display no of post in a slider)
* **Post Type:**
[wtpsw_popular_post post_type="post,page"] ( Display post list of your desired post type. )
* **Post List By:**
[wtpsw_popular_post view_by="views"] (Display Post list by Views or Comment count. You can use "views" OR "comment_count")
* **Order:**
[wtpsw_popular_post order="DESC"] (Display post in a ascending or descending way. You can use "ASC" OR "DESC")
* **Post Date:**
[wtpsw_popular_post showdate="true"] (Display post date. You can use "true" OR "false")
* **Author:**
[wtpsw_popular_post showauthor="true"] (Display post author. You can use "true" OR "false")
* **Post Content:**
[wtpsw_popular_post showcontent="true"] (Display post content. You can use "true" OR "false")
* **Post content words limit:**
[wtpsw_popular_post words_limit="title"] (Display number of words in a post content.)
* **Show Comment Count** 
[wtpsw_popular_post show_comment_count="true"] (Display comment count. You can use "true" OR "false")
* **Hide empty comment count**
[wtpsw_popular_post hide_empty_comment_count="true"] (Display comment that having 0 count. You can use "true" OR "false")
* **Slider Dots:**
[wtpsw_popular_post dots="true"] (Display slider dots. You can use "true" OR "false")
* **Slider Arrows:**
[wtpsw_popular_post arrows="true"] (Display slider arrows. You can use "true" OR "false")
* **Slider Speed**
[wtpsw_popular_post speed="300"] (Controls slider speed.)
* **Autoplay:**
[wtpsw_popular_post autoplay="false"]
* **Autoplay Interval:**
[wtpsw_popular_post autoplayinterval="3000"]

**Use Following parameters with shortcode**

<code>[wtpsw_carousel]</code>

* **Limit:**
[wtpsw_carousel limit="10"] (Display no of post in a slider)
* **Post Type:**
[wtpsw_carousel post_type="post,page"] ( Display post list of your desired post type. )
* **Post List By:**
[wtpsw_carousel view_by="views"] (Display Post list by Views or Comment count. You can use "views" OR "comment_count")
* **Order:**
[wtpsw_carousel order="DESC"] (Display post in a ascending or descending way. You can use "ASC" OR "DESC")
* **Post Date:**
[wtpsw_carousel showdate="true"] (Display post date. You can use "true" OR "false")
* **Author:**
[wtpsw_carousel showauthor="true"] (Display post author. You can use "true" OR "false")
* **Post Content:**
[wtpsw_carousel showcontent="true"] (Display post content. You can use "true" OR "false")
* **Post content words limit:**
[wtpsw_carousel words_limit="title"] (Display number of words in a post content.)
* **show_comment_count** 
[wtpsw_carousel show_comment_count="true"] (Display comment count. You can use "true" OR "false")
* **Hide empty comment count**
[wtpsw_carousel hide_empty_comment_count="true"] (Display comment that having 0 count. You can use "true" OR "false")
* ** slides to show at a time:**
[wtpsw_carousel slides_to_show="3"] (You can use 1,2,3,4,5 etc)
* **Slides to scroll at a time:**
[wtpsw_carousel slides_to_scroll="1"] (You can use 1,2,3,4,5 etc)
* **Slider Dots:**
[wtpsw_carousel dots="true"] (Display slider dots. You can use "true" OR "false")
* **Slider Arrows:**
[wtpsw_carousel arrows="true"] (Display slider arrows. You can use "true" OR "false")
* **Slider Speed**
[wtpsw_carousel speed="300"] (Controls slider speed.)
* **Autoplay:**
[wtpsw_carousel autoplay="false"]
* **Autoplay Interval:**
[wtpsw_carousel autoplayinterval="3000"]

**Use Following parameters with shortcode**

<code>[wtpsw_gridbox]</code>

* **Limit:**
[wtpsw_gridbox limit="5"] (Display no of post in a grid)
* **Post Type:**
[wtpsw_gridbox post_type="post,page"] ( Display post list of your desired post type. )
* **Post List By:**
[wtpsw_gridbox view_by="views"] (Display Post list by Views or Comment count. You can use "views" OR "comment_count")
* **Order:**
[wtpsw_gridbox order="DESC"] (Display post in a ascending or descending way. You can use "ASC" OR "DESC")
* **Post Date:**
[wtpsw_gridbox showdate="true"] (Display post date. You can use "true" OR "false")
* **Author:**
[wtpsw_gridbox showauthor="true"] (Display post author. You can use "true" OR "false")
* **Post Content Limit:**
[wtpsw_gridbox words_limit="title"] (Display number of words in a post content.)
* **show_comment_count** 
[wtpsw_gridbox show_comment_count="true"] (Display comment count. You can use "true" OR "false")
* **Hide empty comment count**
[wtpsw_gridbox hide_empty_comment_count="true"] (Display comment that having 0 count. You can use "true" OR "false")


= Here is Template code =
<code> <?php echo do_shortcode('[wtpsw_popular_post]'); ?> </code>
<code> <?php echo do_shortcode('[wtpsw_carousel]'); ?> </code>
<code> <?php echo do_shortcode('[wtpsw_gridbox]'); ?> </code>


= Why Use WP Trending Post Slider and Widget Plugin? =
* WP Trending Post Slider and Widget Plugin is made with WordPress standard.
* This plugin helps you to display popular post, trending post, what's hot on your site in a easy way.
* WP Trending Post Slider and Widget Plugin, when used effectively, is a great tool to attract your blogs visitors!

= PRO Features Include =
> * 20 Predefined stunning and cool designs
> * Trending Post Grid view
> * Trending Post Gridbox view
> * Trending Post Slider view
> * Trending Post Carousel view
> * Trending Post Widget with list view
> * Trending Post Widget with slider view
> * Any post type support
> * Strong Shortcode Parameters
> * Slider RTL support
> * Fully Responsive
> * 100% Multilanguage
>
> View [PRO DEMO and Features](https://www.wponlinesupport.com/wp-plugin/trending-post-slider-widget/) for additional information.
>

== Installation ==

1. Upload the 'WP Trending Post Slider and Widget' Plugin folder to the '/wp-content/plugins/' directory.
2. Activate the "WP Trending Post Slider and Widget" Plugin list plugin through the 'Plugins' menu in WordPress.
3. Add a new page and add this short code 
* Display popular/trending posts in a slider view. 
<code>[wtpsw_popular_post]</code>
* Display popular/trending posts in a Carousel view. 
<code>[wtpsw_carousel]</code> 
* Display popular/trending posts in a Grid Block view. 
<code>[wtpsw_gridbox]</code> 
5. Here is Template code 
<code> <?php echo do_shortcode('[wtpsw_popular_post]'); ?> </code>
<code> <?php echo do_shortcode('[wtpsw_carousel]'); ?> </code>
<code> <?php echo do_shortcode('[wtpsw_gridbox]'); ?> </code>

== Frequently Asked Questions ==

= Will WP Trending Post Slider and Widget work with my theme? =

Yes, WP Trending Post Slider and Widget will work with any theme.

If you find any javascript conflict or slider not working then you can raise a support with plugin.

= Why I can not see any post at front side although I have inserted shortcode or Widget? =

WP Trending Post Slider and Widget will list post based on your post views or Comment Count. Once you visit post page then plugin will automatic take that post into list.

== Screenshots ==

1. Front view with grid box.
2. Slider and carousel
3. Widget.
4. Widget frontend view.
5. Setting page.

== Changelog ==

= 1.2.4 (08, Aug 2018) =
* [*] Fix - Fatal error on plugin activation with Php 5.4

= 1.2.3 (24, Jul 2018) =
* [+] New - Added custom post type support settings. Now trending post will work only for enabled post type.
* [+] New - Added RTL support for slider and carousel.
* [*] Remove - Title attribute from the anchor tag.
* [*] Remove - 'Post Date' settings for plugin setting.
* [*] Fix - Update the algorithm of view post count and make it more accurate.
* [*] Fix - Mobile responsive issue for slider and carousel.
* [*] Fix - Some designing issues.
* [*] Fix - Some warnings with widgets while using with WordPress customizer.
* [*] Tweak - Follow some WordPress Detailed Plugin Guidelines.
* [*] Tweak - Used 'wp_reset_postdata' instead of 'wp_reset_query'.

= 1.2.2 (06/10/2017) =
* [*] Updated slick.min.js to latest version
* [*] Fixed loading of slick.css in some cases.

= 1.2.1 (18/07/2017) =
* Fix box-sizing issue for grid box

= 1.2 (10/21/2016) =
* Added 2 new shorcode 
 <code>[wtpsw_carousel]</code> Display popular/trending posts in a Carousel view.
 <code>[wtpsw_gridbox]</code> Display popular/trending posts in a Grid Block view.
* Added designs for 2 new shortcode.
* Fixed image display issue.

= 1.1 =
* Fixed some css bugs.

= 1.0 =
* Initial release.


== Upgrade Notice ==

= 1.2.3 =
1.2.3 has custom post type support. After plugin update, please enable your relevant post type from plugin settings and pass them properly in shortcode and widget.