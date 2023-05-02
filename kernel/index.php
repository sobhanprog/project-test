<?php

function uri($reservedUrl, $class, $method, $requestMethod = 'GET')
{

//current url array
    $currentUrl = explode('?', currentUrl())[0];
    $currentUrl = str_replace(CURRENT_DOMAIN, '', $currentUrl);
    $currentUrl = trim($currentUrl, '/');
    $currentUrlArray = explode('/', $currentUrl);
    $currentUrlArray = array_filter($currentUrlArray);

//reserved Url array
    $reservedUrl = trim($reservedUrl, '/');
    $reservedUrlArray = explode('/', $reservedUrl);
    $reservedUrlArray = array_filter($reservedUrlArray);

    if (sizeof($currentUrlArray) != sizeof($reservedUrlArray) || methodField() != $requestMethod) {
        return false;
    }

    $parameters = [];
    for ($key = 0; $key < sizeof($currentUrlArray); $key++) {
        if ($reservedUrlArray[$key][0] == "{" && $reservedUrlArray[$key][strlen($reservedUrlArray[$key]) - 1] == "}") {
            array_push($parameters, $currentUrlArray[$key]);
        } elseif ($currentUrlArray[$key] !== $reservedUrlArray[$key]) {
            return false;
        }
    }

    if (methodField() == 'POST') {
        $request = isset($_FILES) ? array_merge($_POST, $_FILES) : $_POST;
        $parameters = array_merge([$request], $parameters);
    }

    $object = new $class;
    call_user_func_array(array($object, $method), $parameters);
    exit();
}


function protocol()
{
    return stripos($_SERVER['SERVER_PROTOCOL'], 'https') === true ? 'https://' : 'http://';
}


function currentDomain()
{
    return protocol() . $_SERVER['HTTP_HOST'];
}


function asset($src)
{

    $domain = trim(CURRENT_DOMAIN, '/ ');
    $src = $domain . '/' . trim($src, '/');
    return $src;
}

function url($url)
{

    $domain = trim(CURRENT_DOMAIN, '/ ');
    $url = $domain . '/' . trim($url, '/');
    return $url;
}

function currentUrl()
{
    return currentDomain() . $_SERVER['REQUEST_URI'];
}

function methodField()
{
    return $_SERVER['REQUEST_METHOD'];
}

function dd($var)
{
    echo '<pre>';
    var_dump($var);
    exit;
}


function view($url, $vars = null)
{
    $url = str_replace('.', '/', $url);
    $path = BASE_PATH . 'view/' . $url . ".php";
    if ($vars) {
        extract($vars);
    }
    require_once $path;

}
function minifier($code)
{
    $search = array(

        '/\>[^\S ]+/s',
        '/[^\S ]+\</s',
        '/(\s)+/s',
        '/<!--(.|\s)*?-->/'
    );
    $replace = array('>', '<', '\\1');
    $code = preg_replace($search, $replace, $code);
    return $code;
}

 function redirect($url)
{
    header('Location: ' . trim(CURRENT_DOMAIN, '/ ') . '/' . trim($url, '/ '));
    exit;
}
function redirectBack()
{
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

function saveImage($image, $imagePath, $imageName = null)
{
    if ($imageName) {
        $extension = explode('/', $image['type'])[1];
        $imageName = $imageName . '.' . $extension;
    } else {
        $extension = explode('/', $image['type'])[1];
        $imageName = date("Y-m-d-H-i-s") . '.' . $extension;
    }

    $imageTemp = $image['tmp_name'];
    $imagePath = 'public/upload/' . $imagePath;

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

function removeImage($path)
{
    $path = trim($this->basePath, '/ ') . '/' . trim($path, '/ ');
    if (file_exists($path)) {
        unlink($path);
    }
}
function displayError($displayError)
{

    if($displayError)
    {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    }
    else
    {
        ini_set('display_errors', 0);
        ini_set('display_startup_errors', 0);
        error_reporting(0);
    }

}

displayError(DISPLAY_ERROR);


global $flashMessage;
if(isset($_SESSION['flash_message'])){
    $flashMessage = $_SESSION['flash_message'];
    unset($_SESSION['flash_message']);
}


function flash($name, $value = null)
{
    if($value === null){
        global $flashMessage;
        $message = isset($flashMessage[$name]) ? $flashMessage[$name] : '';
        return $message;
    }
    else{
        $_SESSION['flash_message'][$name] = $value;
    }

}
