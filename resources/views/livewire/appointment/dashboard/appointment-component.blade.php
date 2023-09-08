<div>
  <div class="mb-3 p-2 d-none d-md-block bg-dark-rm">
  <x-toolbar-classic>
    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('listAppointmentMode')",
        'btnIconFaClass' => 'fas fa-list',
        'btnText' => 'List',
        'btnCheckMode' => 'listAppointmentMode',
    ])

    @if ($modes['displayAppointmentMode'])
      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "",
          'btnIconFaClass' => 'fas fa-circle',
          'btnText' => 'Appointment display',
          'btnCheckMode' => 'displayAppointmentMode',
      ])
    @endif

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "clearModes",
        'btnIconFaClass' => 'fas fa-eraser',
        'btnText' => 'Clear modes',
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

  @if ($modes['listAppointmentMode'])
    @livewire ('appointment.dashboard.appointment-list')
  @endif
</div>