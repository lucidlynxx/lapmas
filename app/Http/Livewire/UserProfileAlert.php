<?php

namespace App\Http\Livewire;

use App\Models\Report;
use App\Models\User;
use Livewire\Component;

class UserProfileAlert extends Component
{
    public $userId;

    public function render()
    {
        return view('livewire.user-profile-alert');
    }

    public function destroy($userId)
    {
        $dataUser = Report::where('user_id', $userId)->get();
        Report::destroy($dataUser);

        User::find($userId)->delete();

        return redirect('/');;
    }
}
