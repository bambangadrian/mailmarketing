@extends('admin.template.lte.layout.detail')

{{ $breadCrumb }}

@section('data-form')
    <div class="row">
        <div class="col-xs-12">
            {!! Form::model($model, ['url' => $formAction]) !!}
                {{ $formMethodField }}
                <input type="hidden" name="Sbg_MailListID" id="Sbg_MailListID" value="{{ $listID }}" />
                <?php $showParentField = true;?>
                @if ($isUpdate === true and (integer)$model->Sbg_DefaultGroup === 1 )
                    <?php $showParentField = false;?>
                @endif
                @if ($showParentField === true)
                    <div class="form-group">
                        {!! Form::label('Sbg_ParentID', 'Group Parent') !!}
                        {!! Form::select('Sbg_ParentID', $groupParentOptions, null, ['class' => 'form-control']) !!}
                    </div>
                @endif
                <div class="form-group">
                    {!! Form::label('Sbg_Name', 'Group Name',['class' => 'required']) !!}
                    {!! Form::text('Sbg_Name', null, ['required', 'class' => 'form-control', 'placeholder' => 'Enter Group Name']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Sbg_Description', 'Group Description') !!}
                    {!! Form::text('Sbg_Description', null, ['class' => 'form-control', 'placeholder' => 'Enter Group Description']) !!}
                </div>
                <div class="checkbox">
                    <label for="Sbg_Active">
                        {!! Form::hidden('Sbg_Active', 0) !!}
                        {!! Form::checkbox('Sbg_Active', 1) !!}
                        Active
                    </label>
                </div>
                @include('admin.partials.layout.form.button')
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('add-js')
    @parent
    <script>
        $('#Sbg_ParentID').select2();
    </script>
@endsection