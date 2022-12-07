<?php
    $title_page = "Uống thuốc chưa??";
    // time to compare: 1670173806 <=> 05-12-22 00:10:06 => pill 24
    $x = 1670173806;
    $y = 24;
    
    # test
    // $str = "11-01-2023 12:23:22";
    // $time = strtotime($str);
    # end test
    
    $time = time();
    $str = date("d-m-Y", $time) . " 00:10:05";
    $time = strtotime($str);
    
    $days = ceil(($time-$x)/86400);
    $sum = $y+$days;
    if(($sum)<=28) $res = $sum;
    else $res = $sum % 28;

    $html = '<div style="width: 100%;height: 100%;display:flex;align-items:center;justify-content:center"><h1>Viên hôm nay: '.$res.'</h1></div>';
    echo $html;