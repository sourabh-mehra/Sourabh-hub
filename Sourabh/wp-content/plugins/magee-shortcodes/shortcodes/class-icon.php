<?php
class Magee_Icon {

	public static $args;
    private  $id;

	/**
	 * Initiate the shortcode
	 */
	public function __construct() {

        add_shortcode( 'ms_icon', array( $this, 'render' ) );
	}

	/**
	 * Render the shortcode
	 * @param  array $args     Shortcode paramters
	 * @param  string $content Content between shortcode
	 * @return string          HTML output
	 */
	function render( $args, $content = '') {

		$defaults =	Magee_Core::set_shortcode_defaults(
			array(
				'id' =>'',
				'class' =>'',
				'icon' =>'',
				'color' => '',
				'size' => ''
			), $args
		);
		
		extract( $defaults );
		self::$args = $defaults;
		$html      = '';
		$css_style = '';
		if( $color )
		$css_style .= 'color:'.$color.';';
		if( $size )
		$css_style .= 'font-size:'.$size.';';
		
		if( $icon != '')
		$html = sprintf('<i id="%s" class="%s fa %s" style="%s"></i>',$id,$class,$icon,$css_style);
  	
		return $html;
	}
	
}

new Magee_Icon();