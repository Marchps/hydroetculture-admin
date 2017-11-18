<?php
require('connect.php');
$stmt = $db->prepare('SELECT * FROM tbl WHERE id = :id');
    $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
    $result = $stmt->execute();
?>