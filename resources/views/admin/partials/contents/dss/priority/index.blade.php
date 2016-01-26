@extends('admin.template.lte.layout.listing')



@section('data-listing')
    <table class="table table-bordered table-hover">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Description</th>
            <th>Period</th>
            <th>RI</th>
        </tr>
        <?php $counter = 1; ?>
        @foreach($model as $index => $row)
            <?php $no = (($model->currentPage() - 1) * $model->perPage()) + $counter++; ?>
            <tr>
                <td>{{ $no }}</td>
                <td>{{ $row->Dss_Name }}</td>
                <td>{{ $row->Dss_Description }}</td>
                <td>{{ $row->Dss_StartPeriod }}</td>
                <td>{{ $row->Imf_Description }}</td>
            </tr>
        @endforeach
    </table>
@stop