@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')

<form method="POST" action="{{ route('admin.updatesyssld', $syssld) }}">
    <div class="form-group">
        @csrf
        @method('PATCH')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        Edit SLDS
                    </h4>
                </div><!--col-->
            </div><!--row-->
            <!--row-->

            <hr />

            <div class="row mt-4">
                <div class="col">
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Kod Stok</label>
                        <div class="col-md-2">
                            {{-- <input type="hidden" name="stok_id" value="{{ $lokasistok->stok->id }}">
                            <input type="hidden" name="device_id" value="{{ $lokasistok->device->id }}">
                            <input type="hidden" name="petak" value="{{ $lokasistok->petak }}"> --}}
                            <p class="mt-2"><b>{{ $syssld->stok->fullcode }}</b></p>
                        </div><!--col-->

                        <label class="col-md-2 col-form-label">Nama Stok</label>
                        <div class="col-md-6">
                            <p class="mt-1"><b>{{ $syssld->stok->stok_desc }}</b></p>
                        </div><!--col-->

                    </div><!--form-group-->

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Kod IOT</label>
                        <div class="col-md-2">
                            <p class="mt-2"><b>{{ $syssld->device->kod_IOT }}</b></p>
                        </div><!--col-->
                        <label class="col-md-1 col-form-label">Petak</label>
                        <div class="col-md-2">
                            <p class="mt-2"><b>{{ $syssld->petak }}</b></p>
                        </div><!--col-->

                    </div><!--form-group-->

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Pengguna Pemohon</label>
                        <div class="col-md-4">

                            <select class="form-control" name="pengguna">
                                <option value="{{ $syssld->pengguna}}">Pengguna {{ $syssld->pengguna}}</option>
                                <option value="0">Sila Pilih</option>
                                <option value="1">Pengguna 1</option>
                                <option value="2">Pengguna 2</option>
                                <option value="3">Pengguna 3</option>
                                <option value="4">Pengguna 4</option>
                                <option value="5">Pengguna 5</option>
                                <option value="6">Pengguna 6</option>
                                <option value="7">Pengguna 7</option>
                                <option value="8">Pengguna 8</option>
                                <option value="9">Pengguna 9</option>
                                <option value="10">Pengguna 10</option>
                                </select>


                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Kuantiti</label>
                        <div class="col-md-4">
                            <input type="number" class="form-control" id="kuantiti" name="kuantiti" value="{{ $syssld->kuantiti}}" required>
                        </div><!--col-->

                    </div><!--form-group-->


                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.syssld'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{-- {{ html()->closeModelForm() }} --}}

</form>
@endsection
