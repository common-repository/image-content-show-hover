<?php
/*
Plugin Name: Image Content Show Hover
Plugin URI: https://danielriera.net
Description: Show content at hover image.
Author: Daniel Riera
Version: 1.0.6
Author URI: http://danielriera.net
Text Domain: image-hover-content
*/
function IMGSTYHOV_imgaddStylePlugin() {
	wp_register_style( 'IMGSTYHOV__estilos', plugins_url('css/estilo.min.css', __FILE__ ));
	wp_enqueue_style( 'IMGSTYHOV__estilos' );	
}

function IMGSTYHOV_imgimage($atributosIMG, $contenidoIMGHover) {
	extract(shortcode_atts(array('style' => 'width:auto;','link' => '#','image' => '', 'corners'=>"no", 'text' => ''), $atributosIMG));
		if($link!="#") {
			$irA = 'href="'.$link.'"';	
		}else { $irA = ""; }
		if($corners=="yes") {
			$esquinas_style = "esquinas";	
		}else { $esquinas_style = "";}
		if($link!="#") {
			$linkStart = '<a '.$irA.'>';
			$linkEnd = '</a>';
		}
	$salida = '<div class="marco '.$esquinas_style.'" style="'.$style.'">
			'.$linkStart.'
			<img src="'.$image.'" />
			<div class="textoSecundario">'.$text.'</div>
			<div class="explicacion">
			'.$contenidoIMGHover.'
			</div>
		'.$linkEnd.'
	</div>';
	return $salida;
}
add_shortcode('image_hover', 'IMGSTYHOV_imgimage');
add_action( 'wp_enqueue_scripts','IMGSTYHOV_imgaddStylePlugin');