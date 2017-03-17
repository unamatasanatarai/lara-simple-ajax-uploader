<div class="col s12">
    {{ $caption or ''}}
    <div class="upload-single-container input-field">
        <div class="upload-single" id="dragbox{{rand(1, 5000) . uniqid()}}" data-url="{{route('api-asset-upload-ajax-image')}}">
            @if(empty($url))
                <i class="material-icons">cloud_upload</i>
            @endif
            <div class="progress hide">
                <div class="determinate" style="width: 0px"></div>
            </div>
            <div class="theFile">@if(!empty($formData->$name))<img src="{{ cdnAsset($formData->$name) }}">@endif</div>
            <input type="hidden" name="{{$name}}" value="{{ $formData->$name or (empty($default)?'':$default) }}" class="filepath">
        </div>
    </div>
</div>