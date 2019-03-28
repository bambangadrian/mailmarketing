@extends('admin.template.lte.layout.detail')

{{ $breadCrumb }}

@section('data-form')
    <?php $fieldAttribute = 'readonly';?>
    <div class="row">
        <div class="col-xs-12">
            <form class="form-horizontal" role="form">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <fieldset>
                            <legend>Server Mail Track Data</legend>
                            <div class="form-group">
                                {!! Form::label('Mtr_Recipient', 'Recipient:', ['class' => 'control-label col-sm-4']) !!}
                                <div class="col-sm-8">
                                    {!! Form::text('Mtr_Recipient', $model->Mtr_Recipient, ['class' => 'form-control', $fieldAttribute]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('Mtr_EventName', 'Event Name:', ['class' => 'control-label col-sm-4']) !!}
                                <div class="col-sm-8">
                                    {!! Form::text('Mtr_EventName', $model->Mtr_EventName, ['class' => 'form-control', $fieldAttribute]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('Mtr_DomainSender', 'Domain Sender:', ['class' => 'control-label col-sm-4']) !!}
                                <div class="col-sm-8">
                                    {!! Form::text('Mtr_DomainSender', $model->Mtr_DomainSender, ['class' => 'form-control', $fieldAttribute]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('Mtr_MessageHeaders', 'Header Message:', ['class' => 'control-label col-sm-4']) !!}
                                <div class="col-sm-8">
                                    {!! Form::textarea('Mtr_MessageHeaders', $model->Mtr_MessageHeaders, ['class' => 'form-control', $fieldAttribute, 'rows' => 3]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('Mtr_Code', 'Code:', ['class' => 'control-label col-sm-4']) !!}
                                <div class="col-sm-8">
                                    {!! Form::text('Mtr_Code', $model->Mtr_Code, ['class' => 'form-control', $fieldAttribute]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('Mtr_Error', 'Error:', ['class' => 'control-label col-sm-4']) !!}
                                <div class="col-sm-8">
                                    {!! Form::text('Mtr_Error', $model->Mtr_Error, ['class' => 'form-control', $fieldAttribute]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('Mtr_MailingList', 'Campaign ID:', ['class' => 'control-label col-sm-4']) !!}
                                <div class="col-sm-8">
                                    {!! Form::text('Mtr_MailingList', $model->Mtr_MailingList, ['class' => 'form-control', $fieldAttribute]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('Mtr_CampaignName', 'Campaign Name:', ['class' => 'control-label col-sm-4']) !!}
                                <div class="col-sm-8">
                                    {!! Form::text('Mtr_CampaignName', $model->Mtr_CampaignName, ['class' => 'form-control', $fieldAttribute]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('Mtr_Tag', 'Mail Tag:', ['class' => 'control-label col-sm-4']) !!}
                                <div class="col-sm-8">
                                    {!! Form::text('Mtr_Tag', $model->Mtr_Tag, ['class' => 'form-control', $fieldAttribute]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('Mtr_Token', 'Token:', ['class' => 'control-label col-sm-4']) !!}
                                <div class="col-sm-8">
                                    {!! Form::text('Mtr_Token', $model->Mtr_Token, ['class' => 'form-control', $fieldAttribute]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('Mtr_Signature', 'Signature:', ['class' => 'control-label col-sm-4']) !!}
                                <div class="col-sm-8">
                                    {!! Form::text('Mtr_Signature', $model->Mtr_Signature, ['class' => 'form-control', $fieldAttribute]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('Mtr_TimeStamp', 'Timestamp:', ['class' => 'control-label col-sm-4']) !!}
                                <div class="col-sm-8">
                                    {!! Form::text('Mtr_TimeStamp', $model->Mtr_TimeStamp, ['class' => 'form-control', $fieldAttribute]) !!}
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <fieldset>
                            <legend>User Information</legend>
                            <div class="form-group">
                                {!! Form::label('Mtr_IpAddress', 'IP Address:', ['class' => 'control-label col-sm-4']) !!}
                                <div class="col-sm-8">
                                    {!! Form::text('Mtr_IpAddress', $model->Mtr_IpAddress, ['class' => 'form-control', $fieldAttribute]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('Mtr_Country', 'Country:', ['class' => 'control-label col-sm-4']) !!}
                                <div class="col-sm-8">
                                    {!! Form::text('Mtr_Country', $model->Mtr_Country, ['class' => 'form-control', $fieldAttribute]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('Mtr_Region', 'Region:', ['class' => 'control-label col-sm-4']) !!}
                                <div class="col-sm-8">
                                    {!! Form::text('Mtr_Region', $model->Mtr_Region, ['class' => 'form-control', $fieldAttribute]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('Mtr_City', 'City:', ['class' => 'control-label col-sm-4']) !!}
                                <div class="col-sm-8">
                                    {!! Form::text('Mtr_City', $model->Mtr_City, ['class' => 'form-control', $fieldAttribute]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('Mtr_ClickedUrl', 'Clicked URL:', ['class' => 'control-label col-sm-4']) !!}
                                <div class="col-sm-8">
                                    {!! Form::text('Mtr_ClickedUrl', $model->Mtr_ClickedUrl, ['class' => 'form-control', $fieldAttribute]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('Mtr_UserAgent', 'User Agent:', ['class' => 'control-label col-sm-4']) !!}
                                <div class="col-sm-8">
                                    {!! Form::textarea('Mtr_UserAgent', $model->Mtr_UserAgent, ['class' => 'form-control', $fieldAttribute, 'rows' => 3]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('Mtr_DeviceType', 'Device Type:', ['class' => 'control-label col-sm-4']) !!}
                                <div class="col-sm-8">
                                    {!! Form::text('Mtr_DeviceType', $model->Mtr_DeviceType, ['class' => 'form-control', $fieldAttribute]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('Mtr_ClientType', 'Client Type:', ['class' => 'control-label col-sm-4']) !!}
                                <div class="col-sm-8">
                                    {!! Form::text('Mtr_ClientType', $model->Mtr_ClientType, ['class' => 'form-control', $fieldAttribute]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('Mtr_ClientName', 'Client Name:', ['class' => 'control-label col-sm-4']) !!}
                                <div class="col-sm-8">
                                    {!! Form::text('Mtr_ClientName', $model->Mtr_ClientName, ['class' => 'form-control', $fieldAttribute]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('Mtr_ClientOs', 'Client OS:', ['class' => 'control-label col-sm-4']) !!}
                                <div class="col-sm-8">
                                    {!! Form::text('Mtr_ClientOs', $model->Mtr_ClientOs, ['class' => 'form-control', $fieldAttribute]) !!}
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
                @include('admin.partials.layout.form.button')
            </form>
        </div>
    </div>
@stop