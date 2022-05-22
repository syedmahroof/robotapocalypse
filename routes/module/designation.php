<?php

use Illuminate\Support\Facades\Route;

Route::controller(DesignationController::class)->prefix('designation')->name('designation.')->group(function () {
    Route::get('list', 'list')->name("list");
    Route::get('add-designation', 'addDesignation')->name("add-designation");
    // Route::get('add-voice', 'addVoice')->name("add-voice");
    // Route::post('create-voice-post', 'postVoice')->name("post");
    // Route::any('get-all-voice', 'getVoice')->name("get-all-voice");
    // Route::post('delete', 'deleteVoice')->name("delete");
    // Route::get('quick-voice', 'sendQuickVoiceMail')->name('quick-voice');
    // Route::post('quick-voice-post', 'postQuickVoiceMail')->name('quick-voice-post');
    // Route::post('public-voice-post', 'postPublicVoiceMail')->name('public-voice-post');
});

