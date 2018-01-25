<?php

namespace Chenmobuys\AdminBase\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UploadController extends Controller
{

    /**
     * Index interface.
     *
     */
    public function image(Request $request)
    {
        $files = $request->file();
        $filenames = [];
        $dst = $request->get('dst') ?: 'default';
        $path = "/uploads/images/{$dst}/" . date('Y-m-d') . '/';

        $disk = QiniuStorage::disk($request->get('disk','public'));

        foreach ($files as  $file) {
            $ext = $file->getClientOriginalExtension();
            $filename = md5(uniqid()) . '.' . $ext;

            $disk->put($path.$filename,file_get_contents($file->getRealPath()));

            $filenames[] = $disk->imagePreviewUrl($path . $filename,'');
        }

        return new JsonResponse(['errno' => 0, '上传成功', 'data' => $filenames]);
    }

}
