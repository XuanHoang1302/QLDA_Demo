<style>
.input {
    outline:none;
     width:100%;
     height:40px;
     margin-top: 5px;
     border-radius: 2px;
}
.btn_submit {
    background-color:royalblue ;
    margin-top: 15px; 
    outline:none;
    border-radius: 2px;
}
</style>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center">Nhập Thông Tin Người Dùng</h2>
            </div>
            <div class="panel-body">
                <form action="" method="post" id="update" >
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="text-center">
                                <h2><?php  echo "Thay đổi thông tin cho tài khoản : ".$reader_list->readerName;  ?></h2>
                            </div>
                            <div class="form-group">
                                <?php echo '<h2 style="color:red" class="text-center"> '.$msg.' <h2>'; ?>
                            </div>
                            <div class="form-group">
                                <input class="input"  type="number"  placeholder="readerId" name="readerId" value="<?php  echo $reader_list->readerId; ?>" hidden=false>
                            </div>
                            <div class="form-group">
                                <input class="input"  type="text"  placeholder="Tên người dùng" name="readerName" value="<?php  echo $reader_list->readerName; ?>" >
                            </div>
                            <div class="form-group">
                                <label for="text">Link img :</label>
                                <input class="input"  type="text"  placeholder="URL:" name="readerImg" value="<?php echo $reader_list->readerImg; ?>" required/>
                            </div>
                            <div class="form-group">
                                <label for="text">Ngày sinh:</label>
                                <input class="input"  type="date"  name="readerBirthDay" value="<?php echo $reader_list->readerBirthDay; ?>" required/>
                            </div>
                            <div class="form-group">
                                <label for="text">Giới tính:</label>
                                <input class="input"  type="text"  placeholder="Giơi tính:" name="readerGender" value="<?php echo $reader_list->readerGender; ?>" required/>
                            </div>
                            <div class="form-group">
                                <label for="text">Nghề nghiệp :</label>
                                <input class="input"  type="text"  placeholder="Nghề nghiệp:" name="readerJob" value="<?php echo $reader_list->readerJob; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="text">Địa chỉ :</label>
                                <input class="input"  type="text"  placeholder="Địa chỉ" name="readerAdress" value="<?php echo $reader_list->readerAdress; ?>" required/>
                            </div>
                            <div class="form-group">
                                <label for="text"> Role :</label>
                                <input class="input"  type="text"  placeholder="Địa chỉ" name="readerRole" value="<?php echo $reader_list->readerRole; ?>" required/>
                            </div>
                            <div class="form-group" style="margin-top: 2em;">
                                <a type="submit" name="action" value="save" class="btn_submit_update btn btn-primary">Submit</a>
                            </div> 
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
   

