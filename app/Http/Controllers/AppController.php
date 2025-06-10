<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//related models imports
use App\Models\Group;
use App\Models\Player;
use Illuminate\Support\Facades\Auth;
use App\Models\PlayerGroup;
use App\Models\Invite;

class AppController extends Controller
{
    public function useInviteCode(Request $request)
    {
        $inviteCode = $request->input('invite_code');

        if (!$inviteCode) {
            return redirect()->back()->withErrors(['invite_code' => 'Invite code is required.']);
        }

        // Here you would typically validate the invite code and perform the necessary actions
        // For example, you might check if the invite code exists in the database
        $invite = Invite::where('code', $inviteCode)->first();

        if (!$invite) {
            return redirect()->back()->withErrors(['invite_code' => 'Invalid invite code.']);
        }

        // If the invite code is valid, you can proceed with the desired action
        // For example, you might add the user to the group associated with the invite
        $player = Player::where('user_id', Auth::id())->first();

        if (!$player) {
            return redirect()->back()->withErrors(['player' => 'Player not found.']);
        }

        PlayerGroup::create([
            'player_id' => $player->id,
            'group_id' => $invite->group_id,
        ]);

        return redirect()->route('groups.index')->with('success', 'Invite code used successfully.');
    }

    public function exitGroup(Request $request)
    {
        $groupId = $request->input('group_id');
        $player = Player::where('user_id', Auth::id())->first();

        if (!$player) {
            return redirect()->back()->withErrors(['player' => 'Player not found.']);
        }

        $playerGroup = PlayerGroup::where('player_id', $player->id)
            ->where('group_id', $groupId)
            ->first();

        if (!$playerGroup) {
            return redirect()->back()->withErrors(['group' => 'You are not a member of this group.']);
        }

        $playerGroup->delete();

        return redirect()->route('groups.index')->with('success', 'You have exited the group successfully.');
    }
    
}
