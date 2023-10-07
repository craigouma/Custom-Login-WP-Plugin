<?php

/*
Plugin Name: Login Page
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: A brief description of the Plugin.
Version: 1.0
Author: CRAIG
Author URI: http://URI_Of_The_Plugin_Author
License: A "Slug" license name e.g. GPL2
*/

// Enqueue custom styles for the login page
function custom_login_enqueue_styles() {
    wp_enqueue_style('custom-login-styles', plugin_dir_url(__FILE__) . 'css/custom-login-styles.css');
}
add_action('login_enqueue_scripts', 'custom_login_enqueue_styles');

// Customize the login page with your HTML and branding
function custom_login_page() {
    ?>
    <style>
        /* Custom CSS for login page */
        .custom-login-form {
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .custom-login-form h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .custom-login-form p {
            font-size: 16px;
            margin-bottom: 20px;
        }

        .custom-login-form label {
            display: block;
            font-weight: bold;
        }

        .custom-login-form input[type="text"],
        .custom-login-form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .custom-login-form input[type="submit"] {
            background-color: #0073e6;
            color: #fff;
            font-weight: bold;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .custom-login-form input[type="submit"]:hover {
            background-color: #004b98;
        }
    </style>
    <div class="custom-login-form">
        <h2>Welcome to Our Site</h2>
        <p>Please log in to access your account.</p>
        <form method="post" action="<?php echo esc_url(wp_login_url()); ?>">
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
    <?php
}
add_action('login_form', 'custom_login_page');
