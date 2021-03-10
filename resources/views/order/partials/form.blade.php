{{ csrf_field() }}
{{--{{ dd($errors) }}--}}
<div class="form-group{{ $errors->has('company_id') ? ' has-error' : '' }}">
    <label for="company_id" class="col-md-4 control-label">Company</label>
    <div class="col-md-12">
        <select name="company_id" id="company_id" class="form-control">
            <option value="">Please select...</option>
            @foreach($companies as $id => $name)
                <option value="{{ $id }}">
                    {{ $name }}
                </option>
            @endforeach
        </select>
        @if ($errors->has('company_id'))
            <span class="help-block">
                <strong>{{ $errors->first('company_id') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('contact_id') ? ' has-error' : '' }}">
    <label for="contact_id" class="col-md-4 control-label">Contact</label>
    <div class="col-md-12">
        <select name="contact_id" id="contact_id" class="form-control">
            <option value="">Please select the company first</option>
        </select>
        @if ($errors->has('contact_id'))
            <span class="help-block">
                <strong>{{ $errors->first('contact_id') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="divItem form-group{{ $errors->has('items') ? ' has-error' : '' }}">
    <label for="items" class="col-md-4 control-label">Item</label>
    <div class="col-md-12">
        <input type="text" class="form-control" name="items[]"
               value="">
    </div>
    <label for="items" class="col-md-4 control-label">Price</label>
    <div class="col-md-3">
        <input type="text" class="form-control" name="price[]"
               value="">
    </div>
    <label for="items" class="col-md-4 control-label">Quantity</label>
    <div class="col-md-3">
        <input type="text" class="form-control" name="quantity[]"
               value="">
    </div>
    <hr/>
</div>
<div id="addDivItem"></div>

<div class="form-group">
    <br/>
    <div class="float-right">
        <button type="button" id="btnAdd" class="btn btn-sm btn-outline-success" onclick="addItem()">Add</button>
        <button type="button" id="btnDel" class="btn btn-sm btn-outline-danger" onclick="delItem()">Del</button>
    </div>
</div>


@section('scripts')
    <script>
        $(document).on('ready', function() {
            $('#btnDel').hide()
            $("#company_id").change(function() {
                var company_id = this.value;
                if(company_id) {
                    $.ajax({
                        type: 'GET',
                        dataType: 'json',
                        response: 'json',
                        url: '{{ route('ajax.contacts.get') }}/' + company_id,
                        success: function(data) {
                            if(data.length) {
                                var optionsContacts = "<option value=\"\">Please select the contact from company</option>";
                                $.each(data, function(index, contact) {
                                    optionsContacts += '<option value="'+contact.id+'">'+contact.first_name + ' ' + contact.last_name + '</option>';
                                });
                                $('#contact_id').empty().html(optionsContacts);
                            }
                        }
                    })
                }
            });
        });

        function addItem()
        {

            var html = '<div class="form-group">';
            html += $('.divItem').html();
            html += '</div>';

            $('#addDivItem').after().append(html);
            $('#btnDel').show()
        }

        function delItem()
        {
            console.log($('#addDivItem').find('.form-group').length);
            $('#addDivItem').find('.form-group').last().remove();
            if($('#addDivItem').find('.form-group').length  == 0) {
                $('#btnDel').hide();
            }

        }

    </script>
@endsection
