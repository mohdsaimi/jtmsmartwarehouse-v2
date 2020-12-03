@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>@lang('strings.backend.dashboard.welcome') {{ $logged_in_user->name }}!</strong>
                </div><!--card-header-->
                <div class="card-body">
                    {!! __('strings.backend.welcome') !!}
                </div><!--card-body-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>Pengurusan Stok</strong>
                </div><!--card-header-->
                <div class="card-body">

                    <div class="card-body">
                        <p><b style="font-size:20px">{{$stok ?? ''}}</b> item stok didaftarkan
                        <br><b style="font-size:20px">{{$deviceall ?? ''}}</b> peranti IOT didaftarkan</p>
                        <p><b style="font-size:20px">{{$stok_ins ?? ''}}</b> item stok didaftarkan di institut anda
                        <br><b style="font-size:20px">{{$device ?? ''}}</b> peranti IOT tersedia di institut anda</p>
                    </div><!--card-body-->


                </div><!--card-body-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
@endsection

