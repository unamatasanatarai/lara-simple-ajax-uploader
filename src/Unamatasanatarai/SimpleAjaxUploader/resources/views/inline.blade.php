<div class="form-group sau-upload sau-upload-inline" data-url="{{ $url or '' }}" data-allow="{{ $allow or '' }}">
    @if(!empty($label))
        <label>{{ $label }}</label>
    @endif
    <div class="sau-dropzone sau-inputs" id="sau_dropzone_{{ rand(1, 5000) . uniqid() }}">
        <div class="input-group">
            <input type="text" value="{{ $displayName or '' }}" class="sau-displayname form-control" readonly>
            <span class="listendelete @if(empty($displayName)) hide @endif">
                <svg viewBox="0 0 139 139" xmlns="http://www.w3.org/2000/svg"><style>.st0{fill:none;stroke:#ffffff;stroke-width:6;stroke-miterlimit:10;} .st1{display:none;fill:none;stroke:#000000;stroke-width:6;stroke-miterlimit:10;} .st2{display:none;}</style><path class="st0" id="XMLID_3_" d="M100 38.6l-61 61"/><path class="st0" id="XMLID_2_" d="M100 99.6l-61-61"/><path class="st1" id="XMLID_8_" d="M56.8 94.2l12.7 17"/><path class="st1" id="XMLID_21_" d="M69.5 111.2l12.7-17"/><path class="st2" id="XMLID_23_" d="M67.1 111.6h4.8v1.4h-4.8z"/></svg>
            </span>
            <span class="input-group-btn">
                <button class="sau-button btn btn-primary"
                        id="sau_button_{{ rand(1, 5000) . uniqid() }}">{{ $buttonCaption or 'Select file' }}</button>
            </span>
        </div>
        <div class="sau-progress progress">
            <div class="determinate"></div>
        </div>
    </div>

    <input type="hidden" name="{{ $name }}[src]" value="{{ $value or '' }}" class="sau-filepath">
    <input type="hidden" name="{{ $name }}[name]" value="{{ $displayName or '' }}" class="sau-filename">
</div>
