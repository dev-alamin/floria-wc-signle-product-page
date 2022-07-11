<?php
/**
 * thrive-theme functions and definitions
 *
 * @link    https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package thrive-theme
 */

require_once plugin_dir_path( __FILE__ ) . 'inc/constants.php';

if ( thrive_theme_builder_requirements() ) {
	require_once THEME_PATH . '/inc/classes/class-thrive-theme.php';

	thrive_theme();
} else {
	require_once THEME_PATH . '/inc/classes/class-thrive-noop.php';
}


/**
 * Thrive Theme Builder requirements
 *
 * @return bool
 */
function thrive_theme_builder_requirements() {
	$ok         = true;
	$error_code = '';

	if ( PHP_VERSION_ID < 50600 ) {
		$ok         = false;
		$error_code = 'php_version';
	} elseif ( ! version_compare( get_bloginfo( 'version' ), REQUIRED_WP_VERSION, '>=' ) ) {
		$ok         = false;
		$error_code = 'wp_version';
	} elseif ( defined( 'TVE_VERSION' ) && TVE_VERSION !== '0.dev' && version_compare( TVE_VERSION, ARCHITECT_LAUNCH_VERSION, '<' ) ) {
		$ok         = false;
		$error_code = 'architect_version';
	}

	if ( ! $ok ) {
		$error_message = thrive_get_error_message( $error_code );
		thrive_admin_notice( $error_message );

		/* switch back to the old theme if the requirements are not ok */
		add_action( 'after_switch_theme', static function () use ( $error_code, $error_message ) {
			thrive_switch_back();
			/**
			 * Hooked in TPM, this will display the user-friendly message during the TTB install process
			 *
			 * @aram WP_Error $error the detailed error message
			 */
			do_action( 'ttb_activation_error', new WP_Error(
				$error_code,
				$error_message
			) );
		} );
	}

	return $ok;
}

/**
 *
 * Get a detailed, user-friendly error message describing a TTB imcompatibility.
 *
 * @param string $error_code
 *
 * @return string|void
 */
function thrive_get_error_message( $error_code ) {

	switch ( $error_code ) {
		/**
		 * Warning when the site doesn't have the at least PHP 5.6
		 */
		case 'php_version':
			$message = __( 'Thrive Theme Builder requires PHP version 5.6+ in order to work.', 'thrive-theme' );
			break;
		/**
		 * Warning when the site has an older version of Wordpress
		 */
		case 'wp_version':
			$message = __( 'Thrive Theme Builder requires WordPress version ' . REQUIRED_WP_VERSION . ' in order to work. Please update your Wordpress version.', 'thrive-theme' );
			break;
		/**
		 * Warning about an old version of TAr
		 */
		case 'architect_version':
			$update_url = admin_url( 'plugins.php' );
			$message    = sprintf( __( 'Thrive Theme Builder requires a newer version of Thrive Architect in order to work. Please make sure all your Thrive Plugins are %supdated to their latest versions%s.', 'thrive-theme' ), '<a href="' . $update_url . '">', '</a>' );
			break;
		default:
			$message = '';
			break;
	}

	return $message;
}

if ( ! function_exists( 'thrive_admin_notice' ) ) {

	/**
	 * Output a global error notice in the admin panel
	 *
	 * @param string $message
	 * @param string [$state] error, notice, warning, info etc
	 */
	function thrive_admin_notice( $message, $state = 'error' ) {
		add_action( 'admin_notices', static function () use ( $message, $state ) {
			$css_class = "notice notice-{$state} {$state}";

			echo sprintf( '<div class="%s"><p>%s</p></div>', $css_class, $message );
		} );
	}
}
/**
 * Switch back to the previous theme if the requirements are not met
 */
function thrive_switch_back() {
	switch_theme( get_option( 'theme_switched' ) );
	unset( $_REQUEST['activated'], $_GET['activated'] );
	add_action( 'admin_notices', static function () {
		$message = __( 'Due to some incompatibilities with your current WordPress install, Thrive Theme Builder could not be activated. Please solve the issues described above and try again.', 'thrive-theme' );
		thrive_admin_notice( $message, 'warning' );
	} );
}

/**
 * Safe-way html class helper function. If requirements are not met, `Thrive_Theme` is not available.
 */
function thrive_html_class() {
	if ( class_exists( 'Thrive_Theme', false ) ) {
		Thrive_Theme::html_class();
	}
}

/**
 * Print AMP permalink
 */
function thrive_amp_permalink() {
	if ( class_exists( 'Thrive\Theme\AMP\Main', false ) ) {
		Thrive\Theme\AMP\Main::print_amp_permalink();
	}
}

/**
 * Return the thrive theme instance
 *
 * @return Thrive_Theme
 */
function thrive_theme() {
	global $thrive_theme;

	if ( empty( $thrive_theme ) ) {
		$thrive_theme = new Thrive_Theme();
	}

	return $thrive_theme;
}


// Require credcrumb for WC

/**
 * Theme's Bredcrumb
 */
require get_template_directory() . '/inc/bredcrumb.php';


