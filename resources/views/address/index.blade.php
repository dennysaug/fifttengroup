@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="btn-group float-right" role="group">
                            <a href="{{ route('address.create', $contact) }}" class="btn btn-success">Add new</a>
                        </div>
                        <h2>
                            {{ $contact->first_name }} {{ $contact->last_name }} | Address
                        </h2>

                    </div>

                    @if(isset($contact->address) && $contact->address->count())

                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Address</th>
                                    <th>Default</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($contact->address as $address)
                                    <tr>
                                        <td>{{ $address->id }}</td>
                                        <td>{{ $address->address }}</td>
                                        <td>{{ $address->default }}</td>
                                        <td>
                                            <a href="{{ route('address.edit', $address) }}"
                                               class="btn btn-primary ">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>



@endsection
