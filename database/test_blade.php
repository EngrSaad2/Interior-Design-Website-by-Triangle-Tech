<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$str = '{"@@context": "https://schema.org"}';
echo \Illuminate\Support\Facades\Blade::compileString($str) . "\n";
