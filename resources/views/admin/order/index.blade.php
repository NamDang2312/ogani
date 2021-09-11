@extends('layouts.layoutAdmin');
@section('tittle', 'Order List')
@section('css')
    <style>

    </style>
@stop
@section('main')

    <div class="container">
        <div class="row">
            <div class="col-12  text-center text-info">
                <h2>List Order</h2>
            </div>
        </div>
        <table class="table table-bordered" id="order-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Phone </th>
                    <th>Address</th>
                    <th>Note</th>
                    <th>Status</th>
                    <th>Account</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $model)
                    <tr>
                        <td>{{ $model->id }}</td>
                        <td>{{ $model->name }}</td>
                        <td>{{ $model->phone }}</td>
                        <td>{{ $model->address }}</td>
                        <td>{{ $model->note }}</td>
                        @switch($model->STATUS)
                            @case(0)
                                <td class=confirmed> <span class="badge badge-danger">Cancel</span></td>
                            @break
                            @case(1)
                                <td class=confirmed> <span class="badge badge-warning">Wait for Confirm</span></td>
                            @break
                            @case(2)
                                <td class=confirmed> <span class="badge badge-info">Confirmed</span></td>
                            @break
                            @case(4)
                            <td class=confirmed> <span class="badge badge-success">Order Completed</span></td>
                        @break
                            @default
                            <td class=confirmed>Default</td>
                            @break
                        @endswitch
                 
                        <td>{{ $model->account_id }}</td>
                        <td>{{ number_format($model->total) }} đ</td>
                        <td class="text-center">
                            <a href="{{ route('order.show', $model->id) }}" class="btn btn-info show"><i
                                    class="bi bi-eye-fill"></i></a>
                            <a href="{{ route('order.edit', $model->id) }}" class="btn btn-success edit"><i
                                    class="fas fa-check-circle"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Order detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send message</button>
                </div>
            </div>

        </div>
    </div>

@stop
@section('js')
    <script>
        $(document).ready(function() {
            let table = $('#order-table').DataTable();
            table.order([0,'desc']).draw();
            $('.show').on("click", function(event) {
                event.preventDefault();
                let href = $(this).attr('href');
                $.ajax({
                    url: href,
                    type: "get",
                    success: function(data) {
                        $('.modal-body').html(data.view)
                        $('.modal').modal()
                    }
                })
            })
            $('.edit').on("click", function(event) {
                    let confirmed = $(this).parent().parent().children().eq(4);
                    console.log(confirmed);
                    event.preventDefault();
                    let href = $(this).attr('href')
                    $.ajax({
                        url: href,
                        type:'Get',
                        success:function(data){
                            confirmed.empty;
                            confirmed.html(' <span class="badge badge-info">Confirmed</span>')
                            toastr.success(data.success);
                            location.reload();
                        }
                    })
            })

        })
    </script>

@stop
