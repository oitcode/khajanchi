<?php

namespace App\Http\Livewire\Team\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

use App\TeamMemberAppointmentAvailability;

class TeamMemberAddAvailability extends Component
{
    public $teamMember;

    public $available_day;
    public $start_time;
    public $end_time;

    public function render()
    {
        return view('livewire.team.dashboard.team-member-add-availability');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'available_day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $validatedData['team_member_id'] = $this->teamMember->team_member_id;
        $validatedData['day'] = $validatedData['available_day'];
        $validatedData['start_time'] = $validatedData['start_time'] . ':00:00';
        $validatedData['end_time'] = $validatedData['end_time'] . ':00:00';

        TeamMemberAppointmentAvailability::create($validatedData);

        $this->resetInputFields();

        session()->flash('message', 'Appointment availability created');
        $this->emit('addAvailabilityCompleted');
    }

    public function resetInputFields()
    {
        $this->available_day = '';
        $this->start_time = '';
        $this->end_time = '';
    }
}
