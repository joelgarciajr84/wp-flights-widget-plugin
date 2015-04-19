<?php

function _isCurl(){
    return function_exists('curl_version');
}
if (_isCurl()) {


add_action('admin_menu', 'wfwp_page');

function wfwp_page() {

    add_menu_page('WP Flights Options', 'WP Flights Options', 'administrator', __FILE__, 'wfwp_content_options_page',plugins_url('/images/icon.png', __FILE__));

    add_action( 'admin_init', 'register_mysettings' );
}


function register_mysettings() {
    register_setting( 'wfwp-group', 'wfwp_key' );
}

function wfwp_content_options_page() {
?>
<div class="wrap">
<h2>WordPress Flights Widget Plugin</h2>

<form method="post" action="options.php">
    <?php settings_fields( 'wfwp-group' ); ?>
    <?php do_settings_sections( 'wfwp-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Google API key</th>
        <td><input type="text" size="50" name="wfwp_key" value="<?php echo esc_attr( get_option('wfwp_key') ); ?>" /></td>
        </tr>

    </table>

    <?php submit_button(); ?>

</form>
</div>
<?php

 }
 }else{

    echo "Curl is not Enable";
 }
?>