// Metabox for WC product meta

use Carbon_Fields\Container\Container;
use Carbon_Fields\Field\Field;


function fca_add_post_meta_product_post_type(){
Container::make( 'post_meta', 'Course Details' )
		->where( 'post_type', '=', 'product' )
		->add_fields( array(
			Field::make( 'text', 'fca_instructor_name', __( 'Instructor Name' ) ),
			Field::make( 'text', 'fca_course_label', __( 'Course Label' ) ),
			Field::make( 'text', 'fca_course_categories', __( 'Categories' ) ),
			Field::make( 'text', 'fca_course_duration', __( 'Duration' ) ),
			Field::make( 'text', 'fca_course_tot_enrolled', __( 'Total Enrolled' ) ),
			Field::make( 'rich_text', 'fca_course_about', __( 'About Course' ) ),

		));

		// Second block
		Container::make( 'post_meta', 'Description' )
		->where( 'post_type', '=', 'product' )
		->add_fields( array(
			Field::make( 'text', 'fca_course_desc_heading', __( 'Write Heading' ) )->set_default_value( 'Description' ),
			Field::make( 'rich_text', 'fca_course_description', __( 'Write Course Description' ) )
		));

		// Third block
		Container::make('post_meta', __('What will I learn'))
		->set_context('normal')
		->where('post_type', '=', 'product')
		->add_fields(array(
			Field::make( 'text', 'fca_course_learn_point_heading', __( 'Write Heading For Learnig Points' ) )->set_default_value( 'What Will I Learn' ),
			Field::make('complex', 'fca_course_what_will_i_learn', __('Write some points what the students is going to learn'))
				->set_layout('tabbed-horizontal')
				->add_fields(array(
					Field::make('text', 'fca_what_learn', 'Text'),
				)),
		));

		// Fourth block
		Container::make('post_meta', __('Course Topics'))
		->set_context('normal')
		->where('post_type', '=', 'product')
		->add_fields(array(
			Field::make( 'text', 'fca_course_topic_heading', __( 'Write Heading For Course Topic' ) )->set_default_value( 'Topic For This Course' ),
			Field::make('complex', 'fca_course_topic_repeater', __('Course Topic'))
				->set_layout('tabbed-horizontal')
				->add_fields(array(
					Field::make('text', 'fca_course_topic', 'Single Topic Heading'),
					Field::make('text', 'fca_course_topic', 'Topic Text'),
					Field::make('file', 'fca_course_file', 'Video'),
					Field::make('text', 'fca_course_link', 'Link'),
				)),
		));


		// Fifth Block
		Container::make( 'post_meta', 'Instructor Details' )
		->where( 'post_type', '=', 'product' )
		->add_fields( array(
			Field::make( 'text', 'fca_instructor_namee', __( 'Name' ) ),
			Field::make( 'image', 'fca_instructor_image', __( 'Profile Picture' ) ),
			Field::make( 'text', 'fca_instructor_course', __( 'Total Course' ) ),
			Field::make( 'text', 'fca_instructor_students', __( 'Total Students' ) ),

		));

			// Sidebar Main
			Container::make('post_meta', __('Material Includes'))
			->set_context('normal')
			->where('post_type', '=', 'product')
			->add_fields(array(
              	Field::make('complex', 'fca_course_material_video', __('Add Video Link from Local or Youtube Embeded Link'))
					->set_layout('tabbed-horizontal')
					->add_fields(array(
						Field::make('text', 'fca_mat_vid', 'Video Link From Self Hosted'),
                      	Field::make('text', 'fca_mat_yt', 'Video Link From YT Embeded'),
					)),
				Field::make( 'text', 'fca_course_material_heading', __( 'Write Heading For Main Sidebar' ) ),
				Field::make('complex', 'fca_course_material', __('Single Material'))
					->set_layout('tabbed-horizontal')
					->add_fields(array(
						Field::make('text', 'fca_material', 'Text'),
					)),
			));

			// Sidebar Requirements
			Container::make('post_meta', __('Requirements'))
			->set_context('normal')
			->where('post_type', '=', 'product')
			->add_fields(array(
				Field::make( 'text', 'fca_course_requirements_heading', __( 'Requirements Heading' ) ),
				Field::make('complex', 'fca_course_requirements', __('Single Requirements'))
					->set_layout('tabbed-horizontal')
					->add_fields(array(
						Field::make('text', 'fca_requirements', 'Text'),
					)),
			));

			// Sidebar Target Audience
			Container::make('post_meta', __('Target Audience'))
			->set_context('normal')
			->where('post_type', '=', 'product')
			->add_fields(array(
				Field::make( 'text', 'fca_course_audience_heading', __( 'Audience Heading' ) ),
				Field::make('complex', 'fca_course_audience', __('Single Audience'))
					->set_layout('tabbed-horizontal')
					->add_fields(array(
						Field::make('text', 'fca_audience', 'Text'),
					)),
			));
}

add_action('carbon_fields_register_fields', 'fca_add_post_meta_product_post_type');
