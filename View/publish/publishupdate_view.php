
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
            <div class="panel-body">
                <form action="" method="post" id="update">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <?php echo '<h2 style="color:red" class="text-center"> '.$msg.' <h2>'; ?>
                            </div>
                            <div class="form-group">
                                <label for="text">Tên Tác Giả :</label>
                                <input class="input"  type="text"  placeholder="" name="publishId" value='<?= $publish_list->publishId ?>' hidden=false>
                                <input class="input"  type="text"  placeholder="Tên Tác Giả" name="publishName" value="<?php echo $publish_list->publishName ?>" required/>
                            </div>
                            <div class="form-group">
                                <label for="text">Link img :</label>
                                <input class="input"  type="text"  placeholder="URL:" name="publishImg" value="<?php echo $publish_list->publishImg ?>" required/>
                            </div>
                            <div class="form-group">
                                <label for="text">Địa chỉ :</label>
                                <input class="input"  type="text"  placeholder="Địa chỉ" name="publishAdress" value="<?php echo $publish_list->publishAdress; ?>" required/>
                            </div>
                            <div class="form-group">
                                <label for="text"> Số điện thoại :</label>
                                <input class="input"  type="number"  placeholder="Số điện thoại" name="publishPhone" value="<?php echo $publish_list->publishPhone ?>" required/>
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
