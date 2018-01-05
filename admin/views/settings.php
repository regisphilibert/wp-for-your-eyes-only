<div class="wrap">
    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
 
    <form method="post" action="<?php echo esc_html( admin_url( 'admin-post.php' ) ); ?>">
 
        <div id="universal-message-container">
            <h2>Debug Users</h2>
            <div class="options">
                <p>
                    <label>Who are the debug users?</label>
                    <br />
                    <?php 
                        $selected = $this->deserializer->get_value( 'options_js_debug_users' );
                        $selected = !$selected ? [] : $selected;
                    ?>
                    <select multiple name="options_js_debug_users[]">
                        <?php foreach(get_users() as $user): ?>
                    	<option value="<?php echo $user->ID ?>" <?php echo in_array($user->ID, $selected) ? "selected" : ""; ?>><?php echo $user->data->display_name ?></option>
                        <?php endforeach; ?>
                    </select>
                </p>
                <?php
                    wp_nonce_field( 'fyeo-settings-save', 'seri-debug-users' );
                    submit_button();
                ?>
        </div><!-- #universal-message-container -->
    </form>
 
</div><!-- .wrap -->