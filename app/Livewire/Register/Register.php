<?php

namespace App\Livewire\Register;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class Register extends Component
{
    public $name, $email, $password, $Cpassword, $roles = [];
    public function render()
    {
        $allRoles = Role::pluck('name', 'name')->all();
        return view('livewire.register.register', compact('allRoles'));
    }

    public function insert() {
        if (Gate::allows('user.create')) {
            $validated = $this->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8|same:Cpassword',
                'roles' => 'required',
            ]);

            $done = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'role' => 1,
                'created_at' => Carbon::now(),
            ]);

            $done->syncRoles($this->roles);

            if($done){

                $this->reset();
                $this->dispatch('swal', [
                    'title' => 'User Added',
                    'type' => "success",
                    'text' => 'You do not have permission to do this.',
                ]);
            }
        }else{
            $this->dispatch('swal', [
                'title' => 'Unauthorize',
                'type' => "error",
            ]);
        }
    }
}
