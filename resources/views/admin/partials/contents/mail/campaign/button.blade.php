@if($model->Cpg_Active === 1)
    <button onclick="window.location.href='{!! action('Admin\Mail\SentCampaignController@index', $model->getKey()) !!}'" type="button" class="btn btn-app bg-green-gradient"><i class="fa fa-send"></i> Sent</button>
@endif