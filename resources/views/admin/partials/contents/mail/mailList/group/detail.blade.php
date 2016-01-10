@extends('admin.template.lte.layout.detail')

{{ $breadCrumb }}

@section('data-form')
    {!! Form::model($model, ['url' => $formAction]) !!}
        {{ $formMethodField }}
        <input type="hidden" name="Sbg_MailListID" id="Sbg_MailListID" value="{{ $listID }}" />
        <div class="form-group">
            {!! Form::label('Sbg_ParentID', 'Group Parent') !!}
            {!! Form::select('Sbg_ParentID', $groupParentOptions, null, ['class' => 'form-control', 'rows' => 4]) !!}
        </div>
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
@stop

@section('add-js')
    @parent
    <script>
        $('#Sbg_ParentID').select2({theme: 'classic'});
    </script>
@endsection