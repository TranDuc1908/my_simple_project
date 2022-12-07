
<?php require_once("libs.php");
// $core->displayDeadEnd();
if($_POST) foreach($_POST as $k=>$v){$_POST[$k] = addslashes($v);}
if($_GET) foreach($_GET as $k=>$v){$_GET[$k] = addslashes($v);} 

    var_dump(json_decode('{"data":"{"id":"348","amount":100000,"tranDate":"2021-08-13 00:00:00","tranId":"FT21225STT09","cardId":null,"numberOfBeneficiary":"NA","fee":1000,"description":"bentest-TF00000276","account":"106000852466"}","signature":"WDtRUa3XMpdaOhs19nOdk8YU9ioHLy8c789TtbiXMKN2hAycKG5knwEYsgp0wWlyMoVuJr7uCmiV+1f01bawpFgvUZ66G8pUI/rSi2sZIof0uGwVAvwqU9dZPzVi2+gIApfJ6vDJCRwTsTsd2nCVBHNVle9vYEkIhjMdd6HWkjI="}', true));

die;