<?php

Route::prefix('{website}')->middleware(['customer', 'auth:customer', 'can:view,website'])->group(function () {
    Route::prefix('blog')->as('blog.')->group(function () {
        Route::prefix('posts')->as('posts.')->group(function () {
            Route::get('create', 'PostController@create')
                ->name('create');
            Route::post('store', 'PostController@store')
                ->name('store');
            Route::get('edit/{post}', 'PostController@edit')
                ->name('edit');
            Route::put('update/{post}', 'PostController@update')
                ->name('update');
        });
    });
});
