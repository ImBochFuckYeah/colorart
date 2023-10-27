<?php
session_start();
function getMyUrl(){
    $protocol = (!empty($_SERVER['HTTPS']) && (strtolower($_SERVER['HTTPS']) == 'on' || $_SERVER['HTTPS'] == '1')) ? 'https://' : 'http://';
    $server = $_SERVER['SERVER_NAME'];
    $port = $_SERVER['SERVER_PORT'] ? ':'.$_SERVER['SERVER_PORT'] : '';
    return $protocol.$server.$port;
}

$server = getMyUrl();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php echo "<script>var server = '$server';</script>"; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ColorArt</title>
    <link rel="stylesheet" href="<?php $server?>/colorart/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php $server?>/colorart/assets/css/global.css">
    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.6/b-2.4.2/datatables.min.css" rel="stylesheet">
</head>
<body>
    <div class="spinner-overlay d-none" id="spinnerOverlay">
        <div class="spinner"></div>
    </div>