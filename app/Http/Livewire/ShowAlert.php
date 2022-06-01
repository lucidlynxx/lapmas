<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Report;
use Illuminate\Support\Facades\Storage;

class ShowAlert extends Component
{
    public $reportId;

    public function render()
    {
        return view('livewire.show-alert');
    }

    public function destroy($reportId)
    {
        $fileGambar = Report::where('id', $reportId)->first();

        if ($fileGambar->image) {
            Storage::delete($fileGambar->image);
        }

        Report::find($reportId)->delete();

        return redirect('/dashboard/reports');;
    }
}
