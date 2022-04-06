@extends('layouts.app-layout')
@section('title','Home')
@section('content-title','MUTHOFUN')
@push('breadcrumb')
<li class="breadcrumb-item"><a style="color:#fff" href="javascript:void(0)">MUTHOFUN</a></li>
@endpush
@section('page-content')
<div class="row">
    <router-view></router-view>
</div>

@endsection
@push('end_js')
<script>
    let token = localStorage.getItem('token');
    console.log(token);
    if(token){
        $('#sidebar').css('display','');
        $('#header').css('display','');
    }
</script>
@endpush