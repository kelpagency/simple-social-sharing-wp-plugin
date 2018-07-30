<?php
/*
Plugin Name: Simple Social Sharing (Kelp)
Plugin URI: http://kelp.agency/simple-social-sharing
Description: A social sharing plugin that doesn't suck!
Version: 0.1
Author: Kelp Design Agency
Author URI: https://kelp.agency/
License: GPL2
*/

// The widget class
class simple_social_sharing_kelp_widget extends WP_Widget {

	// Main constructor
	public function __construct() {
		parent::__construct(
			'simple_social_sharing_kelp',
			__( 'Simple Social Sharing (Kelp)', 'kelp_agency' ),
			array(
				'customize_selective_refresh' => true,
			)
		);
	}
	// The widget form (for the backend )
	public function form( $instance ) {
		// Set widget defaults
		$defaults = array(
			'design_style' 		=> 'circles',
			'background_color' 	=> '#ff7a59',
			'icon_color' 		=> '#ffffff',
			'layout'			=> 'horizontal',
			'facebook' 			=> '',
			'twitter'   		=> '',
			'email' 			=> '',
			'linkedin' 			=> '',
			'google_plus' 		=> ''
		);
		
		// Parse current settings with defaults
		extract( wp_parse_args( ( array ) $instance, $defaults ) ); ?>

		<?php // Design Style ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'design_style' ); ?>"><?php _e( 'Design Style', 'kelp_agency' ); ?></label>
			<select required name="<?php echo $this->get_field_name( 'design_style' ); ?>" id="<?php echo $this->get_field_id( 'design_style' ); ?>" class="widefat">
			<?php
				$options = array(
					'circles' => __( 'Circles', 'kelp_agency' ),
					'squircles' => __( 'Squircles', 'kelp_agency' ),
					'square' => __( 'Square', 'kelp_agency' ),
					'basic' => __( 'Basic', 'kelp_agency' )
				);
				// Loop through options and add each one to the select dropdown
				foreach ( $options as $key => $name ) {
					echo '<option value="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" '. selected( $select, $key, false ) . '>'. $name . '</option>';
				} ?>
			</select>
		</p>

		<?php // Background Color ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'background_color' ) ); ?>"><?php _e( 'Background Color:', 'kelp_agency' ); ?></label>
			<input required id="<?php echo esc_attr( $this->get_field_id( 'background_color' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'background_color' ) ); ?>" type="color" value="<?php echo esc_attr( $background_color ); ?>" />
		</p>

		<?php // Icon Color ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'icon_color' ) ); ?>"><?php _e( 'Icon Color:', 'kelp_agency' ); ?></label>
			<input required id="<?php echo esc_attr( $this->get_field_id( 'icon_color' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'icon_color' ) ); ?>" type="color" value="<?php echo esc_attr( $icon_color ); ?>" />
		</p>

		<?php // Layout ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'layout' ); ?>"><?php _e( 'Layout', 'kelp_agency' ); ?></label>
			<select required name="<?php echo $this->get_field_name( 'layout' ); ?>" id="<?php echo $this->get_field_id( 'layout' ); ?>" class="widefat">
				<?php
				// Your options array
				$options = array(
					'horizontal' => __( 'Horizontal', 'kelp_agency' ),
					'vertical' => __( 'Vertical', 'kelp_agency' ),
				);
				// Loop through options and add each one to the select dropdown
				foreach ( $options as $key => $name ) {
					echo '<option value="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" '. selected( $select, $key, false ) . '>'. $name . '</option>';
				} ?>
			</select>
		</p>

		<?php // Facebook ?>
		<p>
			<input id="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook' ) ); ?>" type="checkbox" value="1" <?php checked( '1', $facebook ); ?> />
			<label for="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>"><?php _e( 'Facebook', 'text_domain' ); ?></label>
		</p>

		<?php // Twitter ?>
		<p>
			<input id="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter' ) ); ?>" type="checkbox" value="1" <?php checked( '1', $twitter ); ?> />
			<label for="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>"><?php _e( 'Twitter', 'text_domain' ); ?></label>
		</p>

		<?php // Email ?>
		<p>
			<input id="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'email' ) ); ?>" type="checkbox" value="1" <?php checked( '1', $email ); ?> />
			<label for="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>"><?php _e( 'Email', 'text_domain' ); ?></label>
		</p>

		<?php // LinkedIn ?>
		<p>
			<input id="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'linkedin' ) ); ?>" type="checkbox" value="1" <?php checked( '1', $linkedin ); ?> />
			<label for="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>"><?php _e( 'LinkedIn', 'text_domain' ); ?></label>
		</p>

		<?php // Google+ ?>
		<p>
			<input id="<?php echo esc_attr( $this->get_field_id( 'google_plus' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'google_plus' ) ); ?>" type="checkbox" value="1" <?php checked( '1', $google_plus ); ?> />
			<label for="<?php echo esc_attr( $this->get_field_id( 'google_plus' ) ); ?>"><?php _e( 'Google+', 'text_domain' ); ?></label>
		</p>

	<?php }

