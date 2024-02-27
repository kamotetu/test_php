<?php

$json = json_encode([
    0 => 'Hello, Beginner!',
    1 => 'Hello, Engineer!',
], JSON_FORCE_OBJECT);

echo $json;
exit;