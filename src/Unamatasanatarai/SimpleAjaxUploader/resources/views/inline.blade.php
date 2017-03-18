<div class="form-group sau-upload sau-upload-inline" data-url="{{ $url or '' }}" data-allow="{{ $allow or '' }}">
    @if(!empty($label))
        <label>{{ $label }}</label>
    @endif
    <div class="sau-dropzone sau-inputs" id="sau_dropzone_{{ rand(1, 5000) . uniqid() }}">
        <div class="input-group">
            <input type="text" value="{{ $placeholder or 'Drop files here, or click' }}" class="sau-displayname form-control" readonly>
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
