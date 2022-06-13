<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Message;

class MessageAlert extends Component
{
    public $messageId;

    public function render()
    {
        return view('livewire.message-alert');
    }

    public function destroy($messageId)
    {
        Message::find($messageId)->delete();

        return redirect('/dashboard/messages');
    }
}
