
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
                <h2 class="text-center">Nhập Thông Tin Tác Giả</h2>
            </div>
            <div class="panel-body">
                <form method="post" id="update">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <?php echo '<h2 style="color:red" class="text-center"> '.$msg.' <h2>'; ?>
                            </div>
                            <div class="form-group">
                                <label for="text">Tên Tác Giả :</label>
                                <input class="input"  type="text"  placeholder="" name="authId" value='<?= $auth_list->authId ?>' hidden=false>
                                <input class="input"  type="text"  placeholder="Tên Tác Giả" name="authName" value="<?php echo $auth_list->authName ?>" required/>
                            </div>
                            <div class="form-group">
                                <label for="text">Link img :</label>
                                <input class="input"  type="text"  placeholder="URL:" name="authImg" value="<?php echo $auth_list->authImg ?>" required/>
                            </div>
                            <div class="form-group">
                                <label for="text">Địa chỉ :</label>
                                <input class="input"  type="text"  placeholder="Địa chỉ" name="authAdress" value="<?php echo $auth_list->authAdress; ?>" required/>
                            </div>
                            <div class="form-group">
                                <label for="text"> Số điện thoại :</label>
                                <input class="input"  type="number"  placeholder="Số điện thoại" name="authPhone" value="<?php echo $auth_list->authPhone ?>" required/>
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
