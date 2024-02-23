<?php

namespace App\View\Components\NewDesign;

use App\Models\Auctions;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CompanyBanner extends Component
{
    public function render(): View
    {
        $auctions = Auctions::with('acutionItems')->orderBy('dateOfStarting', 'desc')->take(30)->get();

        return view('components.new-design.company-banner', [
            'auctions' => $auctions
        ]);
    }
}
