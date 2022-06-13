<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Report;
use Illuminate\Support\Facades\Storage;

class ConfirmAlert extends Component
{
    public $reportId;

    public function render()
    {
        return view('livewire.confirm-alert');
    }

    public function destroy($reportId)
    {
        $fileGambar = Report::where('id', $reportId)->first();

        if ($fileGambar->image) {
            Storage::delete($fileGambar->image);
        }

        Report::find($reportId)->delete();

        return redirect('/dashboard/reports');
    }
}
