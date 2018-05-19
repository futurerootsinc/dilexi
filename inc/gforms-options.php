<?php


add_action( 'add_meta_boxes', 'appointment_form_register_meta_box' );

function appointment_form_register_meta_box() {
    add_meta_box( 'appointment-form-id', __( 'Appointment Form ID', 'textdomain' ), 'appointment_form_display_callback', 'page', 'side' );
}


function appointment_form_display_callback( $post ){


  wp_nonce_field( basename( __FILE__ ), 'appointment_form_nonce' );

  ?>
  <p>
    <label for="appointment-form-id"><?php _e( "Enter the id of the gravity form you want to use for appointment scheduling.", 'example' ); ?></label>
    <br />
    <input class="widefat" type="number" name="appointment-form-id" id="appointment-form-id" value="<?php echo esc_attr( get_post_meta( $post->ID, 'appointment_form_id', true ) ); ?>" size="30" />
  </p><?php

}

function appointment_form_save_meta_box( $post_id, $post ) {
    // Save logic goes here. Don't forget to include nonce checks!
    if ( !isset( $_POST['appointment_form_nonce'] ) || !wp_verify_nonce( $_POST['appointment_form_nonce'], basename( __FILE__ ) ) )
      return $post_id;


      $new_meta_value = ( isset( $_POST['appointment-form-id'] ) ? sanitize_html_class( $_POST['appointment-form-id'] ) : '' );

      $meta_key = 'appointment_form_id';

      /* Get the meta value of the custom field key. */
      $meta_value = get_post_meta( $post_id, $meta_key, true );

      /* If a new meta value was added and there was no previous value, add it. */
      if ( $new_meta_value && '' == $meta_value )
        add_post_meta( $post_id, $meta_key, $new_meta_value, true );

      /* If the new meta value does not match the old value, update it. */
      elseif ( $new_meta_value && $new_meta_value != $meta_value )
        update_post_meta( $post_id, $meta_key, $new_meta_value );

      /* If there is no new meta value but an old value exists, delete it. */
      elseif ( '' == $new_meta_value && $meta_value )
        delete_post_meta( $post_id, $meta_key, $meta_value );

}
add_action( 'save_post', 'appointment_form_save_meta_box' );


 ?>
