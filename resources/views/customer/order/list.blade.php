@extends('customer.master')

@section('content')
  <div class="body flex-grow-1">
    <div class="container-lg px-4">

      <div class="card mb-4">
        <div class="card-body">
          <div class="example">

            <div class="tab-content rounded-bottom">
              <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1002">

                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Invoice</th>
                      <th scope="col">Customer Info</th>
                      <th scope="col">Product Info</th>
                      <th scope="col">Delivery Charge</th>
                      <th scope="col">Total Price</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach ($orders as $order)
                      <tr>
                        <th scope="row">1</th>

                        <td>{{ $order->invoice_number }}</td>

                        <td>
                          Name: {{ $order->name }} <br>
                          Phone: {{ $order->phone }} <br>
                          Address: {{ $order->address }}
                        </td>

                        <td>
                          <img src="https://placehold.co/100X100" height="100" width="100"> <br>
                          Product Name: Electronics <br>
                          Color: red <br>
                          Size: small <br>

                          <img src="https://placehold.co/100X100" height="100" width="100"><br>
                          Product Name: Electronics<br>
                          Color: red <br>
                          Size: small <br>
                        </td>

                        <td>{{ $order->charge }}</td>

                        <td>{{ $order->price }}</td>

                        <!-- Dynamic Status Badge Color -->
                        <td style="padding-left: 0px;">
                          @php
                            $badgeColor = [
                              'pending' => 'text-warning',
                              'confirmed' => 'text-info',
                              'processing' => 'text-primary',
                              'shipped' => 'text-info',
                              'delivered' => 'text-success',
                              'cancelled' => 'text-danger',
                              'returned' => 'text-secondary',
                            ][$order->status] ?? 'text-secondary';
                          @endphp

                          <span class="badge {{ $badgeColor }}">
                            {{ ucfirst($order->status) }}
                          </span>
                        </td>

                        <!-- Order Action -->
                        <td>
                          @if ($order->status == 'pending' || $order->status == 'confirmed')
                            <a href="#" class="btn btn-sm btn-danger px-3 py-1">
                              Cancel
                            </a>
                          @else
                            @php
                              $buttonColor = [
                                'processing' => 'btn-primary',
                                'shipped' => 'btn-info',
                                'delivered' => 'btn-success',
                                'cancelled' => 'btn-danger',
                                'returned' => 'btn-secondary',
                              ][$order->status] ?? 'btn-secondary';
                            @endphp

                            <a class="btn btn-sm {{ $buttonColor }} px-2 py-1">
                              {{ ucfirst($order->status) }}
                            </a>
                          @endif
                        </td>

                      </tr>
                    @endforeach
                  </tbody>
                </table>

              </div>
            </div>

          </div>
        </div>
      </div>

    </div>
  </div>
@endsection