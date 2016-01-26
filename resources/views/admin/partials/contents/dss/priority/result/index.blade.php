@extends('admin.template.lte.layout.listing')

{{ $breadCrumb }}

@section('data-listing')
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th class="rowNumber">Rank</th>
            <th>Alternative Name</th>
            <th class="rowFloat">Result</th>
        </tr>
        </thead>
        <tbody>
        <?php $counter = 1; ?>
        @foreach($model as $index => $row)
            <tr>
                <td class="rowNumber">{{ $index+1 }}</td>
                <td>{{ $row->alternative->Dal_Name }}</td>
                <td class="rowFloat">{{ $row->Dsr_Result }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop