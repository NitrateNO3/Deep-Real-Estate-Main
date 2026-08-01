<?
if (session_status() == PHP_SESSION_NONE) {
    session_start(); } 

 new DateTimeZone('Asia/Calcutta');
    date_default_timezone_set('Asia/Kolkata');
 $thisdate=date('Y-m-d');
 $thistime=date('Y-m-d H:i:s');
 ini_set( 'display_errors', TRUE );
    error_reporting( E_ALL );

    
define("DB_HOST", getenv("DB_HOST") ?: "localhost");
define("DB_PORT", getenv("DB_PORT") ?: "3306");
define("DB_NAME", getenv("DB_NAME") ?: "YOUR_DB_NAME");
define("DB_USER", getenv("DB_USER") ?: "YOUR_DB_USER");
define("DB_PASS", getenv("DB_PASS") ?: "YOUR_DB_PASSWORD");
define("RS", "&#8377;");
define("THISTIME", date('Y-m-d H:i:s'));
$THISTIME=date('Y-m-d H:i:s');
$toMail = getenv("SITE_MAIL") ?: "info@deeprealestate.in";


	function TimeIsBetweenTwoTimes($from, $till, $input) {
    $f = DateTime::createFromFormat('H:i:s', $from);
    $t = DateTime::createFromFormat('H:i:s', $till);
    $i = DateTime::createFromFormat('H:i:s', $input);
    if ($f > $t) $t->modify('+1 day');
	return ($f <= $i && $i <= $t) || ($f <= $i->modify('+1 day') && $i <= $t);
}
$photoidextension=array("jpg", "JPG", "gif", "GIF", "jpeg", "JPEG", "png", "PNG", "pdf", "pdf");
define("IMGEXTN", $photoidextension);
function chkspl($sr){
$splchr= "~,`,!,#,$,%,^,&,*,(,),=,\,|,{,[,],',;,?,/,>,},<,INSERT,DELETE,UPDATE,SELECT";
$splchar=explode(",",$splchr);
$hn='';
//@,.,+,-,_
foreach ($splchar as $key => $value){ if(strpos($sr, $value) !== false) { $hn.= $value;} }
 return $hn;
}


//echo"Sucess";
if(function_exists('isimage')){
function isimage($id){
$img=basename($id);
$myext=pathinfo($img);
$myextn=$myext['extension'];
$hju = array("jpg", "JPG", "png", "PNG", "JPEG", "jpeg", "Jpeg", "gif", "GIF");
if(in_array($myextn, $hju)){return true;} else {return false;}

}}
if(function_exists('ispdf')){
function ispdf($id){
$img=basename($id);
$myext=pathinfo($img);
$myextn=$myext['extension'];
$hju = array("pdf", "PDF", "doc", "docx", "xls", "xlsx");
if(in_array($myextn, $hju)){return true;} else {return false;}

}}
function getRights($email){
$result3=DB::query("SELECT * FROM admin WHERE email='$_SESSION[user]' ") ;
$num3=DB::count();
$res1=$result3[0] ;
return $res1['rights'];
}
function get_content($URL){
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_URL, $URL);
      $data = curl_exec($ch);
      curl_close($ch);
      return $data;
}
function limit_text($text, $limit) {
    if (str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, 2);
        $pos   = array_keys($words);
        $text  = substr($text, 0, $pos[$limit]) . '...';
    }
    return $text;
}
function getPrice($u){
    $u=round($u,0);$g='Call for Price';
    if(strlen($u) == 4) { $f = $u/1000; $g="&#8377 ".round($f,2)." Thousand";} else
    if(strlen($u) == 5) { $f = $u/10000; $g="&#8377 ".round($f,2)." Thousand";} else
    if(strlen($u) == 6) { $f = $u/100000; $g="&#8377 ".round($f,2)." Lac";} else
    if(strlen($u) == 7) { $f = $u/1000000; $g="&#8377 ".round($f,2)." Lac";} else
    if(strlen($u) == 8) { $f = $u/10000000; $g="&#8377 ".round($f,2)." Cr.";} else
    if(strlen($u) == 9) { $f = $u/100000000; $g="&#8377 ".round($f,2)." Cr.";} else
    if(strlen($u) == 10) { $f = $u/1000000000; $g="&#8377 ".round($f,2)." Ab.";} else
    if(strlen($u) == 11) { $f = $u/10000000000; $g="&#8377 ".round($f,2)." Ab.";} 
    return $g;
    
}
function getPropertyTypes($u){
    $rt=DB::query("SELECT * FROM category WHERE ptype='$u'");$f='';
    foreach($rt as $t){
        $f .="<option value='".$t['catid']."'>".$t['category']."</option>";
    }
    return $f;
}
function getSelectedPropertyTypes($u,$v){
    $rt=DB::query("SELECT * FROM category ");$f='';
    foreach($rt as $t){
        $f .="<option ";
        if($v==$t['catid']){ $f .=" selected ";}
        $f .="value='".$t['catid']."'>".$t['category']."</option>";
    }
    return $f;
}

