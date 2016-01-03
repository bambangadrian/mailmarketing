<div class="text-right">
    @if(($isUpdate === true) and (isset($enableDelete) === false or $enableDelete === true) and Route::current()->getParameter($referenceKey)!== null)
        {!! Form::open(['method' => 'DELETE', 'url' => action($controllerName . '@destroy', Route::current()->getParameter($referenceKey))]) !!}
        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete This Record (Soft Delete)</button>
        {!! Form::close() !!}
    @endif
</div>

