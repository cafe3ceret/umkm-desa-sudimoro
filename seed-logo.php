<?php

// Quick script to seed logo from public/images/logo-boyolali.png into storage and update DB
require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\SiteSetting;
use Illuminate\Support\Facades\Storage;

$srcFile = public_path('images/logo-boyolali.png');
if (!file_exists($srcFile)) {
    echo "Source logo not found at $srcFile\n";
    echo "Please place the Boyolali logo at: public/images/logo-boyolali.png\n";
    exit(1);
}

// Copy to storage
$destPath = 'logos/logo-boyolali.png';
Storage::disk('public')->makeDirectory('logos');
Storage::disk('public')->put($destPath, file_get_contents($srcFile));

// Update DB
$setting = SiteSetting::first();
if ($setting) {
    $setting->update(['logo' => $destPath]);
    echo "Logo updated to: $destPath\n";
} else {
    echo "No settings record found — please run php artisan db:seed first\n";
}
