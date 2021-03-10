{{ csrf_field() }}
<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
    <label for="address" class="col-md-4 control-label">Full Address</label>
    <div class="col-md-12">
        <input id="address" type="text" class="form-control" name="address"
               value="{{ old('address', (isset($address))?$address->address:'') }}">
        @if ($errors->has('address'))
            <span class="help-block">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group-check">
    <label for="check" class="col-md-4 control-label">Default Address</label>
    <div class="col-md-2 mb-4">
        <input id="default" type="checkbox" class="form-check" name="default"
               value="Y">
    </div>
</div>
<input type="hidden" name="contact_id" value="{{ $contact->id }}">

