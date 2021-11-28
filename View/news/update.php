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
            <form method="post" id="update">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="form-group">
                                <?php echo '<h2 style="color:red" class="text-center"> '.$msg.' <h2>'; ?>
                            </div>
                        <div class="form-group">
                            <label for="text">Link ảnh :</label>
                            <input class="input"  type="number" name="id" value="<?php echo $news->newsId; ?>" hidden=false >
                            <input class="input"  type="text"  placeholder="Link ảnh" name="img" value="<?php echo $news->newsImg; ?>" required/>
                        </div>
                        <div class="form-group">
                            <label for="text">Tiêu đề :</label>
                            <input class="input"  type="text"  placeholder="Tiêu đề:" name="title" value="<?php echo $news->newsTitle; ?>" required/>
                        </div>
                        <div class="form-group">
                            <label for="text">Nội dung :</label>
                            <input class="input"  type="text"  placeholder="Nội dung" name="content" value="<?php echo $news->newsContent; ?>" required/>
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