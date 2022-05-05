<?php
    Route::get('', ['as' => 'admin.dashboard', function () {
        return AdminSection::view('Dashboard');
    }]);

    Route::get('information', ['as' => 'admin.information', function () {
        //$content = 'Define your information here.';
        return AdminSection::view('Information');
    }]);
    //require __DIR__.'/auth.php';
