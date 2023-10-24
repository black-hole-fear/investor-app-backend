@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table--light style--two custom-data-table table">
                            <thead>
                                <tr>
                                    <th>@lang('Business Name')</th>
                                    <th>@lang('Name')</th>
                                    <th>@lang('Title')</th>
                                    <th>@lang('Description')</th>
                                    <th>@lang('Price')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($goodsList as $goods)
                                    <tr>
                                        <td>{{ $goods->getBusinessName->name }}</td>
                                        <td>{{ __($goods->name) }}</td>
                                        <td class="fw-bold">{{ __($goods->title) }}</td>
                                        <td class="fw-bold"> 
                                            {{ __(Str::limit($goods->details, 30)) }}
                                        </td>
                                        <td class="fw-bold">
                                            {{ showAmount($goods->price) }} {{ __($general->cur_text) }} {{ 0 < $goods->rate ? ' + ' . showAmount($goods->rate) . ' %' : ' - ' . showAmount($goods->rate) . '%' }} 
                                        </td>
                                        <td>
                                            @php
                                                echo $goods->statusBadge;
                                            @endphp
                                        </td>
                                        <td>
                                            <div class="button--group">
                                                <a class="btn btn-sm btn-outline--primary ms-1" href="{{ route('admin.goods.edit', $goods->id) }}"><i class="las la-pen"></i> @lang('Edit')</a>
                                                @if ($goods->status == Status::ENABLE)
                                                    <button class="btn btn-sm btn-outline--danger ms-1 confirmationBtn" data-question="@lang('Are you sure to disable this goods?')" data-action="{{ route('admin.goods.status', $goods->id) }}">
                                                        <i class="la la-eye-slash"></i> @lang('Disable')
                                                    </button>
                                                @else
                                                    <button class="btn btn-sm btn-outline--success ms-1 confirmationBtn" data-question="@lang('Are you sure to enable this goods?')" data-action="{{ route('admin.goods.status', $goods->id) }}">
                                                        <i class="la la-eye"></i> @lang('Enable')
                                                    </button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
            </div><!-- card end -->
        </div>
    </div>
    <x-confirmation-modal />
@endsection

@push('breadcrumb-plugins')
    <a class="btn btn-outline--primary" href="{{ route('admin.goods.create') }}"><i class="las la-plus"></i>@lang('Add New')</a>
    <div class="d-inline">
        <div class="input-group w-auto">
            <input class="form-control bg--white" name="search_table" type="text" placeholder="@lang('Search')...">
            <button class="btn btn--primary input-group-text"><i class="fa fa-search"></i></button>
        </div>
    </div>
@endpush
