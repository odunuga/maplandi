<?php


function format_number($raw_num)
{

    $num = (int)str_replace(",", "", trim($raw_num));
    if ($num > 1000) {

        $x = round($num);
        $x_number_format = number_format($x);
        $x_array = explode(',', $x_number_format);
        $x_parts = array('k', 'm', 'b', 't');
        $x_count_parts = count($x_array) - 1;

        $x_display = $x_array[0] . ((int)$x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
        $x_display .= $x_parts[$x_count_parts - 1];
        return $x_display;
    }

    return $num;
}

function filter_phone($value)
{
    $new_value = trim($value);
    $new_value = str_replace("(", "", $new_value);
    $new_value = str_replace(")", "", $new_value);
    $new_value = str_replace(" ", "", $new_value);
    return str_replace("-", "", $new_value);
}
