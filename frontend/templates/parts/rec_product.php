<?php

use WpCafe_Pro\Core\Modules\Product_Addons_Advanced\Frontend\Inc\Addon_Helper;

$required   	= ! empty( $addon['required'] ) ? $addon['required'] : '';
$field_name 	= ! empty( $addon['field_name'] ) ? $addon['field_name'] : '';
$place_holder 	= ! empty( $addon['place_holder'] ) ? $addon['place_holder'] : '';
$char_min 		= ! empty( $addon['char_min'] ) ? $addon['char_min'] : 0;
$char_max 		= ! empty( $addon['char_max'] ) ? $addon['char_max'] : 0;

foreach ( $addon['wpc_pro_pao_option_products'] as $product_id ) {
	echo do_shortcode( "[flance_quick_view product_id='$product_id']" );
}
