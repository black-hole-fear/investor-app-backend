@extends('admin.layouts.app')

@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form action="{{ route('admin.business.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>@lang('Select the business for this goods :&nbsp;')</label>
                                    <button type="button" id="open-business" class="btn btn-outline-primary">Match</button>
                                </div>
                                <div class="form-group">
                                    <label>@lang('Name')</label>
                                    <input class="form-control" name="name" type="text" value="{{ old('name') }}" required />
                                </div>
                                
                                <div class="form-group">
                                    <label>@lang('Title')</label>
                                    <input class="form-control" name="title" type="text" value="{{ old('title') }}" required />
                                </div>

                                <div class="form-group">
                                    <label>Describe about this business in detail</label>
                                    <textarea id="editor" rows="10" class="form-control nicEdit" name="description" ></textarea>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>@lang('Price')</label>
                                            <div class="input-group d-flex align-items-center">
                                                <input 
                                                    class="form-control border-radius-5" 
                                                    name="currency" 
                                                    type="text" 
                                                    value="{{ old('currency') }}" 
                                                    placeholder="Enter the price. e.g: 500"
                                                    required 
                                                />&nbsp;$
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>@lang('Reduced Rate')</label>
                                            <div class="input-group d-flex align-items-center">
                                                <input 
                                                    class="form-control" 
                                                    name="rate" 
                                                    type="number" 
                                                    value="{{ old('rate') }}" 
                                                    step="any" 
                                                    placeholder="+5%"
                                                    required 
                                                /> &nbsp; %
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label for="is-building">Goods Type</label>
                                            <div class="input-group">
                                                <select name="goods_type" id="is-building" class="form-control">
                                                    <option value="1">Estate</option>                   
                                                    <option value="0" selected>Not estate</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label for="visible">Status</label>
                                            <div class="input-group">
                                                <select name="status" id="visible" class="form-control">
                                                    <option value="1">Show</option>                   
                                                    <option value="0" selected>Hide</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button class="btn btn--primary w-100 h-45" type="submit">@lang('Submit')</button>
                    </div>
                </form>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Launch demo modal
                </button>
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Understood</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- card end -->
        </div>
    </div>

    <x-form-generator />
@endsection

@push('script')
    <script>
        "use strict"
        $(function() {
            $('#open-business').on('click', (e) => {
                let numPage = 1;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                e.preventDefault();

                $.ajax('/admin/goods/business', {
                    type: 'GET',
                    data: { page: numPage },
                    success: function (data, status, xhr) {
                        
                    },
                    error: function (jqXhr, textStatus, errorMessage) {
                        console.log(errorMessage);
                    }
                });
            });
        });
    </script>

    <script src="{{ asset('assets/global/js/form_actions.js') }}"></script>
@endpush

@push('breadcrumb-plugins')
    <x-back route="{{ route('admin.business.index') }}" />
@endpush

@push('style')
<style>
    #upload-image {
        opacity: 0;
    }

    /* #upload-label {
        position: absolute;
        top: 50%;
        left: 1rem;
        transform: translateY(-50%);
    } */

    .image-area {
        border: 2px dashed rgba(255, 255, 255, 0.7);
        padding: 1rem;
        position: relative;
    }

    .image-area::before {
        content: 'Uploaded image result';
        color: #fff;
        font-weight: bold;
        text-transform: uppercase;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 0.8rem;
        z-index: 1;
    }

    .image-area img {
        z-index: 2;
        position: relative;
    }
</style>
@endpush

@push('script')
    <script>
            "use strict";
            $('input[name=currency]').on('input', function() {
                $('.currency_symbol').text($(this).val());
            }); 

            function readURL (input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#imageResult')
                            .attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                };
            };

            $(function () {
                $('#upload').on('change', function () {
                    readURL(input);
                });
            });

            /*  ==========================================
                SHOW UPLOADED IMAGE NAME
            * ========================================== */
            var input = document.getElementById( 'upload' );
            var infoArea = document.getElementById( 'upload-label' );

            input.addEventListener( 'change', showFileName );
            function showFileName( event ) {
                var input = event.srcElement;
                var fileName = input.files[0].name;
                infoArea.textContent = 'File name: ' + fileName;
            }
    </script>
@endpush
