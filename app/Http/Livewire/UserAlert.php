<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Report;

class UserAlert extends Component
{
    public $userId;

    public function render()
    {
        return view('livewire.user-alert');
    }

    public function destroy($userId)
    {
        $dataUser = Report::where('user_id', $userId)->get();
        Report::destroy($dataUser);

        User::find($userId)->delete();

        return redirect('/dashboard/users');;
    }
}
