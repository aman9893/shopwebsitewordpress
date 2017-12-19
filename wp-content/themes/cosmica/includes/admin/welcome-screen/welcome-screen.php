<?php 
/**
* 
*/
class Cosmica_Welcome_Screen 
{
	
	function __construct()
	{
		add_action( 'admin_menu', array( $this, 'cosmica_register_welcome_menu' ) );
		add_action( 'load-themes.php', array( $this, 'cosmica_activation_admin_notice' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'cosmica_welcome_style_and_scripts' ) );
		
		// /* load welcome screen */
		add_action( 'cosmica_welcome', array( $this, 'cosmica_welcome_getting_started' ), 10 );
		add_action( 'cosmica_welcome', array( $this, 'cosmica_welcome_free_vs_pro' ), 20 );
		add_action( 'cosmica_welcome', array( $this, 'cosmica_welcome_about_cosmica' ), 20 );
	}
	public function cosmica_welcome_style_and_scripts($hook)
	{
		if ( 'appearance_page_cosmica-welcome' != $hook ) {
			return;
		}
		wp_enqueue_script( 'coscmia-admin-panel', get_template_directory_uri() . '/includes/admin/welcome-screen/js/admin-panel.js', array('jquery'), '20160902', true );
		wp_enqueue_style( 'coscmia-admin-panel', get_template_directory_uri() . '/includes/admin/welcome-screen/css/welcome-screen.css');
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css');
	}
	public function cosmica_welcome_page()
	{
		?>
		<div class="wrap">
			<div class="theme-content">
				<ul class="cosmica-nav-tabs" role="tablist">
					<li class="active"><a href="#getting-started"  role="tab" data-toggle="tab"><?php esc_html_e( 'Getting started','cosmica'); ?></a></li>
					<li><a href="#free-vs-pro" role="tab" data-toggle="tab"><?php esc_html_e( 'Free VS PRO','cosmica'); ?></a></li>
					<li><a href="#about-cosmica" role="tab" data-toggle="tab"><?php esc_html_e( 'About Cosmica','cosmica'); ?></a></li>
				</ul>
				<div class="cosmica-tab-content">
					<?php
					/**
					 * @hooked cosmica_welcome_getting_started - 10
					 * @hooked cosmica_welcome_free_pro - 20
					 */
					do_action( 'cosmica_welcome' ); 
					?>
				</div>
			</div>
		</div>
		<?php
	}

	public function cosmica_register_welcome_menu()
	{
		add_theme_page( 'About Cosmica', 'About Cosmica', 'activate_plugins', 'cosmica-welcome', array( $this, 'cosmica_welcome_page' ) );
	}

	public function cosmica_welcome_getting_started()
	{
		require_once get_template_directory() . '/includes/admin/welcome-screen/sections/welcome-getting-started.php';
		
	}
	public function cosmica_welcome_free_vs_pro()
	{
		require_once get_template_directory() . '/includes/admin/welcome-screen/sections/welcome-free-vs-pro.php';
		
	}

	public function cosmica_welcome_about_cosmica()
	{
		require_once get_template_directory() . '/includes/admin/welcome-screen/sections/welcome-about.php';
		
	}

	public function cosmica_activation_admin_notice() {
		global $pagenow;

		if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', array( $this, 'cosmica_welcome_admin_notice' ), 99 );
		}
	}

	public function cosmica_welcome_admin_notice() {
		?>
			<div class="updated notice is-dismissible">
				<p><?php echo sprintf( esc_html__( 'Welcome! Thank you for choosing COSMICA ! To fully take advantage of our theme please make sure you visit our %1$s welcome page %2$s.', 'cosmica' ), '<a href="' . esc_url( admin_url( 'themes.php?page=cosmica-welcome' ) ) . '">', '</a>' ); ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=cosmica-welcome' ) ); ?>" class="button" style="text-decoration: none;"><?php _e( 'Get started with COSMICA', 'cosmica' ); ?></a></p>
			</div>
		<?php
	}

}

new Cosmica_Welcome_Screen();
