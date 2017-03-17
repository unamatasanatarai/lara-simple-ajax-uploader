<div class="form-group sau-upload sau-upload-images" data-url="{{ $url or '' }}">
    @if(!empty($label))
        <label>{{ $label }}</label>
    @endif
    <div class="sau-dropzone sau-inputs" id="sau_dropzone_{{ rand(1, 5000) . uniqid() }}">
        <span class="btn btn-primary">Wybierz plik</span>
        <div class="sau-image">
            @if(!empty($value))
                <img src="{{ $value }}">
            @endif
            <div class="sau-calltoaction">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><style>.a{fill:#030104;}</style><path d="M27.6 12.7C26.7 10.3 24.3 8.5 21.5 8.5c-0.6 0-1.3 0.1-1.8 0.3C18.1 6.2 15.2 4.5 12 4.5c-4.9 0-8.9 3.9-9 8.8C1.2 14.3 0 16.3 0 18.5c0 3.3 2.7 6 6 6h6v-2H6C3.8 22.5 2 20.7 2 18.5c0-1.9 1.3-3.5 3.1-3.9C5 14.2 5 13.9 5 13.5c0-3.9 3.1-7 7-7 3.2 0 5.8 2.1 6.7 5 0.8-0.6 1.7-1 2.8-1 2.3 0 4.2 1.8 4.5 4h0c2.2 0 4 1.8 4 4 0 2.2-1.8 4-4 4H20v2h6c3.3 0 6-2.7 6-6C32 15.7 30.1 13.4 27.6 12.7z" class="a"/><polygon points="16 13.5 11 19.5 14 19.5 14 27.5 18 27.5 18 19.5 21 19.5 " class="a"/></svg>
            </div>
        </div>
        <div class="sau-progress progress">
            <div class="determinate"></div>
        </div>
    </div>
    <div class="sau-gallery clearfix">
        @include('sau::images_item', [
            'name' => 'gallery',
            'src'  => 'one.png',
            'url'  => 'https://placekitten.com/g/1000/600',
        ])
    </div>

    <template id="sau_image">
        @include('sau::images_item', [
            'name' => 'gallery',
            'src'  => '',
            'url'  => '',
        ])
    </template>
</div>

<script>
    var MULTI_E_SIZE = "{{ __('Nie wyszystkie obrazki zostały wgrane') }}";
    var MULTI_M_COMPLETE = "{{ __('Zakończyłem wgrywanie obrazków. Pamiętaj by zapisać zmiany!') }}";
</script>
