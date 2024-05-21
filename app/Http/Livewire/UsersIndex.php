<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersIndex extends Component
{
    public function render()
    {
        $users = User::all();
        return view('livewire.users-index', compact('users'));
    }
}
