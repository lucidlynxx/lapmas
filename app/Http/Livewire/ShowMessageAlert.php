<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Message;

class ShowMessageAlert extends Component
{
    public $messageId;

    public function render()
    {
        return view('livewire.show-message-alert');
    }

    public function destroy($messageId)
    {
        Message::find($messageId)->delete();

        return redirect('/dashboard/messages');
    }
}
