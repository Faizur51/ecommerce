<?php

function slugify($text, string $divider = '-')
{
    // replace non letter or digits by divider
    $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    // trim
    $text = trim($text, $divider);

    // remove duplicate divider
    $text = preg_replace('~-+~', $divider, $text);

    // lowercase
    $text = strtolower($text);

    if (empty($text)) {
        return 'n-a';
    }

    return $text;
}



function randomStatus(){

    $status=[
        'active'=>'active',
        'inactive'=>'inactive',

    ];

    return array_rand($status,1);
}

function textcolor($role){

$data=[
    'Super Admin'=>'danger',
     'Admin'=>'warning',
     'User'=>'success',
];

return $data[$role];

}


function  set_message($type,$message){
    session()->flash('type',$type);
    session()->flash('message',$message);
}
