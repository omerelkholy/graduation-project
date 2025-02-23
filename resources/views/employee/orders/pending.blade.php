
@extends('layouts.employee')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-center">Pending Orders</h1>
    {{-- <a href="{{ route('employee.orders.create') }}" class="btn btn-primary">Add Delivery</a> --}}
    <div id="statusMessage" class="alert d-none"></div>

    <div class="table-responsive">
        <table class="table table-hover table-bordered text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Client Name</th>
                    <th>Region</th>
                    <th>Total Weight</th>
                    <th>Total Price</th>
                    <th>Region Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->client_name }}</td>
                    <td>{{ optional($order->region)->name ?? 'Unknown' }}</td>
                    <td>{{ $order->total_weight }}</td>
                    <td>{{ $order->total_price }} EGP</td>
                    <td>
                        @if($order->region && $order->region->status == 'not_active')
                            <span class="badge badge-danger">Inactive</span>
                        @else
                            <span class="badge badge-success">Active</span>
                        @endif
                    </td>
                    <td>
                        @if($order->region && $order->region->status == 'not_active')
                            <form action="{{ route('employee.activateRegion', $order->region->id) }}" method="POST" style="display:inline;">
                                @csrf

                                <button type="button" class="btn btn-sm btn-primary" onclick="showNotActiveAlert()">Assign</button>

                            </form>
                        @else
                            @if($order->region && $order->region->status == 'active')
                                <button class="btn btn-sm btn-primary assign-btn" data-order-id="{{ $order->id }}">Assign</button>
                            @endif
                        @endif

                        <form action="{{ route('employee.rejectOrder', $order->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger" onclick="confirmReject(event)">Reject</button>
                        </form>

                        <script>
                            function confirmReject(event) {
                                event.preventDefault();
                                Swal.fire({
                                    title: 'You are sure',
                                    text: "Do you want to reject this Order",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Yes, Reject',
                                    cancelButtonText: 'No'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        event.target.closest('form').submit();
                                    }
                                });
                            }

                        </script>
                        <a href="{{ route('employee.orders.show', $order->id) }}" class="btn btn-sm btn-info">Show</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="assignModal" tabindex="-1" aria-labelledby="assignModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="assignModalLabel">Assign Delivery</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered text-center">
                        <thead class="thead-light">
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="delegates-body">
                            <!-- سيتم ملء هذا الجزء عبر AJAX -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

$(document).ready(function() {
    let selectedOrderId;

    $('.assign-btn').click(function() {
        selectedOrderId = $(this).data('order-id');


        $.ajax({
            url: `/employee/orders/${selectedOrderId}/delegates`,
            method: 'GET',
            success: function(response) {
                console.log(response);
                $('#assignModal').modal('show');
                $('#delegates-body').empty();


                response.forEach(function(delegate) {
                    $('#delegates-body').append(`
                        <tr>
                            <td>${delegate.name}</td>
                            <td>${delegate.phone?? "no phone added" }</td>
                            <td>
                                <button class="btn btn-sm btn-success choose-delegate" data-delegate-id="${delegate.id}">
                                    Choose
                                </button>
                            </td>
                        </tr>
                    `);
                });
            },
            error: function(xhr) {
                console.error(xhr);
                alert('An error occurred while fetching delegate data');
            }
        });
    });


    $(document).on('click', '.choose-delegate', function() {
        const delegateId = $(this).data('delegate-id');

        $.ajax({
            url: `/employee/orders/${selectedOrderId}/assign-delegate/${delegateId}`,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#assignModal').modal('hide');


                Swal.fire({
                    icon: 'success',
                    title: 'Assigned Successfully!',
                    text: 'The delivery has been assigned to this order',
                    confirmButtonText: 'OK'
                });


                // location.reload();
            },
            error: function(xhr) {
                if (xhr.status === 400 && xhr.responseJSON.error) {

                    Swal.fire({
                        icon: 'warning',
                        title: '',
                        text: xhr.responseJSON.error,
                        confirmButtonText: 'OK'
                    });
                } else {

                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'An error occurred while assigning the delivery',
                        confirmButtonText: 'OK'
                    });
                }
            }
        });
    });

        function showMessage(message, type) {
            $('#statusMessage').removeClass('d-none alert-success alert-danger').addClass(`alert alert-${type}`).text(message).fadeIn().delay(3000).fadeOut();
        }
    });

</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function showNotActiveAlert() {
        Swal.fire({
            icon: 'warning',
            title: 'Region Not Active',
            text: 'This region is currently not active!',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        });
    }
</script>


@endsection


