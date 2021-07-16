<?php
$ini = parse_ini_file(__DIR__ . '/../system-configuration.ini');

return [
    'adminEmail' => 'admin@mutu-bimas.test',
    'senderEmail' => 'noreply@mutu-bimas.test',
    'senderName' => 'Mutu Bimas mailer',
    'institusi' => $ini['institusi'],
    'nama_sistem' => $ini['nama_sistem'],
    'url_institusi' => $ini['url_institusi'],
    'author' => $ini['author'],
    'url_author' => $ini['url_author'],
    'bsVersion' => '4.x',
    'user.passwordResetTokenExpire' => 3600,
    'user.passwordMinLength' => 8,
];
