@extends('admin.template.lte.layout.listing')

{{ $breadCrumb }}

@section('data-listing')
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th class="rowNumber">No</th>
                <th>Email</th>
                <th>Full Name</th>
                <th class="rowNumber">Age</th>
                <th>Gender</th>
                <th class="rowActive">Active</th>
            </tr>
        </thead>
        <tbody>
            <?php $counter = 1; ?>
            @foreach($model as $index => $row)
                <?php $no = (($model->currentPage() - 1) * $model->perPage()) + $counter++; ?>
                <tr ondblclick="window.location.href='{{ action($controllerName . '@edit', $row->getKey()) }}'">
                    <td class="rowNumber">{{ $no }}</td>
                    <td>{{ $row->Sbr_EmailAddress }}</td>
                    <td>{{ $row->Sbr_FirstName . ' ' . $row->Sbr_LastName }}</td>
                    <td class="rowNumber">
                        @if(empty($row->Sbr_BirthDay) === false)
                            {{ \MailMarketing\Helpers\Helper::calculateAge($row->Sbr_BirthDay) }}
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ \MailMarketing\Helpers\Helper::translateCode($row->Sbr_Gender, 'gender') }}</td>
                    <td class="rowActive">{!! \BootstrapHelper::getIconYesNo($row->Sbr_Active) !!}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
