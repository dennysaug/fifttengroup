{{ csrf_field() }}
<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="col-md-4 control-label">Name</label>
    <div class="col-md-12">
        <input id="name" type="text" class="form-control" name="name"
               value="{{ old('name', $company->name) }}">
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('company_type_id') ? ' has-error' : '' }}">
    <label for="company_type_id" class="col-md-4 control-label">Company Type</label>
    <div class="col-md-12">
        <select name="company_type_id" id="company_type_id" class="form-control">
            <option value="">Please select...</option>
            @foreach($companyTypes as $id => $name)
                <option value="{{ $id }}"
                        {{ $id == old('company_type_id', $company->company_type_id) ? ' selected' : ''}}>
                    {{ $name }}
                </option>
            @endforeach
        </select>
        @if ($errors->has('company_type_id'))
            <span class="help-block">
                <strong>{{ $errors->first('company_type_id') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('company_status_id') ? ' has-error' : '' }}">
    <label for="company_status_id" class="col-md-4 control-label">Company Status</label>
    <div class="col-md-12">
        <select name="company_status_id" id="company_status_id" class="form-control">
            <option value="">Please select...</option>
            @foreach($companyStatuses as $id => $name)
                <option value="{{ $id }}"
                        {{ $id == old('company_status_id', $company->company_status_id) ? ' selected' : ''}}>
                    {{ $name }}
                </option>
            @endforeach
        </select>
        @if ($errors->has('company_status_id'))
            <span class="help-block">
                <strong>{{ $errors->first('company_status_id') }}</strong>
            </span>
        @endif
    </div>
</div>