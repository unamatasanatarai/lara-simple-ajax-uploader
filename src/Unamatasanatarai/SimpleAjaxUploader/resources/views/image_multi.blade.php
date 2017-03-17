<div class="col s12">
    {{ $caption or ''}}
    <div class="upload-multiple-container input-field">
        <div class="upload-multiple" id="multidragbox{{rand(5001, 15000) . uniqid()}}" data-url="{{route('api-asset-upload-ajax-image')}}">
            <div class="instructions">
                <i class="material-icons">cloud_upload</i>
                <br>
                {{ __('Przeciągnij obrazki lub kliknij') }}
            </div>
            <div class="progress hide">
                <div class="determinate" style="width: 0px"></div>
            </div>
        </div>
        <script type="text/template" class="multitemplate">
            @include('elements.form.image_multi_item', [
                'name' => 'gallery',
                'src'  => '',
                'url'  => '',
            ])
        </script>
        <div class="gallery row">
            @if(!empty($formData))
                @foreach($formData->gallery as $image)
                    @include('elements.form.image_multi_item', [
                        'name' => 'gallery',
                        'src'  => $image->src,
                        'url'  => cdnAsset($image->src),
                    ])
                @endforeach
            @endif
        </div>
    </div>
</div>
<script>
    var MULTI_E_SIZE = "{{ __('Nie wyszystkie obrazki zostały wgrane') }}";
    var MULTI_M_COMPLETE = "{{ __('Zakończyłem wgrywanie obrazków. Pamiętaj by zapisać zmiany!') }}";
</script>