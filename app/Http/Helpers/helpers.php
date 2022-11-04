<?php
if (! function_exists('uploadFiles')) {
    function uploadFiles($file,$forder)
    {
        $filename = time() . '-' . $file->getClientOriginalName();
        return $file->storeAs($forder, $filename, 'public');
    }
}