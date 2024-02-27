<?php

$json = json_encode([
    0 => 'Hello, World!',
    1 => 'Hello, World!',
], JSON_UNESCAPED_UNICODE);

echo $json;
exit;