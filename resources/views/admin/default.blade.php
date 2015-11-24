@extends('admin.template.lte.index')
@section('segment-title')
    404
@stop
@section('segment-desc')
    Halaman Tidak Ditemukan
@stop

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
        <li>Kesalahan</li>
        <li class="active">404</li>
    </ol>
@stop


@section('content')
    <div class="error-page">
        <h2 class="headline text-red"> 404</h2>

        <div class="error-content">
            <h3><i class="fa fa-warning text-yellow"></i> Halaman Tidak Ditemukan.</h3>
            <p>
                Kami tidak dapat menemukan halaman yang anda cari.Untuk sementara, anda dapat kembali ke halaman
                <a href="{{ url('/admin/dashboard') }}" class="alert-link"> dasbor </a>, atau anda dapat menghubungi pengurus di +62(022) XXXYZ.
            </p>
        </div>
    </div>
@stop