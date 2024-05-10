<?php
$wallstreet_site_layout = get_post_meta( get_the_ID(), 'wallstreet_site_layout', true );
$wallstreet_page_sidebar = get_post_meta( get_the_ID(), 'wallstreet_page_sidebar', true );

	$wallstreet_sidebar_layout_choices = apply_filters(
							'wallstreet_layout_choices',
							array(
								'wallstreet_site_layout_left' => array(
									'label' => '',
									'url'   => WALLSTREET_TEMPLATE_DIR_URI . '/images/left.jpg',
								),
								'wallstreet_site_layout_right' => array(
									'label' => '',
									'url'   => WALLSTREET_TEMPLATE_DIR_URI . '/images/right.jpg',
								),
								'wallstreet_site_layout_without_sidebar' => array(
									'label' => '',
									'url'   => WALLSTREET_TEMPLATE_DIR_URI . '/images/full.jpg',
								),
								'wallstreet_site_layout_stretched' => array(
									'label' => '',
									'url'   => WALLSTREET_TEMPLATE_DIR_URI . '/images/stretched.jpg',
								),
							)
						);

	$wallstreet_sidebar_layout_choices = array(
								'' => array(
									'label' => '',
									'url'   => WALLSTREET_TEMPLATE_DIR_URI . '/functions/meta-boxes/customizer.png',
								),
							) + $wallstreet_sidebar_layout_choices; ?>


<table class="form-table">
	<tbody>
		<tr>
			<th><label for="wallstreet_site_layout"><?php echo esc_html__('Layout','wallstreet'); ?></label></th>
			<td><?php foreach ( $wallstreet_sidebar_layout_choices as $layout_id => $value ) : ?>
			<label class="tg-label">
				<input type="radio" class="wallstreet_site_layout" name="wallstreet_site_layout" value="<?php echo esc_attr( $layout_id ); ?>" <?php checked( $wallstreet_site_layout, $layout_id ); ?> />
				<img src="<?php echo esc_url( $value['url'] ); ?>"/>
			</label>
			<?php endforeach; ?>
			</td>	
		</tr>
		<tr>
			<th><label for="seo_tobots"><?php echo esc_html__('Sidebar','wallstreet'); ?></label></th>
			<td>
				<select id="wallstreet_page_sidebar" name="wallstreet_page_sidebar">
					<option value="sidebar_primary" <?php selected( 'sidebar_primary', $wallstreet_page_sidebar ); ?>><?php echo esc_html__('Primary','wallstreet'); ?></option>
					<option value="footer-widget-area" <?php selected( 'footer-widget-area', $wallstreet_page_sidebar ); ?> ><?php echo esc_html__('Footer sidebar','wallstreet'); ?></option>
					<option value="woocommerce" <?php selected( 'woocommerce', $wallstreet_page_sidebar ); ?> ><?php echo esc_html__('WooCommerce sidebar','wallstreet'); ?></option>
				</select>
			</td>
		</tr>
	</tbody>
</table>
<?php