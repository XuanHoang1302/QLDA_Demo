
<style>
    .btn_category {
       background-color:hsla(50, 33%, 25%, .2);
       margin:2px 2px;
       border: none;
    }
    .btn_category:hover {
        color: #fff;
        background-color: #999;
    }
    .link {
        text-align: center;
        color:black; 
        width:400px;
        height:25px;
        background-color: gray;
        margin:1px 2px;
    }
    .page {
        color: black;
        list-style: none;
        font-size: 1.4em;
        padding: 0 15px;
        margin: 5px 3px;
        background-color: white;
    }
    .page:hover {
        color: red;
        list-style: none;
        text-decoration: none;
    }
    .listPage {
        background-color: #ccc;
    }
</style>
    <div class="container" >
        <div class="panel panel-primary">
            <!-- <div class="search">
                <input type="text" placeholder="Nhập thông tin">
            </div> -->
            <div class="panel-heading">
                <h2 class="text-center">Quản Lý Danh Mục</h2>
            </div>
            <div class="panel-body" id="data">
                    <div style="display: flex;justify-content:space-between;">
                        <button id="btn_add" class="btn btn-success" style="margin-bottom: 20px;"> Thêm danh mục </button>
                        <!-- <input onchange="search(this.value);" type="text" placeholder="Nhập thông tin"> -->
                    </div>
                    <div   >
                        <div id="dataLoadPage">
                            <p>Trang hiện tại : <?php echo $curentPage ; ?> </p>
                            <table class="table table-bordered" >
                                <thead>
                                    <tr>
                                        <th width="50px"> STT </th>
                                        <th> id </th>
                                        <th> Tên danh mục</th>
                                        <th width="50px"></th>
                                        <th width="50px"></th>
                                    </tr>
                                </thead>
                                <tbody>
        <?php
        $index = 1;
        foreach ($category_list as $item) {
        ?>
                    <tr>
                        <td><?php echo $index++; ?></td>
                        <td><?php echo $item->categoryId; ?></td>
                        <td><?php echo $item->categoryName; ?></td>
                        <td>
                            <a href="#" class="btn_update" data-id=<?php  echo $item->categoryId ?>> 
                                Sửa   
                            </a>
                        </td>
                        <td>
                            <a class="btn_delete" data-id=<?php  echo $item->categoryId ?> href="#">
                                Xóa
                            </a>
                        </td>
                    </tr>   
        <?php
        }
        ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="listPage text-center">
                        <?php
                            for($i = 1 ; $i <= $totalPage ; $i++) {
                                print '<a class="page" href="#" data-id="'.$i.'">'.$i.'</a>&nbsp;&nbsp';
                            }
                        ?>
                    </div>
                </div>

</div>

        </div>
<!-- <script>
    function search(text) {
        var id = 
        $.ajax({
        type: "POST",
        url: "index.php?controller=search",
        data: {text:text},
        success: function(result) {
            $("#dataLoadPage").html(result);
        }
    });
    }
</script> -->
    </div>