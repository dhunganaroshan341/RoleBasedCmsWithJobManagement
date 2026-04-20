<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Closure;

class TrainingSection extends Component
{
    public $videos;

    public function __construct($videos = null)
    {
        $this->videos = $videos;
    }

    public function render(): View|Closure|string
    {
        return view('components.training-section');
    }
}