	// Update widget settings
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['design_style'] 		= isset( $new_instance['design_style'] ) ? wp_strip_all_tags( $new_instance['design_style'] ) : '';
		$instance['background_color']   = isset( $new_instance['background_color'] ) ? wp_strip_all_tags( $new_instance['background_color'] ) : '';
		$instance['icon_color']   		= isset( $new_instance['icon_color'] ) ? wp_strip_all_tags( $new_instance['icon_color'] ) : '';
		$instance['layout'] 			= isset( $new_instance['layout'] ) ? wp_strip_all_tags( $new_instance['layout'] ) : '';
		$instance['facebook'] 			= isset( $new_instance['facebook'] ) ? 1 : false;
		$instance['twitter'] 			= isset( $new_instance['twitter'] ) ? 1 : false;
		$instance['email'] 				= isset( $new_instance['email'] ) ? 1 : false;
		$instance['linkedin'] 			= isset( $new_instance['linkedin'] ) ? 1 : false;
		$instance['google_plus'] 		= isset( $new_instance['google_plus'] ) ? 1 : false;
		return $instance;
	}
	// Display the widget
	public function widget( $args, $instance ) {
		extract( $args );

		// Check the widget options
		$design_style   	= isset( $instance['design_style'] ) ? $instance['design_style'] : '';
		$background_color	= isset( $instance['background_color'] ) ? $instance['background_color'] : '';
		$icon_color			= isset( $instance['icon_color'] ) ? $instance['icon_color'] : '';
		$layout   			= isset( $instance['layout'] ) ? $instance['layout'] : '';
		$facebook 			= ! empty( $instance['facebook'] ) ? $instance['facebook'] : false;
		$twitter 			= ! empty( $instance['twitter'] ) ? $instance['twitter'] : false;
		$email 				= ! empty( $instance['email'] ) ? $instance['email'] : false;
		$linkedin 			= ! empty( $instance['linkedin'] ) ? $instance['linkedin'] : false;
		$google_plus 		= ! empty( $instance['google_plus'] ) ? $instance['google_plus'] : false;

		// page url to share
		global $wp;
		$current_url = home_url( add_query_arg( array(), $wp->request ) );

		// page title to share
		$page_title = get_the_title();

		// WordPress core before_widget hook
		echo $before_widget;

		// Display the widget
		echo '<div class="simple-social-sharing ' . $design_style . ' ' . $layout . '">';

			if ( $facebook ) {
				echo '<a style="background-color: ' . $background_color . '; color: ' . $icon_color . ';" href="https://www.facebook.com/sharer/sharer.php?u=' . $current_url . '" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 264 512" width="16.5" height="32"><title>Share via Facebook</title><path d="M76.7 512V283H0v-91h76.7v-71.7C76.7 42.4 124.3 0 193.8 0c33.3 0 61.9 2.5 70.2 3.6V85h-48.2c-37.8 0-45.1 18-45.1 44.3V192H256l-11.7 91h-73.6v229"/></svg>
					</a>';
			}

			if ( $twitter ) {
				echo '<a style="background-color: ' . $background_color . '; color: ' . $icon_color . ';" href="https://twitter.com/intent/tweet?url=' . $current_url . '&text=' . urlencode($page_title) . '" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="32" height="32"><title>Share via Twitter</title><path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"/></svg>
					</a>';
			}

			if ( $email ) {
				echo '<a style="background-color: ' . $background_color . '; color: ' . $icon_color . ';" href="mailto:?subject=' . urlencode($page_title) . '&body=' . $current_url . '">
				      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="32" height="32"><title>Share via Email</title><path d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm0 48v40.805c-22.422 18.259-58.168 46.651-134.587 106.49-16.841 13.247-50.201 45.072-73.413 44.701-23.208.375-56.579-31.459-73.413-44.701C106.18 199.465 70.425 171.067 48 152.805V112h416zM48 400V214.398c22.914 18.251 55.409 43.862 104.938 82.646 21.857 17.205 60.134 55.186 103.062 54.955 42.717.231 80.509-37.199 103.053-54.947 49.528-38.783 82.032-64.401 104.947-82.653V400H48z"/></svg>
				    </a>';
			}

			if ( $linkedin ) {
				echo '<a style="background-color: ' . $background_color . '; color: ' . $icon_color . ';" href="https://www.linkedin.com/shareArticle?mini=true&url=' . $current_url . '&text=' . urlencode($page_title) . '" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="24" height="32"><title>Share via LinkedIn</title><path d="M100.3 480H7.4V180.9h92.9V480zM53.8 140.1C24.1 140.1 0 115.5 0 85.8 0 56.1 24.1 32 53.8 32c29.7 0 53.8 24.1 53.8 53.8 0 29.7-24.1 54.3-53.8 54.3zM448 480h-92.7V334.4c0-34.7-.7-79.2-48.3-79.2-48.3 0-55.7 37.7-55.7 76.7V480h-92.8V180.9h89.1v40.8h1.3c12.4-23.5 42.7-48.3 87.9-48.3 94 0 111.3 61.9 111.3 142.3V480z"/></svg>
					</a>';
			}

			if ( $google_plus ) {
				echo '<a style="background-color: ' . $background_color . '; color: ' . $icon_color . ';" href="https://plus.google.com/share?url=' . $current_url . '" target="_blank">
				    	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="40" height="32"><title>Share via Google+</title><path d="M386.061 228.496c1.834 9.692 3.143 19.384 3.143 31.956C389.204 370.205 315.599 448 204.8 448c-106.084 0-192-85.915-192-192s85.916-192 192-192c51.864 0 95.083 18.859 128.611 50.292l-52.126 50.03c-14.145-13.621-39.028-29.599-76.485-29.599-65.484 0-118.92 54.221-118.92 121.277 0 67.056 53.436 121.277 118.92 121.277 75.961 0 104.513-54.745 108.965-82.773H204.8v-66.009h181.261zm185.406 6.437V179.2h-56.001v55.733h-55.733v56.001h55.733v55.733h56.001v-55.733H627.2v-56.001h-55.733z"/></svg>
				    </a>';
			}

		echo '</div>';

		// WordPress core after_widget hook
		echo $after_widget;
	}

}

// Register the widget
function register_simple_social_sharing_kelp_widget() {
	register_widget( 'simple_social_sharing_kelp_widget' );
}
add_action( 'widgets_init', 'register_simple_social_sharing_kelp_widget' );

// add css to front-end
function simple_social_sharing_kelp_enqueue_styles() {
    wp_enqueue_style( 'simple_social_sharing_kelp_styles', plugins_url( '/simple-social-sharing-kelp-styles.css', __FILE__ ) );
}
add_action('wp_enqueue_scripts', 'simple_social_sharing_kelp_enqueue_styles');
