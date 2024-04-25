<?php

use Telegram\Bot\FileUpload\InputFile;
use Telegram\Bot\Laravel\Facades\Telegram;
use Illuminate\Support\Facades\Route;


if (!function_exists('set_active')) {
    function set_active($uri)
    {
        if (request()->segment(2) == str_replace("/", "", $uri)) {
            return 'active';
        }
    }
}

if (!function_exists('is_active')) {
    function is_active($uri)
    {
        if (is_array($uri)) {
            foreach ($uri as $u) {
                if (Route::is($u)) {
                    return 'active';
                }
            }
        } else {
            if (Route::is($uri)) {
                return 'active';
            }
        }
    }
}

if (!function_exists('is_show')) {
    function is_show($uri)
    {
        if (is_array($uri)) {
            foreach ($uri as $u) {
                if (Route::is($u)) {
                    return 'show';
                }
            }
        } else {
            if (Route::is($uri)) {
                return 'show';
            }
        }
    }
}

function setting_web()
{
    $setting = DB::table('setting_apps')->first();
    return $setting;
}

function notifTele($params, $type)
{
    if ($type == 'create_wo') {
        $text = "<b>✅ New WO No. $params->wo_number ✅</b>\n\n"
            . "<b>Filed Date : $params->filed_date</b>\n"
            . "<b>Type Wo : $params->type_wo</b>\n"
            . "<b>Category Wo : $params->category_wo</b>\n"
            . "<b>Created By : Admin</b>\n";
    } else if ($type == 'delete_wo') {
        $text = "<b>❌ WO No. $params->wo_number has been removed ❌</b>\n\n"
            . "<b>Deleted By : Admin</b>\n";
    }

    Telegram::sendMessage([
        'chat_id' => env('TELEGRAM_CHANNEL_ID', ''),
        'parse_mode' => 'HTML',
        'text' => $text
    ]);
}
