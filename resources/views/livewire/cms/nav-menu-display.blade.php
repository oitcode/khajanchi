<div class="p-2 bg-white border">
    <h2 class="text-secondary">
      Nav Menu
    </h2>

    {{ $cmsNavMenu->name }}

    <div class="my-3">
      <button class="btn border" wire:click="enterMode('createNavMenuItem')">
        <i class="fas fa-plus-circle mr-2"></i>
      </button>
    </div>

    @if (count($cmsNavMenu->cmsNavMenuItems) > 0)
      <div class="table-responsive">
        <table class="table">

          <thead>
            <th>
            </th>
            <th>Name</th>
            <th>Webpage</th>
            <th>Action</th>
          </thead>

          <tbody>
            @foreach ($cmsNavMenu->cmsNavMenuItems()->orderBy('order', 'asc')->get() as $cmsNavMenuItem)
              <tr>
                <td>
                  <button class="btn border rounded-circle p-2" wire:click="moveUp({{ $cmsNavMenuItem }})">
                    <i class="fas fa-arrow-up"></i>
                  </button>
                  <button class="btn border rounded-circle p-2" wire:click="moveDown({{ $cmsNavMenuItem }})">
                    <i class="fas fa-arrow-down"></i>
                  </button>
                </td>
                <td>
                  <div>
                    {{ $cmsNavMenuItem->name }}
                  </div>
                  @if ($cmsNavMenuItem->cmsNavMenuDropdownItems)
                    <div class="my-4">
                      @foreach ($cmsNavMenuItem->cmsNavMenuDropdownItems as $cmsNavMenuDropdownItem)
                        {{ $cmsNavMenuDropdownItem->name }}
                        <br />
                      @endforeach
                    </div>
                  @endif
                </td>
                <td>
                  @if ($cmsNavMenuItem->webpage)
                    {{ $cmsNavMenuItem->webpage->name }}
                  @else
                    NA
                  @endif
                </td>
                <td>
                  <button class="btn p-2 border rounded-circle">
                    <i class="fas fa-pencil-alt"></i>
                  </button>
                  @if ($cmsNavMenuItem->type == 'dropdown')
                    <button class="btn p-2 border rounded-circle" wire:click="editDropdown({{ $cmsNavMenuItem }})">
                      <i class="fas fa-plus-circle"></i>
                    </button>
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>

        </table>
      </div>
    @else
      <div class="text-secondary">
        No nav menu items
      </div>
    @endif

    @if ($modes['createNavMenuItem'])
      @livewire ('cms.nav-menu-display-nav-menu-item-create', ['cmsNavMenu' => $cmsNavMenu,])
    @elseif ($modes['createNavMenuDropdownItem'])
      @livewire ('cms.nav-menu-display-nav-menu-dropdown-item-create', ['cmsNavMenuItem' => $editingDropdown,])
    @endif
</div>
