@extends('admin.layouts.app')

@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form action="{{ route('admin.business.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <div>
                                    <div class="mb-4 d-flex justify-content-center">
                                        <img id="imageResult" src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg"  alt="example placeholder" style="width: 300px;" />
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <div class="btn btn-primary btn-rounded">
                                            <label id="upload-label" class="form-label text-white m-1" for="upload">Choose file</label>
                                            <input id="upload" name="image" type="file" onChange="readURL(this);" class="form-control d-none" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8">
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>@lang('Currency')</label>
                                            <div class="input-group">
                                                <input class="form-control border-radius-5" name="currency" type="text" value="{{ old('currency') }}" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>@lang('Rate')</label>
                                            <div class="input-group">
                                                <div class="input-group-text">1 {{ __($general->cur_text) }} =</div>
                                                <div class="input-group-text">
                                                    <input class="form-control" name="rate" type="number" value="{{ old('rate') }}" step="any" required />
                                                    <span class="currency_symbol"></span>
                                                </div>
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
            </div><!-- card end -->
        </div>
    </div>

    <x-form-generator />
@endsection

@push('script')
    <script>
        "use strict"
        var formGenerator = new FormGenerator();
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
