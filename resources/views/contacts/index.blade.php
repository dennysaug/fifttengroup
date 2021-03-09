@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="btn-group float-right" role="group">
                            <a href="{{ route('contacts.create') }}" class="btn btn-success">Add new</a>
                        </div>
                        <h2>
                            Contacts
                        </h2>

                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Company</th>
                                <th>Company Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->id }}</td>
                                    <td>{{ $contact->first_name }} {{ $contact->last_name }}</td>
                                    <td>{{ $contact->contactRole->name }}</td>
                                    <td>{{ $contact->company->name }} ({{ $contact->company->companyType->name }})</td>
                                    <td>{{ $contact->company->companyStatus->name }}</td>
                                    <td>
                                        <a href="{{ route('contacts.edit', $contact) }}"
                                           class="btn btn-primary ">Edit</a> |
                                        <a href="{{ route('address', $contact) }}"
                                           class="btn btn-dark float-right">Address</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div>
                            {{ $contacts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
