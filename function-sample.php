<?php
define('RECAPTCHA_SECRET_KEY', '');
define('RECAPTCHA_SITE_KEY', '');

$app_id = "";
$app_secret = "";
$access_token= "";


function recaptcha_vertify($response)
{
    $url = 'https://www.google.com/recaptcha/api/siteverify?secret=%s&response=%s&remoteip=%s';
    $url = sprintf($url, RECAPTCHA_SECRET_KEY, $response, $_SERVER['REMOTE_ADDR']);

    $status = file_get_contents($url);
    $r = json_decode($status);

    return (isset($r->success) && $r->success) ? true : false;
}

function recaptcha_display()
{
    return '<script src="https://www.google.com/recaptcha/api.js" async defer></script>
            <div class="g-recaptcha" data-sitekey="' . RECAPTCHA_SITE_KEY . '"></div>';
}

function conn_fb($message){
    session_start();
    define('FACEBOOK_SDK_V4_SRC_DIR', __DIR__ . '/facebook-sdk-v5/');
    require_once __DIR__ . '/facebook-sdk-v5/autoload.php';

    $fb = new Facebook\Facebook([
        'app_id'     => '',
        'app_secret' => '',
        'default_graph_version' => 'v2.5',
    ]);

    $fb->setDefaultAccessToken('');

    $data = [
        "message" => $message
    ];
    $response = $fb->post('//feed', $data);

    $post_id = $response->getDecodedBody();
    return $post_id['id'];


}
function fb_photo(){
    session_start();
    define('FACEBOOK_SDK_V4_SRC_DIR', __DIR__ . '/facebook-sdk-v5/');
    require_once __DIR__ . '/facebook-sdk-v5/autoload.php';

    $fb = new Facebook\Facebook([
        'app_id'     => '',
        'app_secret' => '',
        'default_graph_version' => 'v2.5',
    ]);

    $fb->setDefaultAccessToken('');

    $data = [
        "message" => '貼圖測試',
        "source" => $fb->fileToUpload('./XD.png')
    ];
    $response = $fb->post('/ID/photos', $data);

    $post_id = $response->getDecodedBody();
    return $post_id['id'];


}



?>
