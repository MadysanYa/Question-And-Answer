<?php
    // session_start();
    //qrimage = $_REQUEST['qrimage'];

    // $terminal = $_SESSION['terminal'];
    $img = $_POST['img'];
    // $amount = $_POST['amount'];
    // $billnumber = $_POST['billnumber'];
    // $service = $_POST['service'];
    // $terminalLabel = $_POST['terminalLabel'];

    try{

    $img = str_replace('data:image/png;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    $data = base64_decode($img);
    $file = "images/indication" . '/mapimg.png';
    // $file = "img/terminal" . $terminal . '/qrcode.png';
    $success = file_put_contents($file, $data);

    // $am = file_put_contents("img/terminal" . $terminal ."/desc.txt" ,$amount . "|" . $billnumber . "|" . $service . "|" . $terminalLabel);
    echo "success";

    }
    catch(Exception $e){
    echo "fail";
    }

?>