<?php

$db = \Config\Database::connect();

$user = $db->table('user')
    ->where('id', 5)
    ->get()
    ->getResultArray()[0];

header("Content-type: " . $user['pp_mime_type']);
echo $user["profile_picture"];
?>