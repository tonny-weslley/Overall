<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Models\Group;
use App\Models\Invite;
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

    $player_groups = PlayerGroup::where('player_id', $player->id)
        ->whereHas('group', function ($query) {
            $query->whereNull('deleted_at');
        })
        ->with('group')
        ->get();

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
        do {
            $code = rand(1000000000, 9999999999);
        } while (Invite::where('code', $code)->exists());

        Invite::create([
            'code' => $code,
            'group_id' => $group->id,
        ]);

        return redirect()->route('groups.index')->with('success', 'Group created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        $players_groups = PlayerGroup::where('group_id', $group->id)->with('player.user')->get();

        // Map players and add is_admin property
        $players = $players_groups->map(function ($playerGroup) {
            $player = $playerGroup->player;
            $player->is_admin = $playerGroup->is_admin;
            return $player;
        });

        $invite_code = Invite::where('group_id', $group->id)->first();
  

        return inertia('Groups/Show', [
            'group' => $group,
            'players' => $players,
            'invite_code' => $invite_code,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        return inertia('Groups/Edit', [
            'group' => $group,
        ]);
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
        $group->delete();

        return redirect()->route('groups.index')->with('success', 'Group deleted successfully.');
    }

    
}
