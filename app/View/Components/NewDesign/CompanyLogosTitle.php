<?php

namespace App\View\Components\NewDesign;

use App\Models\agents;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CompanyLogosTitle extends Component
{
    public function render(): View
    {
        return view('components.new-design.company-logos-title', [
            'agents' => agents::limit(5)->get()
        ]);
    }
}
