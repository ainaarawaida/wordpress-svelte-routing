<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://yuran
 * @since      1.0.0
 *
 * @package    Yuran
 * @subpackage Yuran/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Yuran
 * @subpackage Yuran/public
 * @author     yuran <yuran@yuran.com>
 */
class Yuran_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */

	public function yuranremovecss(){
		
			// wp_dequeue_style( 'hello-elementor' );
	}

	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Yuran_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Yuran_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_dequeue_style( 'hello-elementor' );

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/yuran-public.css', array(), $this->version, 'all' );
		$files = glob(YURAN_PATH . 'myapp/dist/assets/*.css');
		
		foreach ($files AS $key => $val){
			wp_enqueue_style( 'svelte_my-app#'.$key , YURAN_URL.'/myapp/dist/assets/' . basename($val) , array(), null, 'all' );
		}
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Yuran_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Yuran_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/yuran-public.js', array( 'jquery' ), $this->version, false );
		$files = glob(YURAN_PATH . 'myapp/dist/assets/*.js');
		$files2 = glob(YURAN_PATH . 'myapp/dist/assets/vite/*.js');
		$files3 = glob(YURAN_PATH . 'myapp/dist/assets/src/*.js');
		$files4 = glob(YURAN_PATH . 'myapp/dist/assets/src/assets/js/*.js');
		$files5 = glob(YURAN_PATH . 'myapp/dist/assets/src/parts/*.js');
		$files5 = glob(YURAN_PATH . 'myapp/dist/assets/src/pages/*.js');
		foreach($files AS $key => $val){
			$allfile[] = ["base" => basename($val) , "path" => "myapp/dist/assets/"] ; 
		}
		foreach($files2 AS $key => $val){
			$allfile[] = ["base" => basename($val) , "path" => "myapp/dist/assets/vite/"] ; 
		}
		foreach($files3 AS $key => $val){
			$allfile[] = ["base" => basename($val) , "path" => "myapp/dist/assets/src/"] ; 
		}
		foreach($files4 AS $key => $val){
			$allfile[] = ["base" => basename($val) , "path" => "myapp/dist/assets/src/assets/js/"] ; 
		}
		foreach($files5 AS $key => $val){
			$allfile[] = ["base" => basename($val) , "path" => "myapp/dist/assets/src/parts/"] ;  
		}
		foreach($files5 AS $key => $val){
			$allfile[] = ["base" => basename($val) , "path" => "myapp/dist/assets/src/pages/"] ;  
		}

		foreach ($allfile AS $key => $val){
			
			wp_enqueue_script( 'svelte_my-app#'.$key , YURAN_URL.'/'.$val['path'] . $val['base'] , array(), null, true );
		}
		wp_localize_script( 'svelte_my-app#'.$key, 'frontend_ajax_object',
			array( 
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'statuslogin' => wp_get_current_user()
			)
		);

	}

	public function add_type_attribute($tag, $handle, $src) {
		// if not your script, do nothing and return original $tag
		if (strpos($handle, 'svelte_my-app') !== false) {
			$tag = '<script type="module" crossorigin src="' . esc_url( $src ) . '"></script>';
			return $tag;
		}
		
		return $tag;
	}

	public function yuran_template_redirect(){
		global $wp ;
		
		// require_once YURAN_PATH . '/public/test.php' ;
		// 		exit();
		
		if(isset($wp->query_vars) && isset($wp->request) && str_contains($wp->request,'my-account') ){
			
			if(wp_get_current_user()->ID !== 0 ){
				
				require_once YURAN_PATH . '/public/yuran.php' ;
				exit();
			}
			

		}

	}

}
