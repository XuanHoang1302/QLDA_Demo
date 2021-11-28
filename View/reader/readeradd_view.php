
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
                <form action="" method="post" id="list">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <?php echo '<h2 style="color:red" class="text-center"> '.$msg.' <h2>'; ?>
                            </div>
                            <div class="form-group">
                                <label for="text">Tên Người Dùng :</label>
                                <input class="input"  type="text"  placeholder="Tên đăng nhập" name="readerName" required/>
                            </div>
                            <div class="form-group">
                                <label for="text">Pass Word :</label>
                                <input class="input"  type="password"  placeholder="PassWord" name="readerPassWord" required/>
                            </div>
                            <div class="form-group">
                                <label for="text">Link img :</label>
                                <input class="input"  type="text"  placeholder="URL:" name="readerImg" required/>
                            </div>
                            <div class="form-group">
                                <label for="text">Ngày sinh:</label>
                                <input class="input"  type="date"  name="readerBirthDay" required/>
                            </div>
                            <div class="form-group">
                                <label for="text">Giới tính:</label>
                                <input class="input"  type="text"  placeholder="Giơi tính:" name="readerGender" required/>
                            </div>
                            <div class="form-group">
                                <label for="text">Nghề nghiệp :</label>
                                <input class="input"  type="text"  placeholder="Nghề nghiệp:" name="readerJob" required/>
                            </div>
                            <div class="form-group">
                                <label for="text">Địa chỉ :</label>
                                <input class="input"  type="text"  placeholder="Địa chỉ" name="readerAdress" required/>
                            </div>
                            <div class="form-group">
                                <label for="text"> Email :</label>
                                <input class="input"  type="email"  placeholder="Email" name="readerEmail" required/>
                            </div>
                            <div class="form-group" style="margin-top: 2em;">  
                                <a type="submit" name="action" value="save" class="btn_submit_add btn btn-primary">Submit</a>
                                <!-- <button type="button" name="action" value="save" class="btn_submit btn btn-primary"> Submit </button> -->
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>