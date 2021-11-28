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
    foreach ($search as $item) {
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
                    <a onclick="return confirm('bạn có muốn xóa dữ liệu không ?')" href="#" data-id=<?php  echo $item->authId ?> class="btn_delete">
                        Xóa
                    </a>
                    </td>
                </tr>   
    <?php
    }
    ?>
                        </tbody>
                    </table>
