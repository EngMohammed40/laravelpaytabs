<?php
namespace Webiver\LaravelPaytabs\Controllers;

use Illuminate\Http\Request;
use Webiver\LaravelPaytabs\LaravelPaytabs;

class LaravelPaytabsController
{
    public function __invoke(LaravelPaytabs $LaravelPaytabs) {
        $quote = $LaravelPaytabs->justDoIt();
        return $quote;
    }
}
