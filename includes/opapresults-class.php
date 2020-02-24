<?php 

/**
 * Adds Opap_Results widget.
 */
class Opap_Results_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'opapresults_widget', // Base ID
			esc_html__( 'Opap Results', 'opapresults_domain' ), // Name
			array( 'description' => esc_html__( 'Widget to display latest Opap Number Games results', 'opapresults_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget']; //Anything to display before widget
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }

		//Widget Content Output
  		if ($instance['tzoker']){
			?>
			<div class="game">
			<div class="tzoker">
				<div class="tzoker-logo"><img src="<?php echo plugin_dir_url( __FILE__ ) . 'img/tzoker-logo.png';?>"></div>
				<div class="tzoker-results"></div>
			</div></div> 
		<?php
		}
		if ($instance['lotto']){
			?>
			<div class="game"><div class="lotto">
				<div class="lotto-logo"><img src="<?php echo plugin_dir_url( __FILE__ ) . 'img/lotto-logo.jpg';?>" ></div>
				<div class="lotto-results"></div>
			</div></div>
		<?php
		}

		if ($instance['proto']){
			?>
			<div class="game"><div class="proto">
				<div class="proto-logo"><img src="<?php echo plugin_dir_url( __FILE__ ) . 'img/proto-logo.jpg';?>" ></div>
				<div class="proto-results"></div>
			</div></div>
		<?php
		} 

		echo $args['after_widget']; //Anything to display after the widget
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'opapresults_domain' );
		$game = ! empty( $instance['game'] ) ? $instance['game'] : esc_html__( 'Default', 'opapresults_domain' );
		$tzoker = ! empty( $instance['tzoker'] ) ? $instance['tzoker'] : esc_html__( 'Default', 'opapresults_domain' );
		$lotto = ! empty( $instance['lotto'] ) ? $instance['lotto'] : esc_html__( 'Default', 'opapresults_domain' );
		$proto = ! empty( $instance['proto'] ) ? $instance['proto'] : esc_html__( 'Default', 'opapresults_domain' );
		?>

        <!--TITLE-->
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
            <?php esc_attr_e( 'Τίτλος (προαιρετικό)', 'opapresults_domain' ); ?></label> 
		<input class="widefat" 
                id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" 
                name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" 
                type="text" 
                value="<?php echo esc_attr( $title ); ?>">
		</p>

        <!-- GAME -->
        <p>	<label for="<?php echo esc_attr( $this->get_field_id( 'game' ) ); ?>">
            	<?php esc_attr_e( 'Επιλογή Παιχνιδιού:', 'opapresults_domain' ); ?>
			</label> 

			<br>
  			<input class="widefat" 
                id="<?php echo $instance['tzoker'];?>"  type="checkbox" name="<?php echo esc_attr( $this->get_field_name( 'tzoker' ) ); ?>" value="tzoker"<?php echo ($tzoker == 'tzoker') ? ' checked' : ''; ?>> ΤΖΟΚΕΡ<br>
  			<input class="widefat" 
				id="<?php echo $instance['lotto'];?>"  type="checkbox" name="<?php echo esc_attr( $this->get_field_name( 'lotto' ) ); ?>" value="lotto"<?php echo ($lotto == 'lotto') ? ' checked' : ''; ?>> ΛΟΤΤΟ<br>
			<input class="widefat" 
                id="<?php echo $instance['proto'];?>"  type="checkbox" name="<?php echo esc_attr( $this->get_field_name( 'proto' ) ); ?>" value="proto"<?php echo ($proto == 'proto') ? ' checked' : ''; ?>> ΠΡΟΤΟ<br>
		</p>
	<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['game'] = ( ! empty( $new_instance['game'] ) ) ? sanitize_text_field( $new_instance['game'] ) : '';
		$instance['tzoker'] = ( ! empty( $new_instance['tzoker'] ) ) ? sanitize_text_field( $new_instance['tzoker'] ) : '';
		$instance['lotto'] = ( ! empty( $new_instance['lotto'] ) ) ? sanitize_text_field( $new_instance['lotto'] ) : '';
		$instance['proto'] = ( ! empty( $new_instance['proto'] ) ) ? sanitize_text_field( $new_instance['proto'] ) : '';

		return $instance;
	}

} // class Opap_Results_Widget