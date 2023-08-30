<div>
  @if (false)
  <div class="form-group">
    <label for="">Allows appointments</label>
    <select class="form-control" wire:model.defer="allows_appointments">
      <option value="---">---</option>
      <option value="yes">Yes</option>
      <option value="no">No</option>
    </select>
    @error ('allows_appointments') <span class="text-danger">{{ $message }}</span> @enderror
  </div>
  @endif

  <div class="bg-white border">
    <h2 class="h4 p-3 mb-0 border">
      Availability
    </h2>
    @if ($availabilities != null && count($availabilities))
      @foreach ($availabilities as $availability)
        <div class="row p-2 border" style="margin: auto;">
          <div class="col-md-6">
            <span class="font-weight-bold">
              {{ ucfirst($availability->day) }}
            </span>
          </div>
          <div class="col-md-6">
            <i class="fas fa-clock text-success mr-2"></i>
            {{ $availability->start_time}}
            -
            {{ $availability->end_time}}
          </div>
        </div>
      @endforeach
    @else
      <div class="text-muted p-3">
        No availabilities
      </div>
    @endif

  </div>

  @if (! $modes['addAvailabilityMode'])
    <div class="bg-white-rm p-2 border-rm mb-3">
      <button class="btn btn-primary badge-pill" wire:click="enterMode('addAvailabilityMode')">
        <i class="fas fa-plus-circle mr-1"></i>
        Add availablility
      </button>
    </div>
  @endif

  @if ($modes['addAvailabilityMode'])
    <div class="my-3">
      @livewire ('team.dashboard.team-member-add-availability', ['teamMember' => $teamMember,])
    </div>
  @endif

</div>
