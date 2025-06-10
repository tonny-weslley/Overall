<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Models\Group;
use App\Models\Player;
use Illuminate\Support\Facades\Auth;
use App\Models\PlayerGroup;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $player = Player::where('user_id', Auth::id())->first();

    if (!$player) {
        return redirect()->back()->withErrors(['player' => 'Player not found.']);
    }

    $player_groups = PlayerGroup::where('player_id', $player->id)->with('group')->get();

    // Extrai os grupos diretamente
    $groups = $player_groups->pluck('group');

    return inertia('Groups/Index', [
        'groups' => $groups,
    ]);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Groups/Create', [
            'group' => new Group(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGroupRequest $request){

        $group = Group::create($request->validated());
        $player = Player::where('user_id', Auth::id())->first();
        if (!$player) {
            return redirect()->back()->withErrors(['player' => 'Player not found.']);
        }
        PlayerGroup::create([
            'player_id' => $player->id,
            'group_id' => $group->id,
            'is_admin' => true,
        ]);

        return redirect()->route('groups.show', $group)->with('success', 'Group created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGroupRequest $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        //
    }
}
