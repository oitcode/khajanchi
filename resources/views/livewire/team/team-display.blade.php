<div class="p-3-rm">


    @if (false)
    {{-- Top flash cards --}}
    @if (! $modes['updateTeamMemberMode'])
    <div class="row mb-1">
      <div class="col-md-6">
        <div class="mb-4">
          @include ('partials.misc.glance-card', [
              'bsBgClass' => 'bg-white',
              'btnRoute' => '',
              'iconFaClass' => 'fas fa-users',
              'btnTextPrimary' => 'Team',
              'btnTextSecondary' => $team->name,
          ])
        </div>
      </div>

      <div class="col-md-6">
        <div class="mb-4">
          @include ('partials.misc.glance-card', [
              'bsBgClass' => 'bg-white',
              'btnRoute' => '',
              'iconFaClass' => 'fas fa-user-graduate',
              'btnTextPrimary' => 'Members',
              'btnTextSecondary' => count($team->teamMembers),
          ])
        </div>
      </div>
    </div>
    @else
      <div class="mb-3">
        Team > {{ $team->name }}
      </div>
    @endif
    @endif


    {{-- Tool bar --}}
    <x-toolbar-classic toolbarTitle="{{ $team->name }}">

      @if (! $modes['updateTeamMemberMode'])
        @include ('partials.dashboard.tool-bar-button-pill', [
            'btnClickMethod' => "enterMode('createTeamMemberMode')",
            'btnIconFaClass' => 'fas fa-plus-circle',
            'btnText' => 'Add team member',
            'btnCheckMode' => 'createTeamMemberMode',
        ])

        @include ('partials.dashboard.tool-bar-button-pill', [
            'btnClickMethod' => "enterMode('createTeamMembersFromCsvMode')",
            'btnIconFaClass' => 'fas fa-file',
            'btnText' => 'Upload from csv',
            'btnCheckMode' => 'createTeamMembersFromCsvMode',
        ])

        @include ('partials.dashboard.tool-bar-button-pill', [
            'btnClickMethod' => "enterMode('updateTeamMode')",
            'btnIconFaClass' => 'fas fa-pencil-alt',
            'btnText' => 'Update team',
            'btnCheckMode' => 'updateTeamMode',
        ])
      @else
        @include ('partials.dashboard.tool-bar-button-pill', [
            'btnClickMethod' => "",
            'btnIconFaClass' => 'fas fa-circle',
            'btnText' => 'Team member display',
            'btnCheckMode' => 'updateTeamMemberMode',
        ])

      @endif

      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "clearModes",
          'btnIconFaClass' => 'fas fa-times',
          'btnText' => '',
          'btnCheckMode' => '',
      ])

      @include ('partials.dashboard.spinner-button')

    </x-toolbar-classic>


    <!-- Flash message div -->
    @if (session()->has('message'))
      <div class="p-2">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <i class="fas fa-check-circle mr-3"></i>
          {{ session('message') }}
          <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
            <span class="text-danger" aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    @endif


    @if ($modes['createTeamMemberMode'])
      @livewire ('team.team-display-team-member-create', ['team' => $team,])
    @elseif ($modes['createTeamMembersFromCsvMode'])
      @livewire ('team.team-display-team-members-create-from-csv', ['team_id' => $team->team_id,])
    @elseif ($modes['updateTeamMode'])
      @livewire ('team.team-update', ['team' => $team,])
    @elseif ($modes['updateTeamMemberMode'])
      @livewire ('team.team-display-team-member-update', ['teamMember' => $updatingTeamMember,])
    @else
      {{-- Members --}}
      <div class="mt-5 mb-3">
        <h3 class="h4">
          Team members
        </h3>
      </div>


      <div>
        @if (false && $displayTeamName ?? true)
        <h3 class="my-4">
          {{ $team->name }}
        </h3>
        @endif
      
        <div class="row">
        
          @foreach ($team->teamMembers()->orderBy('position')->get() as $teamMember)
            <div class="col-md-3 mb-4">
              @include ('partials.team.person-display', ['person' => $teamMember,])
            </div>
          @endforeach
        </div>
      </div>

    @endif


</div>
