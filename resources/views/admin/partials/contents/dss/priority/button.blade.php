@if($model->Dss_RunOn !== null)
    <button onclick="window.location.href='{!! action('Admin\Dss\DssResultController@show', $model->getKey()) !!}'" type="button" class="btn btn-app bg-green-gradient"><i class="fa fa-th-list"></i> Rangking Result</button>
@endif