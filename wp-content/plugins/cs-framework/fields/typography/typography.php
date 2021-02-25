<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Field: Typography
 *
 * @since 1.0.0
 * @version 1.0.0
 * This File Is Modified by ThemeDraft On July 6 2018.
 *
 */
class CSFramework_Option_typography extends CSFramework_Options {

  public function __construct( $field, $value = '', $unique = '' ) {
    parent::__construct( $field, $value, $unique );
  }

  public function output() {

    echo $this->element_before();

    $defaults_value = array(
      'family'  => 'Arial',
      'variant' => '400',
      'weight' => '400',
      'font'    => 'websafe',
      'style'    => 'normal',
      'size'    => '',
      'color'  => '',
    );

    $default_variants = apply_filters( 'cs_websafe_fonts_variants', array(
      '100',
      '200',
      '300',
      '400',
      '500',
      '600',
      '700',
      '800',
      '900'
    ));

    $default_font_weight = apply_filters( 'cs_websafe_fonts_weight', array(
      '300',
      '400',
      '500',
      '600',
      '700'
    ));

    $default_style = apply_filters( 'cs_websafe_fonts_style', array(
      'normal',
      'italic'
    ));

    $websafe_fonts = apply_filters( 'cs_websafe_fonts', array(
      'Arial',
      'Arial Black',
      'Comic Sans MS',
      'Impact',
      'Lucida Sans Unicode',
      'Tahoma',
      'Trebuchet MS',
      'Verdana',
      'Courier New',
      'Lucida Console',
      'Georgia, serif',
      'Palatino Linotype',
      'Times New Roman'
    ));

    $value         = wp_parse_args( $this->element_value(), $defaults_value );
    $family_value  = $value['family'];
    $variant_value = $value['variant'];
    $is_variant    = ( isset( $this->field['variant'] ) && $this->field['variant'] === false ) ? false : true;
    $is_chosen     = ( isset( $this->field['chosen'] ) && $this->field['chosen'] === false ) ? '' : 'chosen ';


    $weight_value = $value['weight'];
    $is_weight    = ( isset( $this->field['weight'] ) && $this->field['weight'] === false ) ? false : true;
    $is_weight_chosen     = ( isset( $this->field['chosen'] ) && $this->field['chosen'] === false ) ? '' : 'chosen ';


    $style_value = $value['style'];
    $is_style    = ( isset( $this->field['style'] ) && $this->field['style'] === false ) ? false : true;
    $is_style_chosen     = ( isset( $this->field['chosen'] ) && $this->field['chosen'] === false ) ? '' : 'chosen ';



    $google_json   = cs_get_google_fonts();
    $chosen_rtl    = ( is_rtl() && ! empty( $is_chosen ) ) ? 'chosen-rtl ' : '';

    if( is_object( $google_json ) ) {

      $googlefonts = array();

      foreach ( $google_json->items as $key => $font ) {
        $googlefonts[$font->family] = $font->variants;
      }

      $is_google = ( array_key_exists( $family_value, $googlefonts ) ) ? true : false;

      echo '<label class="cs-typography-family">';
      echo '<select name="'. $this->element_name( '[family]' ) .'" class="'. $is_chosen . $chosen_rtl .'cs-typo-family" data-atts="family"'. $this->element_attributes() .'>';

      do_action( 'cs_typography_family', $family_value, $this );

      echo '<optgroup label="'. esc_html__( 'Web Safe Fonts', 'cs-framework' ) .'">';
      foreach ( $websafe_fonts as $websafe_value ) {
        echo '<option value="'. $websafe_value .'" data-variants="'. implode( '|', $default_variants ) .'" data-type="websafe"'. selected( $websafe_value, $family_value, true ) .'>'. $websafe_value .'</option>';
      }
      echo '</optgroup>';

      echo '<optgroup label="'. esc_html__( 'Google Fonts', 'cs-framework' ) .'">';
      foreach ( $googlefonts as $google_key => $google_value ) {
        echo '<option value="'. $google_key .'" data-variants="'. implode( '|', $google_value ) .'" data-type="google"'. selected( $google_key, $family_value, true ) .'>'. $google_key .'</option>';
      }
      echo '</optgroup>';

      echo '</select>';
      echo '</label>';

      if( ! empty( $is_weight ) ) {

        $weights =  $default_font_weight;

        echo '<label class="cs-typography-variant">';
        echo '<select name="'. $this->element_name( '[weight]' ) .'" class="'. $is_chosen . $chosen_rtl .'cs-typo-weight" data-atts="weight">';
        foreach ( $weights as $weight ) {
          echo '<option value="'. $weight .'"'. $this->checked( $weight_value, $weight, 'selected' ) .'>'. $weight .'</option>';
        }
        echo '</select>';
        echo '</label>';

      }

      if( ! empty( $is_style ) ) {

        $styles =  $default_style;

        echo '<label class="cs-typography-style">';
        echo '<select name="'. $this->element_name( '[style]' ) .'" class="'. $is_style_chosen . $chosen_rtl .'cs-typo-style" data-atts="style">';
        foreach ( $styles as $style ) {
          echo '<option value="'. $style .'"'. $this->checked( $style_value, $style, 'selected' ) .'>'. $style .'</option>';
        }
        echo '</select>';
        echo '</label>';

      }

      echo '<label class="cs-typography-size">';
      echo '<input type="number" min="1" name="'. $this->element_name( '[size]' ) .'" value="'. $value['size'] .'" placeholder="Font Size" />';
      echo '</label>';

      echo '<input type="text" name="'. $this->element_name( '[font]' ) .'" class="cs-typo-font hidden" data-atts="font" value="'. $value['font'] .'" />';

    } else {

      _e( 'Error! Can not load json file.', 'cs-framework' );

    }

    echo $this->element_after();

  }

}
