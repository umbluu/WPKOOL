<?php
/*  
 * 2J Gallery			http://2joomla.net/wordpress-plugins/2j-gallery
 * Version:           	2.2.6 - 57233
 * Author:            	2J Team (c)
 * Author URI:        	http://2joomla.net
 * License:           	GPL-2.0+
 * License URI:       	http://www.gnu.org/licenses/gpl-2.0.txt
 * Date:              	Thu, 26 Oct 2017 17:09:25 GMT
 */

class twoJGalleryRegistrator{

	public function __construct(){
		/*add_action('init', array($this, 'init'));*/
		add_action('get_footer', array($this, 'initFooter'));
	}

	public function initFooter(){
		$this->enqueueScripts();
		$this->enqueueStyle();
	}


	public function initBase(){
		add_action('wp_enqueue_scripts', array($this, 'enqueueScripts'));
		add_action('wp_enqueue_scripts', array($this, 'enqueueStyle'));
	}

	public function enqueueStyle(){

		wp_enqueue_style( 
			twoJGallery::POST_TYPE . '-grid-css', 
			TWOJ_GALLERY_URI . 'vendor/GAMMAGRID/css/styles.css',
			array(), 
			TWOJ_GALLERY_VERSION,
			'all' 
		);

		wp_enqueue_style( 
			twoJGallery::POST_TYPE . '-lightbox-css', 
			TWOJ_GALLERY_URI . 'vendor/lightboxtwo/css/lightboxtwo.css',
			array(), 
			TWOJ_GALLERY_VERSION,
			'all' 
		);

		wp_enqueue_style( 
			twoJGallery::POST_TYPE . '-style-css', 
			TWOJ_GALLERY_URI . 'assets/css/2jgallery.css',
			array(), 
			TWOJ_GALLERY_VERSION,
			'all' 
		);

	}

	

	public function enqueueScripts(){
		wp_enqueue_script('jquery');

		wp_enqueue_script(
			twoJGallery::POST_TYPE . '-grid-js',
			TWOJ_GALLERY_URI . 'vendor/GAMMAGRID/gammaGrid.js',
			array('jquery'),
			TWOJ_GALLERY_VERSION,
			true
		);

		wp_enqueue_script(
			twoJGallery::POST_TYPE . '-lightbox-js',
			TWOJ_GALLERY_URI . 'vendor/lightboxtwo/lightboxtwo.js',
			array('jquery'),
			TWOJ_GALLERY_VERSION,
			true
		);

		wp_enqueue_script(
			twoJGallery::POST_TYPE . '-js',
			TWOJ_GALLERY_URI . 'assets/js/2jgallery.js',
			array('jquery'),
			TWOJ_GALLERY_VERSION,
			true
		);

		wp_localize_script(
			twoJGallery::POST_TYPE . '-js',
			'twoJGalleryJSConst',
			array(
				'moduleUri' => TWOJ_GALLERY_URI,
				'ajaxUrl' 	=> admin_url('admin-ajax.php'),
				'typePost' 	=> twoJGallery::POST_TYPE,
			)
		);
	}
}
