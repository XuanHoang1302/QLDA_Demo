<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container-fuild" style="height: 730px;background-repeat:no-repeat;background-size:100% 100%;background-image:url(https://danviet.mediacdn.vn/upload/2-2015/images/2015-05-28/1434174151-tariplitvice_lakes_croatia1_wndk.jpg);">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6" style="background-color: white;margin:12em 0;padding:2em 5em; ">
        <form action="" method="POST" id="forgot">
          <div class="titile text-center">
            <h2>Nhập thông tin email</h2>
          </div>
          <div class="input text-center" style="width:100%;margin:1.5em 0 0.5em 0;">
            <input class="form-control" placeholder="email" type="gmail" name="email" value="<?php echo $email; ?>" required/>
            <p style="color: red;"><?php if(!$result) {echo $msg;} ?></p>
          </div>
          <div class="text-right" style="width:100%;display:flex;justify-content:flex-end;">
            <button  onclick="return confirm('Check email để lấy thông tin đăng nhập ?')"  id="submit" name="action" value="save" type="submit" class="btn btn-primary btn-lg">
              Next
            </button>
          </div>
        </form>
        </div>
        <div class="col-md-3"></div>
      </div>
    </div>
  </body>
</html>