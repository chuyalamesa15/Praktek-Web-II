<?php

$page = $_GET['page'] ?? 'dashboard';

switch($page) {

    case 'barang':

        include 'pages/barang/index.php';

        break;

    default:

        include 'dashboard.php';

        break;
}
?>