@extends('admin.layouts.template')
@section('content')
    <div id="page_content">
        <div id="page_content_inner">
            <div class="uk-form-stacked">
                <div class="uk-grid" data-uk-grid-margin>
                    {!! Form::open(array('route' => 'admin-rater-email-fields', 'files'=>true, 'class' => 'ajax_form')) !!}
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-margin-top">
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-1">
                                        <label for="field_1">Raters' Email Field 1 * (For Normal Assessment)</label><br><br>
                                        {!! Form::textarea("field_1", $data['rater_email_fields']->field_1, array('class' => 'md-input', 'id' => 'field_1')) !!}
                                        @if($errors->has('field_1'))
                                            {!! errorMsg($errors->first('field_1')) !!}
                                        @endif
                                    </div>
                                    <div class="uk-width-medium-1-1">
                                        <label for="field_2">Raters' Email Field 2 * (For 360 Assessment)</label><br><br>
                                        {!! Form::textarea("field_2", $data['rater_email_fields']->field_2, array('class' => 'md-input', 'id' => 'field_2')) !!}
                                        @if($errors->has('field_2'))
                                            {!! errorMsg($errors->first('field_2')) !!}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <button type="submit" class="md-btn md-btn-primary" style="float:right;">Save</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    @include('alerts.error')
    @include('alerts.success')
@endsection
@push('css')
    {{HTML::style('public/assets/plugins/colorpicker/css/spectrum.css')}}
@endpush
@push('js')
    {{ Html::script('public/assets/assets/js/custom/uikit_fileinput.min.js') }}
    {{HTML::script('public/assets/plugins/colorpicker/js/spectrum.js')}}

    <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace( 'field_1' );
        CKEDITOR.replace( 'field_2' );
    </script>
@endpush
@push('metainfo');
<title>Raters' Email Fields | {{ config('app.name') }}</title>
@endpush