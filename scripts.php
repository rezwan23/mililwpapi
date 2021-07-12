<?php 


add_action('wp_footer', 'my_custom_footer_js');

function my_custom_footer_js()
{
        echo '<script src="' . get_template_directory_uri() . '/milil/assets/js/custom-vue-production.min.js"></script>';
        echo '<script src="' . get_template_directory_uri() . '/milil/assets/js/custom-axios.min.js"></script>';
        echo '<script src="' . get_template_directory_uri() . '/milil/assets/js/custom-sweetalert.min.js"></script>';
        echo '<script src="' . get_template_directory_uri() . '/milil/assets/js/custom-moment.min.js"></script>';
        echo '<script src="' . get_template_directory_uri() . '/milil/assets/js/jquery.min.js"></script>';
        echo '<script src="' . get_template_directory_uri() . '/milil/assets/js/printthis.min.js"></script>';
        echo '<script src="' . get_template_directory_uri() . '/milil/assets/js/statement-custom.js"></script>';
}