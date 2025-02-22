<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Water;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Homepage extends Component
{
    public function render()
    {
        $users = User::with(['waters'])
            ->where('enabled', true)
            ->orderByDesc(DB::raw('COALESCE((SELECT SUM(amount) FROM waters WHERE user_id = users.id AND date = "' . now()->format('Y-m-d') . '"), 0)'))
            ->get();
        $sum_water = Water::where('date', now()->format('Y-m-d'))->sum('amount');

        return view('livewire.homepage')->with([
            'users' => $users,
            'sum_water' => $sum_water,
        ]);
    }

    public function add($user_id)
    {
        $user = User::with(['waters'])->findOrFail($user_id);
        $water = $user->waters->where('date', now()->format('Y-m-d').' 00:00:00')->first();

        if($water){
            $water->update([
                'amount' => $water->amount + 0.1,
            ]);
        } else {
            $user->waters()->create([
                'date' => now()->format('Y-m-d'),
                'amount' => 0.1,
            ]);
        }
    }
}
