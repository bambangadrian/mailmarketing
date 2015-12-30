<div class="text-right">
    @if((isset($enableUpdate) === false or $enableUpdate === true))
        <button type="submit" class="btn btn-app"><i class="fa fa-save"></i> Save</button>
    @endif
    <button onclick="window.location.href='{!! action($controllerName.'@index') !!}'" type="button" class="btn btn-app"><i class="fa fa-remove"></i> Cancel</button>
    {!! $buttons !!}
</div>