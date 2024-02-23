<?php

namespace App\View\Components\NewDesign;

use App\Models\Offer;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OffersSidebarBanner extends Component
{
    public function render(): View
    {
        $offers = Offer::all();
        return view('components.new-design.offers-sidebar-banner', compact('offers'));
    }
}
