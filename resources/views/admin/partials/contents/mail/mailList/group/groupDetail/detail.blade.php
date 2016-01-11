@extends('admin.template.lte.layout.detail')

{{ $breadCrumb }}

@section('data-form')
    {!! Form::model($model, ['url' => $formAction]) !!}
    {{ $formMethodField }}
    <input type="hidden" name="Sgd_GroupID" id="Sgd_GroupID" value="{{ $groupID }}" />
    <div class="form-group">
        {!! Form::label('Sgd_SubscriberID', 'Add Subscribers', ['class' => 'required']) !!}
        {!! Form::select('Sgd_SubscriberID[]', $subscriberOptions, null, ['id' => 'Sgd_SubscriberID',  'class' => 'form-control', 'multiple' => 'multiple']) !!}
    </div>
    <div class="checkbox">
        <label for="Sgd_Active">
            {!! Form::hidden('Sgd_Active', 0) !!}
            {!! Form::checkbox('Sgd_Active', 1, true, ['onclick' => 'return false;']) !!}
            Active
        </label>
    </div>
    @include('admin.partials.layout.form.button')
    {!! Form::close() !!}
@stop

@section('add-js')
    @parent
    <script>
        $('#Sgd_SubscriberID').select2({theme: 'classic'});
    </script>
@endsection