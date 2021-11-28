<p>Trang hiện tại : <?php echo $curentPage ; ?> </p>
                        <table class="table table-bordered" >
                            <thead>
                                <tr>
                                    <th width="50px"> STT </th>
                                    <th width="80px"> Publish ID </th>
                                    <th> Hình ảnh</th>
                                    <th> Tên Nhà Xuất Bản</th>
                                    <th> Số điện thoại</th>
                                    <th>  Địa chỉ </th>
                                    <th width="50px"></th>
                                    <th width="50px"></th>
                                </tr>
                            </thead>
                            <tbody>
    <?php
    $index = 1;
    foreach ($publish_list as $item) {
    ?>
                <tr>
                    <td><?php echo $index++; ?></td>
                    <td><?php echo $item->publishId; ?></td>
                    <td> <img src="<?php echo $item->publishImg; ?>" alt="" style="width:100px;"></td>
                    <td><?php echo $item->publishName; ?></td>
                    <td><?php echo $item->publishPhone; ?></td>
                    <td><?php echo $item->publishAdress; ?></td>
                    <td>
                    <a href="#" class="btn_update" data-id=<?php  echo $item->publishId ?>>
                        Sửa
                    </a>
                    </td>
                    <td>
                    <a href="#" class="btn_delete" data-id=<?php  echo $item->publishId ?>>
                        Xóa
                    </a>
                    </td>
                </tr>   
    <?php
            }
    ?>
                        </tbody>
                    </table>