<?php
include("function.php");

global $error_vertify;
if(isset($_POST["submit"])){

    $response = $_POST["g-recaptcha-response"];
    $comment =htmlspecialchars($_POST["comment"]);

    if (!recaptcha_vertify($response)) {
        $error_vertify = "
        <div class='alert alert-danger'>
			<strong>警告！</strong>請先進行驗證！
		</div>";
    }
    else{
        for($i=120;$i=0;--$i){
            sleep(1);
            $time ="
            <div class='alert alert-success'>
                <strong>PO文成功!</strong>剩餘".$i."秒文章將會發布。
            </div>";
        }
        //conn_fb($comment);

    }


}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>匿名發文</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container">
            <center><h1>匿名發文</h1></center>
            <form method="post" name="db" id="db" role="form">
                <div class="form-group">
                    <div >
                        <label for="comment">內文</label>
                        <textarea style="resize : none; height:150px" class="form-control" id="comment" name="comment" placeholder="你想說什麼?"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <center>
                        <?php echo recaptcha_display();?>
                        <?php echo $error_vertify;  $error_vertify=isset($errorver)?$errorver:""; ?>
                    </center>

                </div>

                <div class='form-group'>
                    <input id='submit' name='submit' type='submit' class='btn btn-md btn-primary btn-block' value='發表貼文！'>
            	</div>
                        ";
                    }
                    else {
                        echo $time;
                    }
                ?>

            </form>
        </div>


    </body>
</html>
