@extends('backend.layouts.app')

@section('title', __('labels.backend.access.instituts.management') . ' | ' . __('labels.backend.access.instituts.create'))

@section('content')
{{ html()->form('POST', route('admin.auth.institut.store'))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.access.instituts.management')
                        <small class="text-muted">@lang('labels.backend.access.instituts.create')</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            <div class="row mt-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.access.instituts.nama_institut'))
                            ->class('col-md-2 form-control-label')
                            ->for('nama_institut') }}

                        <div class="col-md-10">
                            {{ html()->text('nama_institut')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.access.instituts.nama_institut'))
                                ->attribute('maxlength', 191)
                                ->required()
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->


                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.auth.institut.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.create')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->form()->close() }}
@endsection
