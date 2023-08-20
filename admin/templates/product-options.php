<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$option_label             = ! empty( $option['label'] ) ? $option['label'] : '';
$option_price_type        = ! empty( $option['price_type'] ) ? $option['price_type'] : 'flat_fee';
$option_price             = ! empty( $option['price'] ) ? $option['price'] : '';
$option_default           = isset( $option['default'] ) ? $option['default'] : 0;
?>

<div class="wpc-pro-pao-option-row">

	<div class="wpc-pro-pao-option-price-type">
		<?php
			$price_type_arr = [
				'products_ids' => esc_html__( 'Products', 'wpcafe-pro' ),
			];
		?>
		<select name="wpc_pro_pao_option_price_type[<?php echo esc_attr($counter); ?>][]" class="wpc-settings-input wpc-pro-pao-option-price-type">
			<?php
			foreach ( $price_type_arr as $key => $value ) {
			?>
			<option <?php selected( $key, $option_price_type ); ?> value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $value ); ?></option>
			<?php
			}
			?>
		</select>
	</div>




<?php if( intval( $option_index ) !== 0 ): ?>
	<button type="button" class="wpc-pro-pao-option-remove button" style="display: <?php echo ( $pao_type != 'text' ) ? 'block' : 'none'; ?>;">
		<i class="dashicons dashicons-no-alt"></i>
	</button>
<?php endif; ?>


</div>
