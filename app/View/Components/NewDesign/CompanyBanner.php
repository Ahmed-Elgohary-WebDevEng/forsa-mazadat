<?php

namespace App\View\Components\NewDesign;

use App\Models\agents;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CompanyBanner extends Component
{
    public function render(): View
    {
        return view('components.new-design.company-banner', [
            'agents' => agents::distinct()->get()
        ]);
    }
}
