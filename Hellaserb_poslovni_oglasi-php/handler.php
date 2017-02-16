<?php
$a=array();
if(isset($_FILES['file'])) {
    for($i=0; $i<count($_FILES['file']['name']); $i++){
        $target_path = "rs/images/";
        $ext = $_FILES['file']['name'][$i];
        $putanja='hellaserb';
        $name=$putanja . (uniqid()) . "_" . $ext;
        $target_path = $target_path . $name;
        $a[$i]=$name;
        if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {

        } else{
            echo "There was an error uploading the file, please try again! <br />";
        }
    }
    echo json_encode($a);
}
?>