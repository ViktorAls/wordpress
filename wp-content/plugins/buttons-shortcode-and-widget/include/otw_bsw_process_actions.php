<?php
/**
 * Process otw cm actions
 *
 */
if( isset( $_POST['otw_bsw_action'] ) ){
	
	require_once( ABSPATH . WPINC . '/pluggable.php' );
	
	switch( $_POST['otw_bsw_action'] ){
		
		case 'otw_bsw_settings_action':
				
				global $wp_cm_tmc_items, $wp_cm_agm_items, $otw_bsw_skins, $wp_cm_cs_items;
				
				$options = array();
				
				if( isset( $_POST['otw_bsw_promotions'] ) && !empty( $_POST['otw_bsw_promotions'] ) ){
					
					global $otw_bsw_factory_object, $otw_bsw_plugin_id;
					
					update_option( $otw_bsw_plugin_id.'_dnms', $_POST['otw_bsw_promotions'] );
					
					if( is_object( $otw_bsw_factory_object ) ){
						$otw_bsw_factory_object->retrive_plungins_data( true );
					}
				}
				
				update_option( 'otw_bsw_plugin_options', $options );
				wp_redirect( admin_url( 'admin.php?page=otw-bsw-settings&message=1' ) );
			break;
	}
}
?>