<div class="text-right">
    @if($isUpdate === true and $enableDelete === true)
        {!! Form::open(['method' => 'DELETE', 'url' => action($controllerName . '@destroy', $referenceValue)]) !!}
        <button onclick="return confirm('Are you sure to delete this record ?');" type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete This Record (Soft Delete)</button>
        {!! Form::close() !!}
    @endif
</div>

