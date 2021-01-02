<?php
/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */

class Law_Firm_Lite_Control_Typography extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'typography';

	/**
	 * Array 
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $l10n = array();

	/**
	 * Set up our control.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @param  string  $id
	 * @param  array   $args
	 * @return void
	 */
	public function __construct( $manager, $id, $args = array() ) {

		// Let the parent class do its thing.
		parent::__construct( $manager, $id, $args );

		// Make sure we have labels.
		$this->l10n = wp_parse_args(
			$this->l10n,
			array(
				'color'       => esc_html__( 'Font Color', 'law-firm-lite' ),
				'family'      => esc_html__( 'Font Family', 'law-firm-lite' ),
				'size'        => esc_html__( 'Font Size',   'law-firm-lite' ),
				'weight'      => esc_html__( 'Font Weight', 'law-firm-lite' ),
				'style'       => esc_html__( 'Font Style',  'law-firm-lite' ),
				'line_height' => esc_html__( 'Line Height', 'law-firm-lite' ),
				'letter_spacing' => esc_html__( 'Letter Spacing', 'law-firm-lite' ),
			)
		);
	}

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'law-firm-lite-ctypo-customize-controls' );
		wp_enqueue_style(  'law-firm-lite-ctypo-customize-controls' );
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		// Loop through each of the settings and set up the data for it.
		foreach ( $this->settings as $setting_key => $setting_id ) {

			$this->json[ $setting_key ] = array(
				'link'  => $this->get_link( $setting_key ),
				'value' => $this->value( $setting_key ),
				'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : ''
			);

			if ( 'family' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_families();

			elseif ( 'weight' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_weight_choices();

			elseif ( 'style' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_style_choices();
		}
	}

	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function content_template() { ?>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<ul>

		<# if ( data.family && data.family.choices ) { #>

			<li class="typography-font-family">

				<# if ( data.family.label ) { #>
					<span class="customize-control-title">{{ data.family.label }}</span>
				<# } #>

				<select {{{ data.family.link }}}>

					<# _.each( data.family.choices, function( label, choice ) { #>
						<option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.weight && data.weight.choices ) { #>

			<li class="typography-font-weight">

				<# if ( data.weight.label ) { #>
					<span class="customize-control-title">{{ data.weight.label }}</span>
				<# } #>

				<select {{{ data.weight.link }}}>

					<# _.each( data.weight.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.weight.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.style && data.style.choices ) { #>

			<li class="typography-font-style">

				<# if ( data.style.label ) { #>
					<span class="customize-control-title">{{ data.style.label }}</span>
				<# } #>

				<select {{{ data.style.link }}}>

					<# _.each( data.style.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.style.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.size ) { #>

			<li class="typography-font-size">

				<# if ( data.size.label ) { #>
					<span class="customize-control-title">{{ data.size.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.size.link }}} value="{{ data.size.value }}" />

			</li>
		<# } #>

		<# if ( data.line_height ) { #>

			<li class="typography-line-height">

				<# if ( data.line_height.label ) { #>
					<span class="customize-control-title">{{ data.line_height.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.line_height.link }}} value="{{ data.line_height.value }}" />

			</li>
		<# } #>

		<# if ( data.letter_spacing ) { #>

			<li class="typography-letter-spacing">

				<# if ( data.letter_spacing.label ) { #>
					<span class="customize-control-title">{{ data.letter_spacing.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.letter_spacing.link }}} value="{{ data.letter_spacing.value }}" />

			</li>
		<# } #>

		</ul>
	<?php }

	/**
	 * Returns the available fonts.  Fonts should have available weights, styles, and subsets.
	 *
	 * @todo Integrate with Google fonts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_fonts() { return array(); }

	/**
	 * Returns the available font families.
	 *
	 * @todo Pull families from `get_fonts()`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	function get_font_families() {

		return array(
			'' => __( 'No Fonts', 'law-firm-lite' ),
        'Abril Fatface' => __( 'Abril Fatface', 'law-firm-lite' ),
        'Acme' => __( 'Acme', 'law-firm-lite' ),
        'Anton' => __( 'Anton', 'law-firm-lite' ),
        'Architects Daughter' => __( 'Architects Daughter', 'law-firm-lite' ),
        'Arimo' => __( 'Arimo', 'law-firm-lite' ),
        'Arsenal' => __( 'Arsenal', 'law-firm-lite' ),
        'Arvo' => __( 'Arvo', 'law-firm-lite' ),
        'Alegreya' => __( 'Alegreya', 'law-firm-lite' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'law-firm-lite' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'law-firm-lite' ),
        'Bangers' => __( 'Bangers', 'law-firm-lite' ),
        'Boogaloo' => __( 'Boogaloo', 'law-firm-lite' ),
        'Bad Script' => __( 'Bad Script', 'law-firm-lite' ),
        'Bitter' => __( 'Bitter', 'law-firm-lite' ),
        'Bree Serif' => __( 'Bree Serif', 'law-firm-lite' ),
        'BenchNine' => __( 'BenchNine', 'law-firm-lite' ),
        'Cabin' => __( 'Cabin', 'law-firm-lite' ),
        'Cardo' => __( 'Cardo', 'law-firm-lite' ),
        'Courgette' => __( 'Courgette', 'law-firm-lite' ),
        'Cherry Swash' => __( 'Cherry Swash', 'law-firm-lite' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'law-firm-lite' ),
        'Crimson Text' => __( 'Crimson Text', 'law-firm-lite' ),
        'Cuprum' => __( 'Cuprum', 'law-firm-lite' ),
        'Cookie' => __( 'Cookie', 'law-firm-lite' ),
        'Chewy' => __( 'Chewy', 'law-firm-lite' ),
        'Days One' => __( 'Days One', 'law-firm-lite' ),
        'Dosis' => __( 'Dosis', 'law-firm-lite' ),
        'Droid Sans' => __( 'Droid Sans', 'law-firm-lite' ),
        'Economica' => __( 'Economica', 'law-firm-lite' ),
        'Fredoka One' => __( 'Fredoka One', 'law-firm-lite' ),
        'Fjalla One' => __( 'Fjalla One', 'law-firm-lite' ),
        'Francois One' => __( 'Francois One', 'law-firm-lite' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'law-firm-lite' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'law-firm-lite' ),
        'Great Vibes' => __( 'Great Vibes', 'law-firm-lite' ),
        'Handlee' => __( 'Handlee', 'law-firm-lite' ),
        'Hammersmith One' => __( 'Hammersmith One', 'law-firm-lite' ),
        'Inconsolata' => __( 'Inconsolata', 'law-firm-lite' ),
        'Indie Flower' => __( 'Indie Flower', 'law-firm-lite' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'law-firm-lite' ),
        'Julius Sans One' => __( 'Julius Sans One', 'law-firm-lite' ),
        'Josefin Slab' => __( 'Josefin Slab', 'law-firm-lite' ),
        'Josefin Sans' => __( 'Josefin Sans', 'law-firm-lite' ),
        'Kanit' => __( 'Kanit', 'law-firm-lite' ),
        'Lobster' => __( 'Lobster', 'law-firm-lite' ),
        'Lato' => __( 'Lato', 'law-firm-lite' ),
        'Lora' => __( 'Lora', 'law-firm-lite' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'law-firm-lite' ),
        'Lobster Two' => __( 'Lobster Two', 'law-firm-lite' ),
        'Merriweather' => __( 'Merriweather', 'law-firm-lite' ),
        'Monda' => __( 'Monda', 'law-firm-lite' ),
        'Montserrat' => __( 'Montserrat', 'law-firm-lite' ),
        'Muli' => __( 'Muli', 'law-firm-lite' ),
        'Marck Script' => __( 'Marck Script', 'law-firm-lite' ),
        'Noto Serif' => __( 'Noto Serif', 'law-firm-lite' ),
        'Open Sans' => __( 'Open Sans', 'law-firm-lite' ),
        'Overpass' => __( 'Overpass', 'law-firm-lite' ),
        'Overpass Mono' => __( 'Overpass Mono', 'law-firm-lite' ),
        'Oxygen' => __( 'Oxygen', 'law-firm-lite' ),
        'Orbitron' => __( 'Orbitron', 'law-firm-lite' ),
        'Patua One' => __( 'Patua One', 'law-firm-lite' ),
        'Pacifico' => __( 'Pacifico', 'law-firm-lite' ),
        'Padauk' => __( 'Padauk', 'law-firm-lite' ),
        'Playball' => __( 'Playball', 'law-firm-lite' ),
        'Playfair Display' => __( 'Playfair Display', 'law-firm-lite' ),
        'PT Sans' => __( 'PT Sans', 'law-firm-lite' ),
        'Philosopher' => __( 'Philosopher', 'law-firm-lite' ),
        'Permanent Marker' => __( 'Permanent Marker', 'law-firm-lite' ),
        'Poiret One' => __( 'Poiret One', 'law-firm-lite' ),
        'Quicksand' => __( 'Quicksand', 'law-firm-lite' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'law-firm-lite' ),
        'Raleway' => __( 'Raleway', 'law-firm-lite' ),
        'Rubik' => __( 'Rubik', 'law-firm-lite' ),
        'Rokkitt' => __( 'Rokkitt', 'law-firm-lite' ),
        'Russo One' => __( 'Russo One', 'law-firm-lite' ),
        'Righteous' => __( 'Righteous', 'law-firm-lite' ),
        'Slabo' => __( 'Slabo', 'law-firm-lite' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'law-firm-lite' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'law-firm-lite'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'law-firm-lite' ),
        'Sacramento' => __( 'Sacramento', 'law-firm-lite' ),
        'Shrikhand' => __( 'Shrikhand', 'law-firm-lite' ),
        'Tangerine' => __( 'Tangerine', 'law-firm-lite' ),
        'Ubuntu' => __( 'Ubuntu', 'law-firm-lite' ),
        'VT323' => __( 'VT323', 'law-firm-lite' ),
        'Varela Round' => __( 'Varela Round', 'law-firm-lite' ),
        'Vampiro One' => __( 'Vampiro One', 'law-firm-lite' ),
        'Vollkorn' => __( 'Vollkorn', 'law-firm-lite' ),
        'Volkhov' => __( 'Volkhov', 'law-firm-lite' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'law-firm-lite' )
		);
	}

	/**
	 * Returns the available font weights.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_weight_choices() {

		return array(
			'' => esc_html__( 'No Fonts weight', 'law-firm-lite' ),
			'100' => esc_html__( 'Thin',       'law-firm-lite' ),
			'300' => esc_html__( 'Light',      'law-firm-lite' ),
			'400' => esc_html__( 'Normal',     'law-firm-lite' ),
			'500' => esc_html__( 'Medium',     'law-firm-lite' ),
			'700' => esc_html__( 'Bold',       'law-firm-lite' ),
			'900' => esc_html__( 'Ultra Bold', 'law-firm-lite' ),
		);
	}

	/**
	 * Returns the available font styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_style_choices() {

		return array(
			'' => esc_html__( 'No Fonts Style', 'law-firm-lite' ),
			'normal'  => esc_html__( 'Normal', 'law-firm-lite' ),
			'italic'  => esc_html__( 'Italic', 'law-firm-lite' ),
			'oblique' => esc_html__( 'Oblique', 'law-firm-lite' )
		);
	}
}
