<x-box-list title="Sale list">
  @if ($sales != null && count($sales) > 0)
    <div class="table-responsive">
      <table class="table table-sm table-hover">
        <thead>
          <tr class="text-secondary">
            <th>ID</th>
            <th>Date</th>
            <th>Customer</th>
            <th>Total</th>
            <th>Payment status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($sales as $sale)
            <tr>
              <td>
                {{ $sale->sale_id }}
              </td>
              <td>
                {{ $sale->sale_date }}
              </td>
              <td>
                <a href="" wire:click.prevent="$emit('displaySale', {{ $sale->sale_id }})">
                {{ $sale->customer->name }}
                </a>
              </td>
              <td>
                {{ $sale->getTotalAmount() }}
              </td>
              <td>
                @if (strtolower($feesInvoice->payment_status) === 'pending')
                  <span class="badge badge-danger badge-pill">
                    Pending
                  </span>
                @elseif (strtolower($feesInvoice->payment_status) === 'partially_paid')
                  <span class="badge badge-warning badge-pill">
                    Partially Paid
                  </span>
                @else
                  <span class="badge badge-secondary badge-pill">
                    {{ $feesInvoice->payment_status }}
                  </span>
                @endif
              </td>
              <td>
                <span class="btn btn-tool btn-sm" wire:click="">
                  <i class="fas fa-pencil-alt text-info"></i>
                </span>

                <span class="btn btn-tool btn-sm" wire:click="">
                  <i class="fas fa-trash text-danger"></i>
                </span>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @else
    <div class="text-secondary py-3 px-3">
      No sales.
    </div>
  @endif
</x-box-list>
