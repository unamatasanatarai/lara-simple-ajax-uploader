<div class="form-group sau-upload sau-upload-image" data-url="{{ $url or '' }}">
    @if(!empty($label))
        <label>{{ $label }}</label>
    @endif
    <span class="listendelete">
        <svg viewBox="0 0 139 139" xmlns="http://www.w3.org/2000/svg"><style>.st0{fill:none;stroke:#ffffff;stroke-width:6;stroke-miterlimit:10;} .st1{display:none;fill:none;stroke:#000000;stroke-width:6;stroke-miterlimit:10;} .st2{display:none;}</style><path class="st0" id="XMLID_3_" d="M100 38.6l-61 61"/><path class="st0" id="XMLID_2_" d="M100 99.6l-61-61"/><path class="st1" id="XMLID_8_" d="M56.8 94.2l12.7 17"/><path class="st1" id="XMLID_21_" d="M69.5 111.2l12.7-17"/><path class="st2" id="XMLID_23_" d="M67.1 111.6h4.8v1.4h-4.8z"/></svg>
    </span>
    <div class="sau-dropzone sau-inputs" id="sau_dropzone_{{ rand(1, 5000) . uniqid() }}">
        <span class="btn btn-primary">{{ __('Wybierz plik') }}</span>
        <div class="sau-image">
            <div class="img">
            @if(!empty($img))
                <img src="{{ $img }}">
            @endif
            </div>
            <div class="sau-calltoaction @if(!empty($img))hide @endif">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><style>.a{fill:#030104;}</style><path d="M27.6 12.7C26.7 10.3 24.3 8.5 21.5 8.5c-0.6 0-1.3 0.1-1.8 0.3C18.1 6.2 15.2 4.5 12 4.5c-4.9 0-8.9 3.9-9 8.8C1.2 14.3 0 16.3 0 18.5c0 3.3 2.7 6 6 6h6v-2H6C3.8 22.5 2 20.7 2 18.5c0-1.9 1.3-3.5 3.1-3.9C5 14.2 5 13.9 5 13.5c0-3.9 3.1-7 7-7 3.2 0 5.8 2.1 6.7 5 0.8-0.6 1.7-1 2.8-1 2.3 0 4.2 1.8 4.5 4h0c2.2 0 4 1.8 4 4 0 2.2-1.8 4-4 4H20v2h6c3.3 0 6-2.7 6-6C32 15.7 30.1 13.4 27.6 12.7z" class="a"/><polygon points="16 13.5 11 19.5 14 19.5 14 27.5 18 27.5 18 19.5 21 19.5 " class="a"/></svg>
            </div>
        </div>
        <div class="sau-progress progress">
            <div class="determinate"></div>
        </div>
    </div>

    <input type="hidden" name="{{ $name }}" value="{{ $value or '' }}" class="sau-filepath">
</div>
