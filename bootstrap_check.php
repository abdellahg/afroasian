<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';

echo "Bootstrap OK\n";

try {
    $kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
    echo "Kernel OK\n";
} catch (Throwable $e) {
    echo "Kernel error: ".$e->getMessage()."\n";
    echo $e->getTraceAsString();
    exit(1);
}

try {
    $kernel->call('list');
    echo "Artisan list OK\n";
} catch (Throwable $e) {
    echo "Artisan error: ".$e->getMessage()."\n";
    echo $e->getTraceAsString();
    exit(1);
}

exit(0);
