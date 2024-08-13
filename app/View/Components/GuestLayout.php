<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\View\Component;
use Illuminate\View\View;

class GuestLayout extends Component
{
    public function __construct(
        public $header = true
    ){
    }
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        $carts = Cache::get('cart_' . auth()->id()??0);
        FacadesView::share('carts', $carts??[]);
        return view('layouts.guest');
    }
}
