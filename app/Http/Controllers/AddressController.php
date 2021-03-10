<?php

namespace App\Http\Controllers;
use App\Contact;
use App\ContactAddress;
use App\Http\Requests\CreateAddress;
use App\Http\Requests\UpdateAddress;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index(Contact $contact)
    {
        return view('address.index', compact('contact'));
    }

    public function create(Contact $contact)
    {
        return view('address.create', compact('contact'));
    }

    public function store(CreateAddress $request)
    {
        $address = ContactAddress::create($request->all());
        if($address->default == 'Y') {
            ContactAddress::setDefault($address->contact_id,$address->id);
        }

        return redirect()->route('address', $address->contact)->with('alert', 'Address created!');
    }

    public function edit(ContactAddress $address)
    {
        $contact = $address->contact;
        return view('address.edit', compact('contact', 'address'));
    }

    public function update(UpdateAddress $request, ContactAddress $address)
    {
        $address->update($request->all());
        if($address->default == 'Y') {
            ContactAddress::setDefault($address->contact_id,$address->id);
        }

        return redirect()->route('address', $address->contact)->with('alert', 'Address updated!');
    }
}
