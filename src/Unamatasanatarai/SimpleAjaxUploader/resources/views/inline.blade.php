<?php
$label = $attributes['label'] ?? '';
$url = $attributes['url'] ?? '';

$attributes['type'] = 'hidden';
$attributes['class'] = 'filepath';
$attributes['id'] = 'dragbox' . rand(1, 5000) . uniqid();

unset($attributes['url']);
unset($attributes['label']);

?>
<div class="form-group sau-upload sau-upload-inline" data-url="{{ $url }}">
    @if(!empty($label))
        <label for="{{ $attributes['id'] }}">{{ $label }}</label>
    @endif
    <div class="sau-inputs">
        <input type="text" value="{{ $attributes['displayName'] or '' }}">
        <button class="sau-button">{{ $buttonCaption or 'Select file' }}</button>

        <div class="sau-progress progress">
            <div class="determinate"></div>
        </div>
    </div>

    <input type="hidden" name="{{ $name }}" value="{{ $value or '' }}" class="sau-filepath">
</div>