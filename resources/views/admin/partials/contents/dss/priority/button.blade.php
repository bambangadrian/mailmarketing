@if(isset($hasRunOn) === true and $hasRunOn === true)
    <button onclick="window.location.href='{!! action('Admin\Dss\DssResultController@index', $model->getKey()) !!}'" type="button" class="btn btn-app bg-green-gradient"><i class="fa fa-th-list"></i> Ranking</button>
@endif