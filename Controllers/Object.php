<?php
use hlper;

class Object
{
    protected function redirect($url)
    {
        header('Location: ' . trim($this->currentDomain, '/ ') . '/' . trim($url, '/ '));
        exit;
    }

    protected function redirectBack()
    {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    protected function saveImage($image, $imagePath, $imageName = null)
    {
        if ($imageName) {
            $extension = explode('/', $image['type'])[1];
            $imageName = $imageName . '.' . $extension;
        } else {
            $extension = explode('/', $image['type'])[1];
            $imageName = date("Y-m-d-H-i-s") . '.' . $extension;
        }

        $imageTemp = $image['tmp_name'];
        $imagePath = 'them/admin/dist/img/' . $imagePath;

        if (is_uploaded_file($imageTemp)) {
            if (move_uploaded_file($imageTemp, $imagePath . $imageName)) {
                return $imagePath . $imageName;
            } else {
                return false;
            }
        } else {
            return false;
        }

    }

    protected function removeImage($path)
    {
        $path = trim($this->basePath, '/ ') . '/' . trim($path, '/ ');
        if (file_exists($path)) {
            unlink($path);
        }
    }
}