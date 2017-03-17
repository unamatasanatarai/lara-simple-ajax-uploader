<div class="item" data-name="">
    <div class="options">
        {{-- <i class="btn-floating waves-effect waves-light orange tooltipped handle left" data-position="top" data-tooltip="{{ __('Przestaw') }}" data-delay="50"><i class="material-icons">transform</i></i> --}}
        <i class="btn-floating waves-effect waves-light red listendelete"><i class="material-icons">delete</i></i>
    </div>
    <input type="hidden" class="filepath" name="{{$name}}[][src]" value="{{ $src }}">
    <img src="{{ $url }}" class="hide">

    <div class="preloader-wrapper small">
        <div class="spinner-layer spinner-blue-only">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
        </div>
    </div>
</div>