function getCityList(){
    $rt=DB::query("SELECT * FROM cities WHERE cityName<>''");$f='';
    foreach($rt as $t){
        $f .="<option value='".$t['city_id']."'>".$t['cityName']."</option>";
    }
    return $f;
}
function getSelectedCityList($u){
    $rt=DB::query("SELECT * FROM cities WHERE cityName<>''");$f='';
    foreach($rt as $t){
        $f .="<option ";
        if($u==$t['city_id']){ $f .=" selected ";}
        $f .="value='".$t['city_id']."'>".$t['cityName']."</option>";
    }
    return $f;
}

function cityName($u){
    $rt=DB::query("SELECT * FROM cities WHERE city_id='$u'");
    foreach($rt as $t){
        $f=$t['cityName'];
    }
    return $f;
}
function getLocationList($u){
    $rt=DB::query("SELECT * FROM cityLocations WHERE cityid='$u'");$f='';
    foreach($rt as $t){
        $f .="<option value='".$t['loc_id']."'>".$t['locationName']."</option>";
    }
    return $f;
}

function getSelectedLocationList($u,$v){
    $rt=DB::query("SELECT * FROM cityLocations ");$f='';
    foreach($rt as $t){
        $f .="<option ";
        if($v==$t['loc_id']){ $f.=" selected ";}
        $f .="value='".$t['loc_id']."'>".$t['locationName']."</option>";
    }
    return $f;
}

function locationName($u){
    $rt=DB::query("SELECT * FROM cityLocations WHERE loc_id='$u'");
    foreach($rt as $t){
        $f=$t['locationName'];
    }
    return $f;
}

function getDevelopetrsList(){
    $rt=DB::query("SELECT * FROM developers ORDER by name ASC");$f='';
    foreach($rt as $t){
        $f .="<option value='".$t['did']."'>".$t['name']."</option>";
    }
    return $f;
}
function getSelectedDevelopetrsList($u){
    $rt=DB::query("SELECT * FROM developers ORDER by name ASC");$f='';
    foreach($rt as $t){
        $f .="<option ";
        if($u==$t['did']){$f .=" selected ";}
        $f .="value='".$t['did']."'>".$t['name']."</option>";
    }
    return $f;
}
function developerInfo($u,$v){
    $rt=DB::query("SELECT * FROM developers WHERE did='$u'");
       
    return $rt[0][$v];
}
function getUnitList(){
    $rt=DB::query("SELECT * FROM units ORDER by u_id ASC");$f='';
    foreach($rt as $t){
        $f .="<option value='".$t['u_units']."'>".$t['u_units']."</option>";
    }
    return $f;
}

function getSelectedUnitList($u){
    $rt=DB::query("SELECT * FROM units ORDER by u_id ASC");$f='';
    foreach($rt as $t){
        $f .="<option ";
        if($u==$t['u_units']){ $f .=" selected ";}
        $f .="value='".$t['u_units']."'>".$t['u_units']."</option>";
    }
    return $f;
}
function categoryName($u){
    $rt=DB::query("SELECT * FROM category WHERE catid ='$u'");
    return $rt[0]['category'];
}
function typeName($u){
     $rt=DB::query("SELECT * FROM catp WHERE cp_id ='$u'");
    return $rt[0]['cp_name'];

}
function getSelectedPTypeList($u){
    $rt=DB::query("SELECT * FROM catp WHERE cp_name<>''");$f='';
    foreach($rt as $t){
        $f .="<option ";
        if($u==$t['cp_id']){ $f .=" selected ";}
        $f .="value='".$t['cp_id']."'>".$t['cp_name']."</option>";
    }
    return $f;
}
function getPTypeList(){
    $rt=DB::query("SELECT * FROM catp WHERE cp_name<>''");$f='';
    foreach($rt as $t){
        $f .="<option value='".$t['cp_id']."'>".$t['cp_name']."</option>";
    }
    return $f;
}
function randomDate()
{
    $start_date=date("Y-m-d");
    $end_date = date('Y-m-d', strtotime($start_date. ' + 5 days'));
    $min = strtotime($start_date);
    $max = strtotime($end_date);

    // Generate random number using above bounds
    $val = rand($min, $max);

    // Convert back to desired date format
    return date('Y-m-d', $val);
}

/*
for($r=1;$r < 36; $r++){
    
    if($r>6){ echo "<td></td>";} else { 
        $s=$r-6;
        echo "<td>$s</td>";}
    if($r %7 ==0){ echo "</tr><td>";}
    
}

*/
?>