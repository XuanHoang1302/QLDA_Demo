<table class="table table-bordered" >
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
    foreach ($search as $item) {
    ?>
                <tr>
                    <td><?php echo $index++; ?></td>
                    <td> <img src="<?php echo $item->img; ?>" alt="" style="width:100px;"></td>
                    <td><?php echo $item->userName; ?></td>
                    <td><?php echo $item->birthDay; ?></td>
                    <td><?php echo $item->gender; ?></td>
                    <td><?php echo $item->adress; ?></td>
                    <td><?php echo $item->email; ?></td>
                    <td><?php echo $item->job; ?></td>
                    <td><?php echo $item->Role; ?></td>
                    <td>
                    <a onclick="return confirm('bạn có muốn sửa dữ liệu không ?')" href="#" data-id=<?php  echo $item->idCard; ?> class="btn_update">
                       Sửa
                    </a>
                    </td>
                    <td>
                    <a onclick="return confirm('bạn có muốn xóa dữ liệu không ?')" href="#" data-id=<?php  echo $item->idCard; ?> class="btn_delete">
                        Xóa
                    </a>
                    </td>
                </tr>   
    <?php
    }
    ?>
                        </tbody>
                    </table>
