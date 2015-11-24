@extends('admin.template.lte.index')
@section('segment-title','501')
@section('segment-desc', 'Halaman Tidak Diizinkan')
@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
        <li>Kesalahan</li>
        <li class="active">501</li>
    </ol>
@stop
@section('content')
    <div class="error-page">
        <h2 class="headline text-red"> 501</h2>
        <div class="error-content">
            <h3><i class="fa fa-warning text-yellow"></i> Halaman Tidak Diizinkan.</h3>
            <p>
                Anda tidak diizinkan untuk mengakses halaman ini. Jika pesan ini merupakan kesalahan silahkan menghubungi pengurus di +62(022) XXXYZ.
            </p>
        </div>
    </div>
@stop