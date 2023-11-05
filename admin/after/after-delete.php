<?php

require_once '../../connection.php';

session_start();

if (empty($_SESSION['username'])) {
    header('Location: login.php');

    exit;
}


if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $after_query = "DELETE FROM after_therapy WHERE id=$id";
    $after_stmt = $conn->prepare($after_query);
    $after_stmt->execute();

    $_SESSION['message_delete'] = "Berhasil Menghapus";
    header('Location: ../after.php');
}
