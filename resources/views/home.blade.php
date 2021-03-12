@extends('layouts.app')

@section('head')
  <style>
    .tasks li {
      margin-bottom: 15px;
    }
  </style>
@endsection

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Dashboard</div>

          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <p>
              Please work through the mock client issues listed below. Try to group each solution into a
              separate git commit as best you can.
            </p>
            <p>
              For any new screens or UI, there is no need to make it look pretty, as long as it's functional.
            </p>

            <h2>Beginner</h2>

            <ol class="tasks" style="list-style: decimal inside;">
              <li>
                When I try to <a href="{{ route('contacts.create') }}">create a contact</a> I receive an
                error, can you fix this?
              </li>
              <li>
                <b>Please run the included database seeder before attempting this task.</b>
                With hundreds of records, the <a href="{{ route('contacts') }}">contacts</a> page seems to
                be loading very slowly.
                Can you identify the issue and fix it?
              </li>
              <li>
                We need to be able store addresses for contacts. Add functionality to allow for addresses to
                be associated with a contact. A contact can have many addresses.
              </li>
            </ol>

            <h2>Intermediate</h2>

            <ol class="tasks" style="list-style: decimal inside;">
              <li>
                We need to be able to raise and store orders placed by companies. An order needs:
                <ul>
                  <li>A unique order number</li>
                  <li>A reference to who at the company placed the order (i.e. which contact)</li>
                  <li>
                    To allow for many order items. An order item is composed of a product name (free text) and a price.
                  </li>
                </ul>
                Can you create the facility to allow orders to be entered and displayed in a list (just like the contact
                and company indexes)?
              </li>
              <li>
                Can you have the system send an email whenever an order is created? The email should be sent
                to info@pretendcompany.com. The content of the email can be plain text, but should include all the
                details about the order and its items.
              </li>
            </ol>

            <h2>Advanced</h2>

            <ol class="tasks" style="list-style: decimal inside;">
              <li>
                Can you add the facility to your orders list to change the sorting? We would like to be able to sort by
                both the number of items in the order, as well as the total monetary value of the order.
              </li>
              <li>
                We want to remind staff to process orders. Can you add functionality to automatically send an in-app
                notification to all users 30 minutes after an order has been created?
                <ul>
                  <li>
                    There is no need for a fancy UI (a simple box on screen containing the notification body will be fine).
                  </li>
                  <li>
                    Pages do not need to check for new notifications in the background, but the notification should be
                    deleted once it has been displayed to the user.
                  </li>
                </ul>
              </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
