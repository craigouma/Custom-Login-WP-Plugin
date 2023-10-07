<?php
/**
 * Custom Login Page Template
 *
 * This template file is used to customize the HTML structure of the WordPress login page.
 *
 * @package Custom Login Page
 */

// Enqueue custom styles for the login page
wp_enqueue_style('custom-login-styles', plugin_dir_url(__FILE__) . 'css/custom-login-styles.css');

// Get the login page URL
$login_page_url = wp_login_url();

// Output the HTML structure for the custom login page
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Your Site Name</title>
    <link rel="stylesheet" href="<?php echo esc_url(plugin_dir_url(__FILE__) . 'css/custom-login-styles.css'); ?>">
</head>
<body class="custom-login-page">
<div class="custom-login-form">
    <h2>Welcome to Your Site</h2>
    <p>Please log in to access your account.</p>
    <form method="post" action="<?php echo esc_url($login_page_url); ?>">
        <label for="user_login">Username</label>
        <input type="text" name="log" id="user_login" class="input" value="" required />

        <label for="user_pass">Password</label>
        <input type="password" name="pwd" id="user_pass" class="input" value="" required />

        <?php do_action('login_form'); ?>
        <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="Log In" />

        <div id="nav" class="text-center">
            <a href="<?php echo esc_url(wp_lostpassword_url()); ?>">Lost your password?</a> |
            <a href="<?php echo esc_url(home_url()); ?>">Back to site</a>
        </div>
    </form>
</div>
</body>
</html>
