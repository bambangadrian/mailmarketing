@extends('admin.template.lte.layout.detail')

{{ $breadCrumb }}

@section('data-form')
    {!! Form::model($model, ['url' => $formAction]) !!}
        {{ $formMethodField }}
        {!! Form::hidden('Sgd_GroupID', $groupID) !!}
        <div class="form-group">
            {!! Form::label('Sgd_SubscriberID', 'Add Subscribers', ['class' => 'required']) !!}
            <?php $activeFieldAttributes = null; ?>
            @if($isCreate === true)
                <?php $activeFieldAttributes =  ['onclick' => 'return false;'];?>
                {!! Form::select('Sgd_SubscriberID[]', $subscriberOptions, null, ['id' => 'Sgd_SubscriberID',  'class' => 'form-control', 'multiple' => 'multiple']) !!}
            @elseif($isUpdate === true)
                {!! Form::hidden('Sgd_SubscriberID', $model->Sgd_SubscriberID) !!}
                {!! Form::text('Sbr_EmailAddress', $model->subscriber->Sbr_EmailAddress, ['class' => 'form-control', 'readonly', 'required']) !!}
            @endif
        </div>
        <div class="checkbox">
            <label for="Sgd_Active">
                {!! Form::hidden('Sgd_Active', 0) !!}
                {!! Form::checkbox('Sgd_Active', 1, true, $activeFieldAttributes) !!}
                Active
            </label>
        </div>
        @include('admin.partials.layout.form.button')
    {!! Form::close() !!}
@stop

@section('add-js')
    @parent
    @if($isCreate === true)
        <script>
            $('#Sgd_SubscriberID').select2();
        </script>
    @endif
@endsection