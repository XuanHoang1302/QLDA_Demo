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
    <div class="container-fuild" style="height: 730px;background-repeat:no-repeat;background-size:100% 100%;background-image:url(https://image-us.24h.com.vn/upload/1-2018/images/2018-01-25/1516884631-21-2-1516872239-width650height488.jpg);">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6" style="background-color: white;margin:8em 0;padding:2em 5em; ">
        <form action="" method="POST" id="forgot">
          <div class="titile text-center">
            <h2>Đổi mật khẩu cho tài khoản : <?php echo $result['userName']; ?></h2>
          </div>
          <div class="input" style="width:100%;margin:1.5em 0 0.5em 0;">
            <label for="text">Mật khẩu</label>
            <input type="text" name="userName" value="<?php echo $result['userName'];?>" hidden=false>
            <input class="form-control" placeholder="password" type="text" name="passWord" value="<?php echo $reset->passWord ?>" required/>
            <?php if($flag1 == false) {echo '<p style="color: red;">'.$msg1.'</p>';} ?>
          </div>
          <div class="input" style="width:100%;margin:2.5em 0 0.5em 0;">
            <label for="text">Mật khẩu mới</label>
            <input class="form-control" placeholder="New password" type="text" name="newPassWord" value="<?php echo $reset->newPassWord ?>" required/>
          </div>
          <div class="input" style="width:100%;margin:2em 0 3.5em 0;">
            <label for="text">Nhập lại mật khẩu mới</label>
            <input class="form-control" placeholder="Confirm-password" type="text" name="confirm-passWord" value="<?php echo $reset->confirm_passWord ?>" required/>
            <?php if($flag2 == false) {echo '<p style="color: red;">'.$msg2.'</p>';} ?>
          </div>
          <div class="text-right" style="width:100%;display:flex;justify-content:flex-end;">
            <button id="submit" name="action" value="save" type="submit" class="btn btn-primary btn-lg">
              Đồng ý
            </button>
          </div>
        </form>
        </div>
        <div class="col-md-3"></div>
      </div>
    </div>

  </body>
</html>