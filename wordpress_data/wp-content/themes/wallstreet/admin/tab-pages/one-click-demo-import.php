<?php

$wallstreet_one_click_actions = $this->recommended_actions;
$wallstreet_one_click_actions_todo = get_option( 'recommended_actions', false );?>
<div id="wall_one_click_demo_import" class="wallstreet-tab-pane panel-close">  
	<div class="action-list row">
		<?php 
		if($wallstreet_one_click_actions): 
			foreach ($wallstreet_one_click_actions as $key => $wallstreet_action_value): 
				if($wallstreet_action_value['id']=='install_one-click-demo-import'):?>
					<div class="action col-md-12 col-sm-12 col-xs-12" id="<?php echo esc_attr($wallstreet_action_value['id']); ?>">
						<div class="recommended_box">
							<div class="seprate-plugin-box">
								<img width="772" height="180" src="<?php echo esc_url(WALLSTREET_TEMPLATE_DIR_URI.'/images/one-click-demo-import.png');?>">
								<div class="action-inner">
									<h3 class="action-title"><?php echo esc_html($wallstreet_action_value['title']); ?></h3>
									<div class="action-desc"><?php echo wp_kses_post($wallstreet_action_value['desc']); ?></div>
									<?php echo $wallstreet_action_value['link']; ?>
									<div class="action-watch">
										<?php if(!$wallstreet_action_value['is_done']): ?>
											<?php if(!isset($wallstreet_one_click_actions_todo[$wallstreet_action_value['id']]) || !$wallstreet_one_click_actions_todo[$wallstreet_action_value['id']]): ?>
												<span class="dashicons dashicons-visibility"></span>
											<?php else: ?>
												<span class="dashicons dashicons-hidden"></span>
											<?php endif; ?>
										<?php else: ?>
											<span class="dashicons dashicons-yes"></span>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="action col-md-12 col-sm-12 col-xs-12">
						<p style="padding-left: 10px; font-weight: 500; font-size: 18px;">
						<?php esc_html_e( 'Note: After plugin activation Go to Appearance >> Starter Sites menu then import the Elementor demo content.', 'wallstreet' ); ?>
						</p>
					</div>
				<?php endif;
			endforeach; 
		endif; ?>
	</div>
</div>