<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);

$core = new Core();
$url = addslashes($_POST["url"]);
$intro_url = addslashes($_POST["intro_url"]);
$response = $core->execCURL("get", "https://vnexpress.net" . $url); // ==  file_get_content
$html = str_get_html($response);if (!$html) $core->returnAPI("error", "no html");

# ============> get image
$metas = $html->find("meta");
if($metas){
    foreach ($metas as $value) {
        $z = $value->property;
        if($z && $z == "og:image"){
            $img = $value->content;
            $image = str_replace("i1-vnexpress", "i-vnexpress", $img);
            $image = explode("?", $image);
            $img = $image[0];
            $data["image"] = $img;
            break;
        }
    }
}

# ============> get bodytype
$bodytype = $html->find(".detail-xe__top", 0);
$bodytype = $bodytype->find(".tag", 0);
$bodytype = $bodytype->find("a", 0);
$bodytype = $bodytype->plaintext;
$bodytype = str_replace("Loại xe: ","",$bodytype);
$data["bodytype"] = $bodytype;

# ============> get manufactory
$manufactory = $html->find(".breadcrumb", 0);
$manufactory = $manufactory->find("li.active", 0);
$manufactory = $manufactory->find("a", 0);
$manufactory = $manufactory->plaintext;
$manufactory = str_replace(" ","",$manufactory);
$data["manufactory"] = $manufactory;

# ============> get price
$item = $html->find(".change-version-info-pc",0);if(!$item) $core->returnAPI("error", "fail 1: ".$id);
$item = $item->find("a.active",0);if(!$item) $core->returnAPI("error", "fail 2: ".$id);
$arr = $item->attr;
$text = $item->plaintext;
$text = explode("-",$text);
$version = $text[0];
$data["version"] = $version;
if(count($text) == 2){
    $price_string = $text[1];
    $price = $core->stringToPrice($price_string);
} else {
    $price_string = $text[2];
    $price = $core->stringToPrice($price_string);
}
$url = $arr["data-link-version"];
$price_string = $price_string ? $price_string : "Hãng không công bố";
// $data["price_string"] = json_encode($price_string);
$data["price_string"] = ($price_string);
$data["price_num"] = $price;

# ============> get technical info
$list = $html->find(".list-collaps");if(!$list) $core->returnAPI("error", "fail list: ".$id);
foreach($list as $item){
    if(!$item->style){
        $z = $item->find("ul",0);if(!$z) $core->returnAPI("error", "fail z: ".$id);
        $z = $z->find("li.collaps");if(!$z) $core->returnAPI("error", "fail z: ".$id);
        foreach($z as $key=>$item){
            $bigTitle = $item->find("div.collapsed",0)->plaintext;
            $data['version_description'][$key]["title"] = $bigTitle;

            $x = $item->find("div.collapse",0);
            if(!$x) $core->returnAPI("error", "fail x-1: ".$id);
            $x = $item->find("li");
            if(!$x) $core->returnAPI("error", "fail x-2: ".$id);
            foreach($x as $child_item){
                $child_title = $child_item->find("b",0)->plaintext;
                $child_content = $child_item->find(".td2",0)->plaintext;
                if(!trim($child_content)){
                    $child_content = $child_item->find("use",0)->attr;
                    $child_content = $child_content["xlink:href"];
                    if($child_content == "#cancel") $child_content = 0;
                    elseif($child_content == "#check2") $child_content = 1;
                }
                $data['version_description'][$key]["content"][] = ["title" => $child_title,"content" => $child_content];
                // echo $child_title ."|". $child_content;echo "<br>";
            }
            // if($key_ == 0){
            //     $child_title = $child_item->plaintext;
            // } 
            // else foreach($child_item->find("li") as $key=>$child_item_2){
            //     $child_title_2 = $child_item_2->find("b",0)->plaintext;
            //     $child_content_2 = $child_item_2->find("div.td2",0)->plaintext;
            //     if($child_title_2 == "Loại pin" || $child_title_2 == "Loại nhiên liệu") $data["fuel"] = $child_content_2;
            //     if(!trim($child_content_2)){
            //         $child_content_2 = $child_item_2->find("use",0)->attr;
            //         $child_content_2 = $child_content_2["xlink:href"];
            //         if($child_content_2 == "#cancel") $child_content_2 = 0;
            //         elseif($child_content_2 == "#check2") $child_content_2 = 1;
            //     }
            //     $data["version_description"][$key_]["content"][] = ["title"=>$child_title_2, "content"=>$child_content_2];
            //     // $data["version_description"][$child_title][] = [$child_title_2=>$child_content_2];
            // }
        }
        
        // $data["version_description"] = json_encode($data["version_description"]);
        break;
    }
}

if($intro_url){
    $url = $intro_url;
    $response = $core->execCURL("get", "https://vnexpress.net" . $url); // ==  file_get_content
    $html = str_get_html($response);if (!$html) $core->returnAPI("error", "no html");

    # ============> get intro
    $intro = $html->find(".slidebar-left", 0);
    if (!$intro) $core->returnAPI("error", "fail 3: " . $id);
    $intro = $intro->find("p.Normal", 0);
    if (!$intro) $data["intro"] = "";
    else {
        $intro = $intro->plaintext;
        // $data["intro"] = json_encode($intro);
        $data["intro"] = ($intro);
    }
    
    # ============> get images
    $tmp = $html->find(".swiper-wrapper", 0);
    if($tmp){
        $data["media"] = "";
        if($z = $tmp->find(".swiper-slide")){
            foreach ($z as $item) {
                $image = $item->find("img", 0)->src;
                $image = str_replace("i1-vnexpress", "i-vnexpress", $image);
                $image = explode("?", $image);
                $image = $image[0];
                $data["media"] .= $image . "|";
            }
        } 
    } 
    
    # ============> get content
    $tmp = $html->find(".taxonomy_seo", 0);
    if($tmp){
        $data["content"] = "";
        $z = $tmp->find(".shrink-overflow-gradient",0);
        if($z) $z->outertext = "";
        // if($tmp) $data["content"] = json_encode($tmp->innertext);
        if($tmp) $data["content"] = ($tmp->innertext);
    }
}

echo json_encode($data);die;