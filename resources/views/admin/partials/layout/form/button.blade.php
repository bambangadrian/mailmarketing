<div class="text-right" style="position: relative;">
    {!! $buttons !!}
    @if((isset($enableUpdate) === false or $enableUpdate === true))
        <button type="submit" class="btn btn-app"><i class="fa fa-save"></i> Save</button>
    @endif
    <button onclick="window.location.href='{!! $indexLinkAction !!}'" type="button" class="btn btn-app"><i class="fa fa-remove"></i> Close</button>
</div>