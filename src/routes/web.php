<?php

// use Webiver\LaravelPaytabs\Controllers\LaravelPaytabsController;
use Illuminate\Support\Facades\Route;
use Webiver\LaravelPaytabs\Controllers\LaravelPaytabsController;

Route::get('paytabs', LaravelPaytabsController::class);
