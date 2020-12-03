@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="card-title mb-0">
                    Stock Location Display (SLD) System {{today()->format('d-m-Y')}}
                </h4>
            </div><!--col-->

            <div class="col-sm-6 pull-right">

                <div class="btn-toolbar float-right" lokasistoks="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
                    <a href="{{ route('admin.lokasistok') }}" class="btn btn-success ml-1" data-toggle="tooltip" title="@lang('labels.general.create_new')"><i class="fas fa-plus-circle"></i></a>
                </div>

            </div><!--col-->

            {{-- <div class="col-sm-7">
                <form action="{{ route('admin.lokasistok') }}" method="GET" role="search">

                    <div class="input-group">
                        <label class="my-1 mr-2 font-weight-bold">Cari</label>
                        <input type="text" class="form-control mr-2" name="term" placeholder="Masukkan kata carian" id="term">

                        <span class="input-group-btn mr-2">
                            <button class="btn btn-info" type="submit" title="Cari">
                                <span class="fas fa-search"></span>
                            </button>
                        </span>

                          <a href="{{ route('admin.lokasistok') }}">
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button" title="Refresh page">
                                    <span class="fas fa-sync-alt"></span>
                                </button>
                            </span>
                        </a>
                    </div>
                </form>
            </div><!--col--> --}}

        </div><!--row-->


        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Bil.</th>
                            <th>Kod Stok</th>
                            <th>Nama Stok</th>
                            <th class="text-center">Pengguna Pemohon</th>
                            <th class="text-center">Kuantiti</th>
                            <th>@lang('labels.general.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($syssld as $sysslds)

                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $sysslds->stok->fullcode }}</td>
                                    <td>{{ $sysslds->stok->stok_desc }}</td>
                                    <td class="text-center">{{ $sysslds->pengguna }}</td>
                                    <td class="text-center">{{ $sysslds->kuantiti }}</td>
                                    <td>

                                        {{-- butang --}}
                                        <div class="btn-group btn-group-sm" syssld="group" aria-label="@lang('labels.backend.access.users.user_actions')">

                                            <a href="{{ route('admin.editsyssld',$sysslds) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="@lang('buttons.general.crud.edit')">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <a href="{{ route('admin.destroysyssld', $sysslds) }}"
                                               data-method="delete"
                                               data-trans-button-cancel="@lang('buttons.general.cancel')"
                                               data-trans-button-confirm="@lang('buttons.general.crud.delete')"
                                               data-trans-title="@lang('strings.backend.general.are_you_sure')"
                                               class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="@lang('buttons.general.crud.delete')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>





                                        {{-- end butang --}}

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$syssld->links()}}
                </div>
            </div><!--col-->
        </div><!--row-->

    </div><!--card-body-->
</div><!--card-->
@endsection
