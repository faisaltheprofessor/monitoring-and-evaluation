<?php

namespace App\Http\Livewire;

use App\MonthlyProgress;
use Livewire\Component;

class ProgressDetails extends Component
{
    public function render()
    {
        $progress = MonthlyProgress::groupBy('activity_id')->get();
        return view('livewire.progress-details', compact('progress'));
    }
}

