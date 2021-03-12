@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <div class="btn-group float-right" role="group">
              <a href="{{ route('companies.create') }}" class="btn btn-success">Add new</a>
            </div>
            <h2>
              Companies
            </h2>
          </div>

          <div class="card-body">
            <table class="table">
              <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Company Type</th>
                <th>Company Status</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody>
              @foreach($companies as $company)
                <tr>
                  <td>{{ $company->id }}</td>
                  <td>{{ $company->name }}</td>
                  <td>{{ $company->companyType->name }}</td>
                  <td>{{ $company->companyStatus->name }}</td>
                  <td>
                    <a
                      href="{{ route('companies.edit', $company) }}"
                      class="btn btn-primary"
                    >Edit</a>
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



@endsection
