<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$option_price_type =[];
$option_label             = ! empty( $option['label'] ) ? $option['label'] : '';
$option_price_type        = ! empty( $option['price_type'] ) ? $option['price_type'] : 'flat_fee';
$option_price_id =  ! empty( $option['option_price_id'] ) ? $option['option_price_id'] : '';
$option_price             = ! empty( $option['price'] ) ? $option['price'] : '';
$option_default           = isset( $option['default'] ) ? $option['default'] : 0;
?>

<div class="wpc-pro-pao-option-row stm-product">
	<div class="wpc-pro-pao-option-sort-wrap <?php echo ( $pao_type != 'text' ) ? 'show_block' : 'hide_block'; ?>">
		<span class="wpc-pro-pao-option-sort-handle dashicons dashicons-menu"></span>
	</div>

	<div class="wpc-pro-pao-option-label <?php echo ( $pao_type != 'text' ) ? 'show_block' : 'hide_block'; ?>">
		<input type="text" class="wpc-settings-input" name="wpc_pro_pao_option_label[<?php echo $counter; ?>][]" value="<?php echo esc_attr( $option_label ); ?>" placeholder="<?php esc_html_e( 'Option name', 'wpcafe-pro' ); ?>" />
	</div>

	<div class="wpc-pro-pao-option-price-type">
		<?php
			$price_type_arr = [
				'quantity_based' => esc_html__( 'Quantity Based', 'wpcafe-pro' ),
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

	<div class="wpc-pro-pao-option-price">
		<input type="text" name="wpc_pro_pao_option_price[<?php echo esc_attr($counter); ?>][]" class="wpc-settings-input wc_input_price wpc_pro_pao_opt_price"
			value="<?php echo esc_attr( wc_format_localized_price( $option_price ) ); ?>" placeholder="0" />
	</div>

	<div class="wpc-label-item wpc-pro-pao-option-default-wrap <?php echo ( $pao_type != 'text' ) ? 'show_block' : 'hide_block'; ?>">
		<div class="wpc-meta wpc-pro-pao-option-default">
			<input type="radio" class="" id="wpc_pro_pao_option_default_<?php echo esc_attr( $counter ); ?>_<?php echo esc_attr( $option_index ); ?>"  name="wpc_pro_pao_option_default[<?php echo esc_attr( $counter ); ?>][]" value="<?php echo esc_attr( $option_index ); ?>" <?php checked( 1, $option_default ); ?> />
			<label for="wpc_pro_pao_option_default_<?php echo esc_attr( $counter ); ?>_<?php echo esc_attr( $option_index ); ?>"><?php esc_html_e( 'Default ggselected', 'wpcafe-pro' ); ?></label>
		</div>
	</div>

	<div class="wpc-pro-pao-option-price-type">
		<?php
		$product_attrs = [
				'rec_products' => esc_html__( 'Recomended Products', 'wpcafe-pro' ),
		];
		// Get all published products
		$args     = array(
				'post_type'      => 'product',
				'posts_per_page' => - 1,
				'post_status'    => 'publish',
		);
		$products = get_posts( $args );
		?>

		<select name="wpc_pro_pao_option_products[<?php echo esc_attr( $counter ); ?>][]" class="wpc-settings-input wpc-pro-pao-option-price-type" multiple>
			<?php
			foreach ( $product_attrs as $key => $value ) {

				?>
				<option <?php selected( $key == $option_price_id );   ?> value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $value ); ?></option>
				<?php
			}
			foreach ( $products as $product ) {
				$product_id    = $product->ID;
				$product_title = get_the_title( $product_id );
				?>
				<option <?php selected( $product_id == $option_price_id ); ?> value="<?php echo esc_attr( $product_id ); ?>"><?php echo esc_html( $product_title ); ?></option>
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

<style>
	.wp-core-ui .stm-product select[multiple] {
		height: auto !important;
		padding-right: 8px !important;
		background: #fff;
		width: auto !important;
	}
</style>
