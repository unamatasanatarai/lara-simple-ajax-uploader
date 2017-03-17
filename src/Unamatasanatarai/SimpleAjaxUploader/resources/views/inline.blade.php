<?php
$label = $attributes['label'] ?? '';
$url = $attributes['url'] ?? '';

$attributes['type'] = 'hidden';
$attributes['class'] = 'filepath';


unset($attributes['url']);
unset($attributes['label']);

?>
<div class="form-group sau-upload sau-upload-inline" data-url="{{ $url }}">
    @if(!empty($label))
        <label for="{{ $id }}">{{ $label }}</label>
    @endif
    <div class="sau-dropzone sau-inputs" id="sau_dropzone_{{ rand(1, 5000) . uniqid() }}">
        <div class="input-group">
            <input type="text" value="{{ $attributes['displayName'] or '' }}" class="sau-displayname form-control" readonly>
            <span class="input-group-btn">
                <button class="sau-button" id="sau_button_{{ rand(1, 5000) . uniqid() }}">{{ $buttonCaption or 'Select file' }}</button>
            </span>

        <div class="sau-progress progress">
            <div class="determinate"></div>
        </div>
    </div>

    <input type="hidden" name="{{ $name }}" value="{{ $value or '' }}" class="sau-filepath">
</div>