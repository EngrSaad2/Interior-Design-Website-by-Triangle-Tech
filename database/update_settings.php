<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\SiteSetting;
use App\Models\Faq;

SiteSetting::updateOrCreate(['key' => 'phone'], ['value' => '+8801810536303']);
SiteSetting::updateOrCreate(['key' => 'phone_display'], ['value' => '01810 536 303']);
SiteSetting::updateOrCreate(['key' => 'whatsapp'], ['value' => 'https://wa.me/8801810536303']);
SiteSetting::updateOrCreate(['key' => 'whatsapp_number'], ['value' => '+8801810536303']);
SiteSetting::updateOrCreate(['key' => 'company_name'], ['value' => 'Triangle Interior Design']);
SiteSetting::updateOrCreate(['key' => 'email'], ['value' => 'info@triangleinterior.com']);
SiteSetting::updateOrCreate(['key' => 'developer_credit'], ['value' => 'Developed by Engr Saad']);
SiteSetting::updateOrCreate(['key' => 'developer_url'], ['value' => 'https://engr-saad.com']);

// Also update FAQs answers that had 01633033033
foreach (Faq::all() as $faq) {
    if (str_contains($faq->answer, '01633033033') || str_contains($faq->answer, '+8801633033033') || str_contains($faq->answer, '01633 033 033')) {
        $faq->answer = str_replace(
            ['+8801633033033', '01633033033', '01633 033 033'],
            ['+8801810536303', '01810536303', '01810 536 303'],
            $faq->answer
        );
        $faq->save();
    }
}

echo "Database settings and FAQ phone numbers updated to +8801810536303 successfully.\n";
