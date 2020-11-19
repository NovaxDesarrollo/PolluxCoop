<?php
/**
* Customizer validation functions
*
* @package Theme Palace
* @subpackage corponess
* @since corponess 1.0.0
*/

if ( ! function_exists( 'corponess_validate_long_excerpt' ) ) :
  function corponess_validate_long_excerpt( $validity, $value ){
		 $value = intval( $value );
	 if ( empty( $value ) || ! is_numeric( $value ) ) {
		 $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'corponess' ) );
	 } elseif ( $value < 5 ) {
		 $validity->add( 'min_no_of_words', esc_html__( 'Minimum no of words is 5', 'corponess' ) );
	 } elseif ( $value > 100 ) {
		 $validity->add( 'max_no_of_words', esc_html__( 'Maximum no of words is 100', 'corponess' ) );
	 }
	 return $validity;
  }
endif;

if ( ! function_exists( 'corponess_validate_slider_count' ) ) :
  function corponess_validate_slider_count( $validity, $value ){
		 $value = intval( $value );
	 if ( empty( $value ) || ! is_numeric( $value ) ) {
		 $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'corponess' ) );
	 } elseif ( $value < 1 ) {
		 $validity->add( 'min_no_of_posts', esc_html__( 'Minimum no of posts is 1', 'corponess' ) );
	 } elseif ( $value > 10 ) {
		 $validity->add( 'max_no_of_posts', esc_html__( 'Maximum no of posts is 10', 'corponess' ) );
	 }
	 return $validity;
  }
endif;


if ( ! function_exists( 'corponess_validate_service_count' ) ) :
  function corponess_validate_service_count( $validity, $value ){
		 $value = intval( $value );
	 if ( empty( $value ) || ! is_numeric( $value ) ) {
		 $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'corponess' ) );
	 } elseif ( $value < 3 ) {
		 $validity->add( 'min_no_of_posts', esc_html__( 'Minimum no of Posts is 3', 'corponess' ) );
	 } elseif ( $value > 12 ) {
		 $validity->add( 'max_no_of_posts', esc_html__( 'Maximum no of Posts is 12', 'corponess' ) );
	 }
	 return $validity;
  }
endif;


if ( ! function_exists( 'corponess_validate_testimonial_count' ) ) :
  function corponess_validate_testimonial_count( $validity, $value ){
		 $value = intval( $value );
	 if ( empty( $value ) || ! is_numeric( $value ) ) {
		 $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'corponess' ) );
	 } elseif ( $value < 1 ) {
		 $validity->add( 'min_no_of_posts', esc_html__( 'Minimum no of testimonial is 1', 'corponess' ) );
	 } elseif ( $value > 12 ) {
		 $validity->add( 'max_no_of_posts', esc_html__( 'Maximum no of testimonials is 12', 'corponess' ) );
	 }
	 return $validity;
  }
endif;

if ( ! function_exists( 'corponess_validate_blog_count' ) ) :
  function corponess_validate_blog_count( $validity, $value ){
		 $value = intval( $value );
	 if ( empty( $value ) || ! is_numeric( $value ) ) {
		 $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'corponess' ) );
	 } elseif ( $value < 3 ) {
		 $validity->add( 'min_no_of_posts', esc_html__( 'Minimum no of Posts is 3', 'corponess' ) );
	 } elseif ( $value > 12 ) {
		 $validity->add( 'max_no_of_posts', esc_html__( 'Maximum no of Posts is 12', 'corponess' ) );
	 }
	 return $validity;
  }
endif;