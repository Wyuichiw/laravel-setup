<?php
$expiresSeconds = 86400; // 1 день
header("Content-Type: text/css; charset=UTF-8");
header("Cache-Control: public, max-age=" . $expiresSeconds);
header("Expires: " . gmdate("D, d M Y H:i:s", time() + $expiresSeconds) . " GMT");

echo "/* CSS файл успішно віддано з заголовками кешування на 1 день */\n";
echo "body { background-color: #e3f2fd; font-family: Arial, sans-serif; margin: 40px; }\n";
echo "h1 { color: #0d47a1; }\n";