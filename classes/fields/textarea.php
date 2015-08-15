<?php 

if ( ! defined( 'ABSPATH' ) ) { exit; }

class wccpf_field_textarea extends wccpf_product_field {
	
	function __construct() {
		$this->name 		= 'textarea';
		$this->label 		= "Text Area";
		$this->required 	= false;
		$this->message	 	= "This field can't be Empty";
		$this->params 		= array(
			'placeholder'	=>	'',
			'default_value'	=>	'',
			'maxlength'		=>	'',
			'rows' 			=> ''
		);
	
		parent::__construct();
	}
	
	function render_admin_field() { ob_start(); ?>
			<tr>
				<td class="summary">
					<label for="post_type"><?php _e( 'Required', 'wc-fields-factory' ); ?></label>
					<p class="description"><?php _e( 'Is this field Mandatory', 'wc-fields-factory' ); ?></p>
				</td>
				<td>
					<div class="wccpf-field-types-meta" data-type="radio" data-param="required">
						<ul class="wccpf-field-layout-horizontal">
							<li><label><input type="radio" name="wccpf-field-type-meta-required" value="yes" /> <?php _e( 'Yes', 'wc-fields-factory' ); ?></label></li>
							<li><label><input type="radio" name="wccpf-field-type-meta-required" value="no" checked/> <?php _e( 'No', 'wc-fields-factory' ); ?></label></li>
						</ul>						
					</div>
				</td>
			</tr>
			
			<tr>
				<td class="summary">
					<label for="post_type"><?php _e( 'Message', 'wc-fields-factory' ); ?></label>
					<p class="description"><?php _e( 'Message to display whenever the validation failed', 'wc-fields-factory' ); ?></p>
				</td>
				<td>
					<div class="wccpf-field-types-meta" data-type="text" data-param="message">
						<input type="text" id="wccpf-field-type-meta-message" value="<?php echo esc_attr( $this->message ); ?>" />						
					</div>
				</td>
			</tr>
			
			<tr>
				<td class="summary">
					<label for="post_type"><?php _e( 'Place Holder', 'wc-fields-factory' ); ?></label>
					<p class="description"><?php _e( 'Place holder text for this Text Box', 'wc-fields-factory' ); ?></p>
				</td>
				<td>
					<div class="wccpf-field-types-meta" data-type="text" data-param="placeholder">
						<input type="text" id="wccpf-field-type-meta-placeholder" value="" />
					</div>
				</td>
			</tr>
			
			<tr>
				<td class="summary">
					<label for="post_type"><?php _e( 'Default Value', 'wc-fields-factory' ); ?></label>
					<p class="description"><?php _e( 'Default value for this Text Box', 'wc-fields-factory' ); ?></p>
				</td>
				<td>
					<div class="wccpf-field-types-meta" data-type="text" data-param="default_value">
						<input type="text" id="wccpf-field-type-meta-default_value" value="" />
					</div>
				</td>
			</tr>
			
			<tr>
				<td class="summary">
					<label for="post_type"><?php _e( 'Maximum characters', 'wc-fields-factory' ); ?></label>
					<p class="description"><?php _e( 'Leave it blank for no limit', 'wc-fields-factory' ); ?></p>
				</td>
				<td>
					<div class="wccpf-field-types-meta" data-type="text" data-param="maxlength">
						<input type="text" id="wccpf-field-type-meta-maxlength" value="" />
					</div>
				</td>
			</tr>	
			
			<tr>
				<td class="summary">
					<label for="post_type"><?php _e( 'Rows', 'wc-fields-factory' ); ?></label>
					<p class="description"><?php _e( 'Set the textarea height', 'wc-fields-factory' ); ?></p>
				</td>
				<td>
					<div class="wccpf-field-types-meta" data-type="text" data-param="rows">
						<input type="text" id="wccpf-field-type-meta-rows" value="4" />
					</div>
				</td>
			</tr>	
					
		<?php	
		return ob_get_clean();
	}
	
	function render_product_field( $field ) { ob_start(); ?>
	
		<?php if( has_action('wccpf/before/field/rendering' ) && has_action('wccpf/after/field/rendering' ) ) : ?>
		
			<?php do_action( 'wccpf/before/field/rendering', $field["name"], $field["label"] ); ?>
			
			<textarea name="<?php echo esc_attr( $field["name"] ); ?>" placeholder="<?php echo esc_attr( $field["placeholder"] ); ?>" rows="<?php echo esc_attr( $field["rows"] ); ?>" maxlength="<?php echo esc_attr( $field["maxlength"] ); ?>"><?php echo esc_html( $field["default_value"] ); ?></textarea>
			
			<?php do_action( 'wccpf/after/field/rendering' ); ?>
		
		<?php else : ?>	
		
		<table class="wccpf_fields_table <?php echo apply_filters( 'wccpf/fields/container/class', '' ); ?>" cellspacing="0">
			<tbody>
				<tr>
					<td class="wccpf_label"><label for="<?php echo esc_attr( $field["name"] ); ?>"><?php echo esc_html( $field["label"] ); ?></label></td>
					<td class="wccpf_value">
						<textarea name="<?php echo esc_attr( $field["name"] ); ?>" placeholder="<?php echo esc_attr( $field["placeholder"] ); ?>" rows="<?php echo esc_attr( $field["rows"] ); ?>" maxlength="<?php echo esc_attr( $field["maxlength"] ); ?>"><?php echo esc_html( $field["default_value"] ); ?></textarea>
					</td>
				</tr>
			</tbody>
		</table>
		
		<?php endif; ?>
		
	<?php return ob_get_clean();
	}
	
	function validate( $val ) {
		return ( isset( $val ) && !empty( $val ) ) ? true : false;
	}
	
}

new wccpf_field_textarea();

?>