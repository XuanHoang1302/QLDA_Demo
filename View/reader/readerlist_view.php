<style>
    .btn_reader {
       background-color:hsla(50, 33%, 25%, .2);
       margin:2px 2px;
       border: none;
    }
    .btn_reader:hover {
        color: #fff;
        background-color: #999;
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
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center">Quản Lý Người Dùng</h2>
            </div>
            <div class="panel-body">
                <button id="btn_add" class="btn btn-success" style="margin-bottom: 20px;"> Thêm Người Dùng</button>
                <div id="data">
                    <div id="dataLoadPage">
                        <p>Trang hiện tại : <?php echo $curentPage ; ?> </p>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="50px"> STT </th>
                                    <th> Hình ảnh</th>
                                    <th> Tên Người Dùng</th>
                                    <th> Ngày sinh </th> 
                                    <th> Giới tính </th> 
                                    <th>  Địa chỉ </th>
                                    <th> Email </th>
                                    <th> nghề nghiệp </th>
                                    <th> Role </th>
                                    <th width="50px"></th>
                                    <th width="50px"></th>
                                </tr>
                            </thead>
                            <tbody>
    <?php
    $index = 1;
    foreach ($reader_list as $item) {
    ?>
                <tr>
                    <td><?php echo $index++; ?></td>
                    <td> <img src="<?php echo $item->readerImg; ?>" alt="" style="width:100px;"></td>
                    <td><?php echo $item->readerName; ?></td>
                    <td><?php echo $item->readerBirthDay; ?></td>
                    <td><?php echo $item->readerGender; ?></td>
                    <td><?php echo $item->readerAdress; ?></td>
                    <td><?php echo $item->readerEmail; ?></td>
                    <td><?php echo $item->readerJob; ?></td>
                    <td><?php echo $item->readerRole; ?></td>
                    <td>
                    <a href="#" data-id=<?php  echo $item->readerId ?> class="btn_update">
                       Sửa
                    </a>
                    </td>
                    <td>
                    <a href="#" data-id=<?php  echo $item->readerId ?> class="btn_delete">
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
