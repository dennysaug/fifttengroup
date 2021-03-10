@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="btn-group float-right" role="group">
                            <a href="{{ route('order.create') }}" class="btn btn-success">Add new</a>
                        </div>
                        <h2>
                            Order
                        </h2>

                    </div>
                    @if(isset($orders) && $orders->count())
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Contact</th>
                                    <th>Company</th>
                                    <th>Items</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->contact->first_name }} {{ $order->contact->last_name }} ({{ $order->contact->contactRole->name }})</td>
                                        <td>{{ $order->company->name }} ({{ $order->company->companyType->name }})</td>
                                        <td>{{ $order->total_quantity }}</td>
                                        <td>£ {{ $order->total_price }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                        <div>
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
