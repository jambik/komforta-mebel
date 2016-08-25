<?php

namespace App\Http\Controllers;

use App\Category;
use App\Settings;

class FrontendController extends Controller
{
    public function __construct()
    {
        /* ---------------------------------------------------------------------------------------------------------- */
        /* Categories                                                                                                 */
        /* ---------------------------------------------------------------------------------------------------------- */
        $categories = Category::categoriesWithProperties();
        view()->share('categories', $categories);


        /* ---------------------------------------------------------------------------------------------------------- */
        /* Settings                                                                                                   */
        /* ---------------------------------------------------------------------------------------------------------- */
        $settings= Settings::find(1);
        view()->share('settings', $settings);
    }
}
