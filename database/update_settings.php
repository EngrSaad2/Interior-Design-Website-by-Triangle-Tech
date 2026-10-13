<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\SiteSetting;
use App\Models\Faq;

$waUrl = 'https://wa.me/8801904654712';
$phone = '+8801904654712';
$phoneDisplay = '01904 654 712';

SiteSetting::updateOrCreate(['key' => 'phone'], ['value' => $phone]);
SiteSetting::updateOrCreate(['key' => 'phone_display'], ['value' => $phoneDisplay]);
SiteSetting::updateOrCreate(['key' => 'factory_phone'], ['value' => $phone]);
SiteSetting::updateOrCreate(['key' => 'whatsapp'], ['value' => $waUrl]);
SiteSetting::updateOrCreate(['key' => 'whatsapp_number'], ['value' => $phone]);
SiteSetting::updateOrCreate(['key' => 'facebook'], ['value' => $waUrl]);
SiteSetting::updateOrCreate(['key' => 'youtube'], ['value' => $waUrl]);
SiteSetting::updateOrCreate(['key' => 'linkedin'], ['value' => $waUrl]);
SiteSetting::updateOrCreate(['key' => 'pinterest'], ['value' => $waUrl]);
SiteSetting::updateOrCreate(['key' => 'messenger'], ['value' => $waUrl]);
SiteSetting::updateOrCreate(['key' => 'company_name'], ['value' => 'Triangle Interior Design']);
SiteSetting::updateOrCreate(['key' => 'email'], ['value' => 'info@triangleinterior.com']);
SiteSetting::updateOrCreate(['key' => 'developer_credit'], ['value' => 'Developed by Engr Saad']);
SiteSetting::updateOrCreate(['key' => 'developer_url'], ['value' => 'https://engr-saad.com']);

// Also update FAQs answers
foreach (Faq::all() as $faq) {
    $faq->answer = str_replace(
        ['+8801810536303', '01810536303', '01810 536 303', '01633033033', '+8801633033033', '01633 033 033'],
        [$phone, '01904654712', $phoneDisplay, '01904654712', $phone, $phoneDisplay],
        $faq->answer
    );
    $faq->save();
}

echo "Database settings and FAQ social media links updated to $waUrl successfully.\n";
