@extends('application.layouts.app')

@push('styles')
    <link href='https://cdn.jsdelivr.net/npm/froala-editor@3.0.4/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css'/>
@endpush

@push('scripts')
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@3.0.4/js/froala_editor.pkgd.min.js'></script>
    <script type="application/javascript">
        var editor = new FroalaEditor('#body')
    </script>
@endpush

@section('content')
    <div class="col-12">
        <div class="kt-portlet">
            <div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Exclusive Datatable Plugin
                    </h3>
                </div>
            </div>
            {!! form_start($form,$options = ['class' => 'kt-form']) !!}
            <div class="kt-portlet__body">
                <div class="row">
                    <div class="col-8">
                        {!! form_row($form->title) !!}
                        {!! form_row($form->body) !!}
                    </div>
                </div>

            </div>
            {!! form_end($form,true) !!}
        </div>
    </div>
@endsection