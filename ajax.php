<?php

require 'db.php';

if (!isset($_POST['short']) && empty($_POST['short'])) {
    exit();
}

$query = $db->from('url')
            ->where('short',$_POST['short'])
            ->first();

if ($query) {
    echo $query['url'];
    $update = $db->update('url')
                 ->where('short',$query['short'])
                 ->set([
                     'view_url' => $query['view_url'] + 1
                 ]);
}