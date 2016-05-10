<?php


class Magee_Countdowns {

	public static $args;
    private  $id;

	/**
	 * Initiate the shortcode
	 */
	public function __construct() {

        add_shortcode( 'ms_countdowns', array( $this, 'render' ) );
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
				'id' =>'magee-countdowns',
				'class' =>'',
				'topicon' => '',
				'endtime' => date('Y-m-d H:i:s',strtotime(' 1 month')),
			), $args
		);
		
		extract( $defaults );
		self::$args = $defaults;
		$countdownsID = uniqid('countdowns');
		$html = '<div class="magee-countdown-wrap center-block '.esc_attr($class).'" id="'.esc_attr($id).'">
                                        <ul class="magee-countdown row" id="'.$countdownsID.'">
                                            <li class="magee-counter-box col-sm-3">
                                                <div class="counter days">
                                                    <span class="counter-num"></span>
                                                </div>
                                                <h3 class="counter-title">
                                                    '.__('Days','magee-shortcodes' ).'
                                                </h3>
                                            </li>
                                            <li class="magee-counter-box col-sm-3">
                                                <div class="counter hours">
                                                    <span class="counter-num"></span>
                                                </div>
                                                <h3 class="counter-title">
                                                    '.__('Hours','magee-shortcodes' ).'
                                                </h3>
                                            </li>
                                            <li class="magee-counter-box col-sm-3">
                                                <div class="counter minutes">
                                                    <span class="counter-num"></span>
                                                </div>
                                                <h3 class="counter-title">
                                                    '.__('Minutes','magee-shortcodes' ).'
                                                </h3>
                                            </li>
                                            <li class="magee-counter-box col-sm-3">
                                                <div class="counter seconds">
                                                    <span class="counter-num"></span>
                                                </div>
                                                <h3 class="counter-title">
                                                    '.__('Seconds','magee-shortcodes' ).'
                                                </h3>
                                            </li>
                                        </ul>
                                    </div>';
		$html .= '<script language="javascript">';
		$html .= 'jQuery(document).ready(function($){
		        $("#'.$countdownsID.'").countdown("'.$endtime.'", function(event) {
                $("#'.$countdownsID.' .days .counter-num").text(
                    event.strftime("%D")
                );
                $("#'.$countdownsID.' .hours .counter-num").text(
                    event.strftime("%H")
                );
                $("#'.$countdownsID.' .minutes .counter-num").text(
                    event.strftime("%M")
                );
                $("#'.$countdownsID.' .seconds .counter-num").text(
                    event.strftime("%S")
                );
            });
				});';
		$html .= '</script>';
											
		return $html;
	} 
	
}

new Magee_Countdowns();