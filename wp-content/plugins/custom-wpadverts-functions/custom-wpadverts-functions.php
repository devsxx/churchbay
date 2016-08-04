<?php
/*
Plugin Name: Additional WP Advert functions
Description: Extra functions for WPAdverts
*/


/**
 * [adverts_price_stripe_amount Returns stripe amount]
 */
function adverts_price_stripe_amount( $price ) {
    return number_format( $price, 2, '', '');
}

function adverts_price_amount( $price ) {

    if( empty($price) ) {
        return null;
    }

    $c = Adverts::instance()->get("currency");
    $number = number_format( $price, $c['decimals'], $c['char_decimal'], $c['char_thousand']);
    $number = str_replace('.00','',$number);

    if( empty($c['sign'] ) ) {
        $sign = $c['code'];
    } else {
        $sign = $c['sign'];
    }

    if( $c['sign_type'] == 'p' ) {
        return $sign.$number;
    } else {
        return $number.$sign;
    }

}
