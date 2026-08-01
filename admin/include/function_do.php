<? include 'MeecroDB.php';

if(isset($_GET['userLogin'])){
    $usr=$_POST['usr'];
    $pass=md5($_POST['pass']);
    if(DB::query("SELECT * from admin where email='$usr' AND password='$pass'")){
        $_SESSION['mylogin']=$_POST['usr'];
        echo 1;}else {echo 0;}
    
}
if(isset($_GET['addProperty'])){
    $posted = array();
    foreach($_POST as $key => $value){
        $posted[$key] = addslashes($value); 
    }
DB::insert('propertyList', [$posted]);
 header("Content-Type: application/json", true);
if(DB::insertId()){echo DB::insertId().'^Property Added!';} else{ echo 'Some Error!';}
} 
else if(isset($_GET['editProperty'])){
    $posted = array();
    foreach($_POST as $key => $value){
        $posted[$key] = addslashes($value); 
    }
DB::query("UPDATE propertyList SET purpose='$posted[purpose]',ptype='$posted[ptype]',subtype='$posted[subtype]',city='$posted[city]',
location='$posted[location]',sublocation='$posted[sublocation]',pname='$posted[pname]',psize='$posted[psize]',
                        unit='$posted[unit]',did='$posted[did]',price='$posted[price]',unit1='$posted[unit1]',
                        movein='$posted[movein]',details='$posted[details]',amenities='$posted[amenities]',
                        contact_person='$posted[contact_person]',
                        contact_no='$posted[contact_no]' WHERE pid='$_GET[editProperty]'");

if(DB::affectedRows()){echo $_GET['editProperty'].'^Property Edited!';} else{ echo 'Some Error!';}
} 

else if(isset($_GET['upload'])){
    $rt=DB::query("SELECT * FROM propertyList WHERE pid='$_GET[deleteProperty]'")[0];
    if($rt['pimage_name']!=0 && $rt['pimage_name'] != ''){$rs=explode(",",$rt['pimage_name']);
    foreach($rs as $s){
       if(file_exists('../assets/uploadedPropertyPics/'.$s)){ unlink('../assets/uploadedPropertyPics/'.$s);}
    }}
    $total = count($_FILES['file']['name']);
   for( $i=0 ; $i < $total ; $i++ ) {
       $tmpFilePath = $_FILES['file']['tmp_name'][$i];

  if ($tmpFilePath != ""){
       $upladPath="../assets/uploadedPropertyPics/";
       $extn=pathinfo($_FILES['file']['name'][$i],PATHINFO_EXTENSION);
       $filename=$upladPath."PropertyID".$_POST['pid']."-$i.".$extn;
        if (file_exists($filename)) {
            echo $filename . " already exists. ";
        } else {
            move_uploaded_file($_FILES['file']["tmp_name"][$i],$filename);
            $filename = str_replace($upladPath,"",$filename);
        DB::query("UPDATE propertyList SET pimage_name = CONCAT(pimage_name,'$filename') WHERE pid='$_POST[pid]'"); 
        if($i < $total){ DB::query("UPDATE propertyList SET pimage_name = CONCAT(pimage_name,',') WHERE pid='$_POST[pid]'");}
        }
    }}
if(DB::affectedRows()){echo 'Picture Added!';} else{ echo 'Some Error!';}

} else if(isset($_GET['newLocationtoAdd'])){
    DB::insert('cityLocations', [
  'locationName' => addslashes($_GET['newLocationtoAdd']),
  'cityid' => $_GET['ncity']
]);
if(DB::insertId()){echo 'Location Added!';} else{ echo 'Some Error!';}
}
else if(isset($_GET['editLocation'])){
    if(DB::query("UPDATE cityLocations SET locationName = '$_GET[lname]' WHERE loc_id ='$_GET[editLocation]'")){
echo 1;} else{ echo 'Some Error!';}
  
}
else if(isset($_GET['deleteLocation'])){
    if(DB::query("DELETE FROM cityLocations WHERE loc_id ='$_GET[deleteLocation]'")){
echo 1;} else{ echo 'Some Error!';}
  
}
else if(isset($_GET['getLocationCityWise'])){
    $u=$_GET['getLocationCityWise'];
    $rt=DB::query("SELECT * FROM cityLocations WHERE cityid='$u'");$f='';
    foreach($rt as $t){
        $f .='<li class="ui-sortable-handle">
                                            <div class="kanban-box">
                                              <div class="kanban-detail">
                                                   <h4 class="mt-1" style="float:left">'.cityName($t['cityid']).' : '.$t['locationName'].'</h4>
                                                    <ul class="list-inline" style="float:right">
                                                      <li class="list-inline-item">
                                                            <a href="'.$t['loc_id']."^".$t['locationName'].'" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit This Location!" class="editlocation">
                                                                <i style="color:blue" class="fe-edit"></i>
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a href="'.$t['loc_id'].'" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete this Location!" class="deletelocation">
                                                                <i style="color:red" class="fe-x-circle"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <div style="clear:both"></div>
                                                </div> 
                                            </div>
                                        </li>';
    }
    echo $f;

}
 else if(isset($_GET['newCitytoAdd'])){
    DB::insert('cities', [
  'cityName' => addslashes($_GET['newCitytoAdd'])
]);
  if(DB::insertId()){echo 'City Added!';} else{ echo 'Some Error!';}
  
}
else if(isset($_GET['editCity'])){
    if(DB::query("UPDATE cities SET cityName = '$_GET[cname]' WHERE city_id ='$_GET[editCity]'")){
echo 1;} else{ echo 'Some Error!';}
  
}
else if(isset($_GET['deleteCity'])){
    if(DB::query("DELETE FROM cities WHERE city_id ='$_GET[deleteCity]'")){
echo 1;} else{ echo 'Some Error!';}
  
}

else if(isset($_GET['newAmenitytoAdd'])){
    DB::insert('amenities', [
  'ame_name' => addslashes($_GET['newAmenitytoAdd'])
]);
  if(DB::insertId()){echo 'Amenity Added!';} else{ echo 'Some Error!';}
  
}
else if(isset($_GET['editAme'])){
    if(DB::query("UPDATE amenities SET ame_name = '$_GET[aname]' WHERE ame_id ='$_GET[editAme]'")){
echo 1;} else{ echo 'Some Error!';}
  
}
else if(isset($_GET['deleteAme'])){
    if(DB::query("DELETE FROM amenities WHERE ame_id ='$_GET[deleteAme]'")){
echo 1;} else{ echo 'Some Error!';}
  
}
else if(isset($_GET['selectedCity'])){
  $results = DB::query("SELECT * FROM cityLocations WHERE cityid=%s", $_GET['selectedCity']);
  if(DB::count()){
  foreach($results as $t){
     echo "<option value='".$t['loc_id']."'>".$t['locationName']."</option>";
  } } else {
       echo "<option value='0'>No city found</option>";
  }
  
}
else if(isset($_GET['selectedType'])){
  $results = DB::query("SELECT * FROM category WHERE ptype=%s ORDER BY category ASC", $_GET['selectedType']);
  if(DB::count()){
  foreach($results as $t){
     echo "<option value='".$t['catid']."'>".$t['category']."</option>";
  } } else {
       echo "<option value='0'>No city found</option>";
  }
  
} else if(isset($_GET['addDeveloper'])){
       if ($_FILES["file"]["error"] > 0) {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    } else {
       $upladPath="../assets/uploadedDevelopersLogo/";
       $extn=pathinfo($_FILES["file"]['name'],PATHINFO_EXTENSION);
       $filename=$upladPath."Logo_".str_replace(" ","_",$_POST['dname']).".".$extn;
        if (file_exists($filename)) {
            echo $filename . " already exists. ";
        } else {
            move_uploaded_file($_FILES["file"]["tmp_name"],$filename);
             $filename = str_replace("../","",$filename);
        DB::insert('developers', [
  'name' => addslashes($_POST['dname']),
'logo' => $filename,
'details' => addslashes($_POST['ddetails'])
]);  
        }
    }
    
    
  if(DB::insertId()){echo 'Developer Added!';} else{ echo 'Some Error!';}
  
}

else if(isset($_GET['deleteProperty'])){
    $rt=DB::query("SELECT * FROM propertyList WHERE pid='$_GET[deleteProperty]'")[0];
    $rs=explode(",",$rt['pimage_name']);
    foreach($rs as $s){
        unlink('../assets/uploadedPropertyPics/'.$s);
    }
    if(DB::query("DELETE FROM propertyList WHERE pid='$_GET[deleteProperty]'")){echo '1';} else{echo '0';}
}
else if(isset($_GET['act']) && isset($_GET['pid'])){
    if(DB::query("UPDATE propertyList SET isBestDeal='$_GET[act]' WHERE pid='$_GET[pid]'")) {echo 1;} else {echo 0;}
   
} else if(isset($_GET['newDevelopertoAdd'])){
   $dname=addslashes($_POST['dname']);
   $dtext=addslashes($_POST['dtext']);
   
    $total = count($_FILES['file']['name']);
   for( $i=0 ; $i < $total ; $i++ ) {
       $tmpFilePath = $_FILES['file']['tmp_name'][$i];

  if ($tmpFilePath != ""){
       $upladPath="../assets/uploadedDevelopersLogo/";
       $extn=pathinfo($_FILES['file']['name'][$i],PATHINFO_EXTENSION);
       $filename=$upladPath."DeveloperID-".str_replace(" ","_",$_POST['dname'])."-$i.".$extn;
        if (file_exists($filename)) {
            unlink($filename);
        } 
            move_uploaded_file($_FILES['file']["tmp_name"][$i],$filename);
            $filename = str_replace($upladPath,"",$filename);
        DB::query("INSERT INTO developers (name,logo,details) VALUES('$dname','$filename','$dtext')"); 
        
    }}
if(DB::insertId()){echo 'Developer Added!';} else{ echo 'Some Error!';}

}

 else if(isset($_GET['editDeveloper'])){
   $dname=addslashes($_POST['dname']);
   $dtext=addslashes($_POST['dtext']);
   
    $total = count($_FILES['file']['name']);
   for( $i=0 ; $i < $total ; $i++ ) {
       $tmpFilePath = $_FILES['file']['tmp_name'][$i];

  if ($tmpFilePath != ""){
       $upladPath="../assets/uploadedDevelopersLogo/";
       $extn=pathinfo($_FILES['file']['name'][$i],PATHINFO_EXTENSION);
       $filename=$upladPath."DeveloperID-".str_replace(" ","_",$_POST['dname'])."-$i.".$extn;
        if (file_exists($filename)) {
            unlink($filename);
        } 
            move_uploaded_file($_FILES['file']["tmp_name"][$i],$filename);
            $filename = str_replace($upladPath,"",$filename);
        DB::query("UPDATE developers SET name='$dname', logo='$filename', details='$dtext' WHERE did='$_GET[editDeveloper]'") ; 
        
    }}
if(DB::affectedRows()){echo 'Developer edited!';} else{ echo 'Some Error!';}

} else if(isset($_GET['deleteDev'])){
  
  $rt=DB::query("SELECT * FROM developers where did='$_GET[deleteDev]'")[0];
       $filePath="../assets/uploadedDevelopersLogo/".$rt['logo'];

        if (file_exists($filePath)) {
            unlink($filePath);
        } 
           
        if(DB::query("DELETE FROM developers WHERE did='$_GET[deleteDev]'")){echo 1;} else{ echo 'Some Error!';}

}  else if(isset($_GET['newPropertyTypetoAdd'])){
    DB::insert('catp', [
  'cp_name' => addslashes($_GET['newPropertyTypetoAdd']),
  'cp_active'=> '1'
]);
  if(DB::insertId()){echo 'Type Added!';} else{ echo 'Some Error!';}
  
}
else if(isset($_GET['newTypetoAdd'])){
    if(DB::query("UPDATE catp SET cp_name = '$_GET[cpname]' WHERE cp_id ='$_GET[newTypetoAdd]'")){
echo 1;} else{ echo 'Some Error!';}
  
}
else if(isset($_GET['deletePType'])){
    if(DB::query("DELETE FROM catp WHERE cp_id ='$_GET[deletePType]'")){
echo 1;} else{ echo 'Some Error!';}
  
}
else if(isset($_GET['newCategorytoAdd'])){
    DB::insert('category', [
  'category' => addslashes($_GET['newCategorytoAdd']),
  'ptype' => $_GET['ncatp']
]);
if(DB::insertId()){echo 1;} else{ echo 'Some Error!';}
}
else if(isset($_GET['SubTypetoEdit'])){
    if(DB::query("UPDATE category SET category = '$_GET[sname]' WHERE catid ='$_GET[SubTypetoEdit]'")){
echo 1;} else{ echo 'Some Error!';}
  
}
else if(isset($_GET['deleteSType'])){
    if(DB::query("DELETE FROM category WHERE catid ='$_GET[deleteSType]'")){
echo 1;} else{ echo 'Some Error!';}
  
}
else if(isset($_GET['getCatTypeWise'])){
    $u=$_GET['getCatTypeWise'];
    $rt=DB::query("SELECT * FROM category WHERE ptype='$u'");$f='';
    foreach($rt as $t){
        $f .='<li class="ui-sortable-handle">
                                            <div class="kanban-box">
                                              <div class="kanban-detail">
                                                   <h4 class="mt-1" style="float:left">'.typeName($t['ptype']).' : '.$t['category'].'</h4>
                                                    <ul class="list-inline" style="float:right">
                                                      <li class="list-inline-item">
                                                            <a href="'.$t['catid']."^".$t['category'].'" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit This SubType!" class="editSType">
                                                                <i style="color:blue" class="fe-edit"></i>
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a href="'.$t['catid'].'" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete this SubType!" class="deleteSType">
                                                                <i style="color:red" class="fe-x-circle"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <div style="clear:both"></div>
                                                </div> 
                                            </div>
                                        </li>';
    }
    echo $f;

}
 else if(isset($_GET['newMaptoAdd'])){
   $dname=addslashes($_POST['dname']);
   
    $total = count($_FILES['file']['name']);
   for( $i=0 ; $i < $total ; $i++ ) {
       $tmpFilePath = $_FILES['file']['tmp_name'][$i];

  if ($tmpFilePath != ""){
       $upladPath="../assets/maps/";
       $thumb_path="../assets/maps/thumb/";
       $extn=pathinfo($_FILES['file']['name'][$i],PATHINFO_EXTENSION);
       $filename=$upladPath.str_replace(" ","_",$_POST['dname']).".".$extn;
        if (file_exists($filename)) { unlink($filename); } 
      
$thumb_file = $thumb_path.str_replace(" ","_",$_POST['dname']).".".$extn;
if (file_exists($thumb_file)) { unlink($thumb_file); } 
      
            move_uploaded_file($_FILES['file']["tmp_name"][$i],$filename);
                include('SimpleImage.php');
      $image = new SimpleImage();
      $image->load($filename);
     $image->resize(185,170);
   $image->save($thumb_file);
            $filename = str_replace($upladPath,"",$filename);
           $thumb_file = str_replace($thumb_path,"",$thumb_file);
           
        DB::query("INSERT INTO maps (map_name,map_url,thumb_url) VALUES('$dname','$filename','$thumb_file')"); 
        
    }}
if(DB::insertId()){echo 1;} else{ echo 'Some Error!';}

}

 else if(isset($_GET['editMap'])){
   $dname=addslashes($_POST['dname']);
   
    $total = count($_FILES['file']['name']);
   for( $i=0 ; $i < $total ; $i++ ) {
       $tmpFilePath = $_FILES['file']['tmp_name'][$i];

  if ($tmpFilePath != ""){
       $upladPath="../assets/maps/";
        $thumb_path="../assets/maps/thumb/";
       $extn=pathinfo($_FILES['file']['name'][$i],PATHINFO_EXTENSION);
      $filename=$upladPath.str_replace(" ","_",$_POST['dname']).".".$extn;
        if (file_exists($filename)) { unlink($filename); } 
      
$thumb_file = $thumb_path.str_replace(" ","_",$_POST['dname']).".".$extn;
if (file_exists($thumb_file)) { unlink($thumb_file); } 
            move_uploaded_file($_FILES['file']["tmp_name"][$i],$filename);
            include('SimpleImage.php');
              $image = new SimpleImage();
      $image->load($filename);
     $image->resize(185,170);
   $image->save($thumb_file);
            $filename = str_replace($upladPath,"",$filename);
           $thumb_file = str_replace($thumb_path,"",$thumb_file);
        DB::query("UPDATE maps SET map_name='$dname', map_url='$filename', thumb_url='$thumb_file' WHERE mid='$_GET[editMap]'") ; 
        
    }}
if(DB::affectedRows()){echo 1;} else{ echo 'Some Error!';}

} else if(isset($_GET['deleteMap'])){
  
  $rt=DB::query("SELECT * FROM maps where mid='$_GET[deleteMap]'")[0];
       $filePath="../assets/maps/".$rt['map_url'];
$thumbPath="../assets/maps/thumb/".$rt['thumb_url'];

        if (file_exists($filePath)) {unlink($filePath); } 
        if (file_exists($thumbPath)) {unlink($thumbPath); } 
           
        if(DB::query("DELETE FROM maps WHERE mid='$_GET[deleteMap]'")){echo 1;} else{ echo 'Some Error!';}

} 
else if(isset($_GET['newDoctoAdd'])){
   $dname=addslashes($_POST['dname']);
   
    $total = count($_FILES['file']['name']);
   for( $i=0 ; $i < $total ; $i++ ) {
       $tmpFilePath = $_FILES['file']['tmp_name'][$i];

  if ($tmpFilePath != ""){
       $upladPath="../assets/documents/";
     
       $extn=pathinfo($_FILES['file']['name'][$i],PATHINFO_EXTENSION);
       $filename=$upladPath.str_replace(" ","_",$_POST['dname']).".".$extn;
        if (file_exists($filename)) { unlink($filename); } 
      

            move_uploaded_file($_FILES['file']["tmp_name"][$i],$filename);
               
            $filename = str_replace("../assets/","",$filename);
           
        DB::query("INSERT INTO documents (dname,dpath) VALUES('$dname','$filename')"); 
        
    }}
if(DB::insertId()){echo 1;} else{ echo 'Some Error!';}

}

 else if(isset($_GET['editDoc'])){
   $dname=addslashes($_POST['dname']);
   
    $total = count($_FILES['file']['name']);
   for( $i=0 ; $i < $total ; $i++ ) {
       $tmpFilePath = $_FILES['file']['tmp_name'][$i];

  if ($tmpFilePath != ""){
       $upladPath="../assets/documents/";
      
       $extn=pathinfo($_FILES['file']['name'][$i],PATHINFO_EXTENSION);
      $filename=$upladPath.str_replace(" ","_",$_POST['dname']).".".$extn;
        if (file_exists($filename)) { unlink($filename); } 
      
            move_uploaded_file($_FILES['file']["tmp_name"][$i],$filename);
            
            $filename = str_replace("../assets/","",$filename);
         
        DB::query("UPDATE documents SET dname='$dname', dpath='$filename' WHERE d_id='$_GET[editDoc]'") ; 
        
    }}
if(DB::affectedRows()){echo 1;} else{ echo 'Some Error!';}

} else if(isset($_GET['deleteDoc'])){
  
  $rt=DB::query("SELECT * FROM documents where d_id='$_GET[deleteDoc]'")[0];
       $filePath="../assets/documents/".$rt['dpath'];

        if (file_exists($filePath)) {unlink($filePath); } 
           
        if(DB::query("DELETE FROM documents WHERE d_id='$_GET[deleteDoc]'")){echo 1;} else{ echo 'Some Error!';}

} 
 else if(isset($_GET['newBannertoAdd'])){

    $total = count($_FILES['file']['name']);$z=0;
    
   for( $i=0 ; $i < $total ; $i++ ) {
       $tmpFilePath = $_FILES['file']['tmp_name'][$i];

  if ($tmpFilePath != ""){
       $upladPath="../assets/uploadBanners/";
       
       $filename=$upladPath.$_FILES['file']['name'][$i];
       if (file_exists($filename)) {unlink($filename);} 
            move_uploaded_file($_FILES['file']["tmp_name"][$i],$filename);
            $filename = str_replace($upladPath,"",$filename);
       DB::query("INSERT INTO banners(banner_path) VALUES('$filename')"); 
        $z++;
    } else {echo 'count not found';}
       
       
   }
if(DB::insertId()){echo $z;} else{ echo 'Some Error!';}

}

 else if(isset($_GET['editBanner'])){
   
    $total = count($_FILES['file']['name']);
   for( $i=0 ; $i < $total ; $i++ ) {
       $tmpFilePath = $_FILES['file']['tmp_name'][$i];

  if ($tmpFilePath != ""){
       $upladPath="../assets/uploadBanners/";
     
       $filename=$upladPath.$_FILES['file']['name'][$i];
        if (file_exists($filename)) {
            unlink($filename);
        } 
            move_uploaded_file($_FILES['file']["tmp_name"][$i],$filename);
            $filename = str_replace($upladPath,"",$filename);
        DB::query("UPDATE banners SET banner_path='$filename' WHERE banner_id='$_GET[editBanner]'") ; 
        
    }}
if(DB::affectedRows()){echo 1;} else{ echo 'Some Error!';}

} else if(isset($_GET['deleteBanner'])){
  
  $rt=DB::query("SELECT * FROM banners where banner_id='$_GET[deleteBanner]'")[0];
       $filePath="../assets/uploadBanners/".$rt['banner_path'];

        if (file_exists($filePath)) {
            unlink($filePath);
        } 
           
        if(DB::query("DELETE FROM banners WHERE banner_id='$_GET[deleteBanner]'")){echo 1;} else{ echo 'Some Error!';}

} else if(isset($_GET['updateBannerPosition'])){
    $pos=$_GET['pos'];
 if(DB::query("UPDATE banners SET banner_position = '$pos' WHERE banner_id='$_GET[updateBannerPosition]'")){echo 1;} else{ echo 'Some Error!';}

} 
else if(isset($_GET['updateWebOwner'])){
    if($_GET['updateWebOwner']=='phase1'){
        $posted = array(); $r=0;
    foreach($_POST as $key => $value){
        $pvar = addslashes($value); 
        
        if(DB::update('web_owner', [$key => $pvar], "oid=%s", '1')){$r++;}
    }
if(count($_POST) == $r){ echo 1;} else { echo '0'.$r;} 
    } else if($_GET['updateWebOwner']=='phase2'){
       
        $OwnerName = addslashes($_POST['OwnerName']); 
        $OwnerTitle = addslashes($_POST['OwnerTitle']); 
        $OwnerInfo = addslashes($_POST['OwnerInfo']); 
         $total = count($_FILES['file']['name']);
   for( $i=0 ; $i < $total ; $i++ ) {
       $tmpFilePath = $_FILES['file']['tmp_name'][$i];

  if ($tmpFilePath != ""){
       $upladPath="../assets/myAdmin/";
     
       $OwnerPic=$upladPath.$_FILES['file']['name'][$i];
        if (file_exists($OwnerPic)) { unlink($OwnerPic); } 
            move_uploaded_file($_FILES['file']["tmp_name"][$i],$OwnerPic);
            $OwnerPic = str_replace($upladPath,"",$OwnerPic);
        
        if(DB::query("UPDATE web_owner SET OwnerName='$OwnerName', OwnerTitle='$OwnerTitle', 
        OwnerInfo='$OwnerInfo', OwnerPic='$OwnerPic' WHERE oid = '1'")){echo 1;}else{echo 0;}
    }

    }}
    else if($_GET['updateWebOwner']=='phase3'){
       $uploadPath="../assets/myAdmin/";
       $exl=DB::query("SELECT * FROM web_owner WHERE oid='1' ")[0];
       $exLogo=$uploadPath.$exl['Logo'];
       $exSecondLogo=$uploadPath.$exl['SecondLogo'];
       $exThirdLogo=$uploadPath.$exl['ThirdLogo'];
         $total = count($_FILES['Logo']['name']);$z=1;
   for( $i=0 ; $i < $total ; $i++ ) {
       $tmpFilePath = $_FILES['Logo']['tmp_name'][$i];
  if ($tmpFilePath != ""){
       $Logo1=$uploadPath.$_FILES['Logo']['name'][$i];
        if (file_exists($Logo1)) { unlink($Logo1); } 
        if(file_exists($exLogo)){unlink($exLogo);}
            move_uploaded_file($_FILES['Logo']["tmp_name"][$i],$Logo1);
            $Logo1 = str_replace($uploadPath,"",$Logo1);
            if(DB::query("UPDATE web_owner SET Logo='$Logo1' WHERE oid = '1'")){ echo '';}else{ $z++;}
    }}
      $total = count($_FILES['SecondLogo']['name']);
   for( $i=0 ; $i < $total ; $i++ ) {
       $tmpFilePath = $_FILES['SecondLogo']['tmp_name'][$i];
  if ($tmpFilePath != ""){
       $SecondLogo1=$uploadPath.$_FILES['SecondLogo']['name'][$i];
        if (file_exists($SecondLogo1)) { unlink($SecondLogo1); } 
        if(file_exists($exSecondLogo)){unlink($exSecondLogo);}
            move_uploaded_file($_FILES['SecondLogo']["tmp_name"][$i],$SecondLogo1);
            $SecondLogo1 = str_replace($uploadPath,"",$SecondLogo1);
            if(DB::query("UPDATE web_owner SET SecondLogo='$SecondLogo1' WHERE oid = '1'")){ echo '';}else{ $z++;}
    }}
        
        $total = count($_FILES['ThirdLogo']['name']);
   for( $i=0 ; $i < $total ; $i++ ) {
       $tmpFilePath = $_FILES['ThirdLogo']['tmp_name'][$i];
  if ($tmpFilePath != ""){
       $ThirdLogo1=$uploadPath.$_FILES['ThirdLogo']['name'][$i];
        if (file_exists($ThirdLogo1)) { unlink($ThirdLogo1); } 
        if(file_exists($exThirdLogo)){unlink($exThirdLogo);}
            move_uploaded_file($_FILES['ThirdLogo']["tmp_name"][$i],$ThirdLogo1);
            $ThirdLogo1 = str_replace($uploadPath,"",$ThirdLogo1);
            if(DB::query("UPDATE web_owner SET ThirdLogo='$ThirdLogo1' WHERE oid = '1'")){ echo '';}else{ $z++;}
    }}
        
        
     echo $z;   
        
    }
    
    
}


