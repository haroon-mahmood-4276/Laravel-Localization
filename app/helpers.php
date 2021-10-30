<?php

// use App\Models\ProfilePermissions;

// if (!function_exists('permission_check')) {
//     function permission_check($permission_id)
//     {
//         return ProfilePermissions::where('profile_id', auth()->user()->profile_id)->where('permission_id', $permission_id)->first();
//     }
// }

if (!function_exists('filter_strip_tags')) {

    function filter_strip_tags($field)
    {
        return trim(strip_tags($field));
    }
}

if (!function_exists('encode_html_entities')) {

    function encode_html_entities($field)
    {
        return trim(htmlentities($field));
    }
}

if (!function_exists('decode_html_entities')) {

    function decode_html_entities($field)
    {
        return trim(html_entity_decode($field));
    }
}
