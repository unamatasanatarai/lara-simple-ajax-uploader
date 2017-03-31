```
@include('sau::inline', ['allow' => 'mp3, jpg, png, svg ', 'url' => route('assets.upload.file'), 'buttonCaption' => __('Wybierz plik'), 'name' => 'ufile_xls', 'value' => '', 'label' => 'Plik XLS', 'displayName' => __('Upuść tu plik, lub kliknij')])
@include('sau::image', ['url' => route('assets.upload.image'), 'name' => 'main_image', 'value' => '', 'label' => 'Główny obrazek', 'displayName' => __('Upuść tu plik, lub kliknij')])
@include('sau::images', ['url' => route('assets.upload.image'), 'name' => 'main_image2', 'value' => '', 'label' => 'Główny obrazek', 'displayName' => __('Upuść tu plik, lub kliknij')])
```
                            
                            
service provier:                            
```Unamatasanatarai\SimpleAjaxUploader\SimpleAjaxUploaderServiceProvider::class,```


example controller (@TODO: rethink implementation)
```<?php
   
   namespace App\Http\Controllers;
   
   use Illuminate\Support\Str;
   use Unamatasanatarai\SimpleAjaxUploader\FileUpload;
   
   class AssetsController extends Controller
   {
   
       public function image()
       {
           $upload_dir = public_path('u/');
           $uploader = new FileUpload('uploadfile');
           // Handle the upload
           $result = $uploader->handleUpload($upload_dir);
           if ( ! $result ) {
               exit(json_encode([ 'success' => false, 'msg' => $uploader->getErrorMsg() ]));
           }
           if ( ! $uploader->isWebImage($uploader->getSavedFile()) ) {
               return response()->json([
                   'success' => false,
                   'error'   => __('Można wgrać tylko obrazki/zdjecia'),
               ]);
           }
           $newFilename = Str::slug($uploader->getFileNameWithoutExt()) . '_' . time() . '_' . uniqid() . '.' . $uploader->getExtension();
   
           copy($upload_dir . $uploader->getFileName(), $upload_dir . $newFilename);
   
           return response()->json([
               'success'     => true,
               'fileFullUrl' => asset('u/' . $newFilename),
               'fileUrl'     => $newFilename,
           ]);
       }```

https://packagist.org/packages/unamatasanatarai/lara-simple-ajax-uploader
