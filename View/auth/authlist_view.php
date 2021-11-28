
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
            <div class="panel-heading">
                <h2 class="text-center">Quản Lý Tác giả</h2>
            </div>
            <div class="panel-body" id="data">
                    
                    <button id="btn_add" class="btn btn-success" style="margin-bottom: 20px;"> Thêm Tác giả </button>
                    <div>
                        <div id="dataLoadPage">
                        <p>Trang hiện tại : <?php echo $curentPage ; ?> </p>
                        <table class="table table-bordered" >
                            <thead>
                                <tr>
                                    <th width="50px"> STT </th>
                                    <th width="100px"> Auth ID </th>
                                    <th> Hình ảnh</th>
                                    <th> Tên Tác Giả</th>
                                    <th> Số điện thoại</th>
                                    <th>  Địa chỉ </th>
                                    <th width="50px"></th>
                                    <th width="50px"></th>
                                </tr>
                            </thead>
                            <tbody>
    <?php
    $index = 1;
    foreach ($auth_list as $item) {
    ?>
                <tr>
                    <td><?php echo $index++; ?></td>
                    <td><?php echo $item->authId; ?></td>
                    <td> <img src="<?php echo $item->authImg; ?>" alt="" style="width:100px;"></td>
                    <td><?php echo $item->authName; ?></td>
                    <td><?php echo $item->authPhone; ?></td>
                    <td><?php echo $item->authAdress; ?></td>
                    <td>
                    <a href="#" data-id=<?php  echo $item->authId ?> class="btn_update">
                       Sửa
                    </a>
                    </td>
                    <td>
                    <a href="#" data-id=<?php  echo $item->authId ?> class="btn_delete">
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
    </div>
   
