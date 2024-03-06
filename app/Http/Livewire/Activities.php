<?php

namespace App\Http\Livewire;


use App\MonthlyProgress;
use Livewire\Component;

class Activities extends Component
{
    public function render()
    {
        $progress = MonthlyProgress::groupBy('activity_id')->get();
        return view('livewire.activities', compact('progress'));
    }


    public function update()
    {
        dd("Done");
    }
}
