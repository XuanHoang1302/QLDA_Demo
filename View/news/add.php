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
<div class="container" id="add">
    <div class="panel panel-primary">
        <div class="panel-body">
            <form method="post" id="list">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <?php echo '<h2 style="color:red" class="text-center"> '.$msg.' <h2>'; ?>
                        </div>
                        <div class="form-group">
                            <label for="text">Link ảnh :</label>
                            <input class="input"  type="text"  placeholder="Link ảnh" name="img" required/>
                        </div>
                        <div class="form-group">
                            <label for="text">Tiêu đề :</label>
                            <input class="input"  type="text"  placeholder="Tiêu đề:" name="title" required/>
                        </div>
                        <div class="form-group">
                            <label for="text">Nội dung :</label>
                            <input class="input"  type="text"  placeholder="Nội dung" name="content" required/>
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