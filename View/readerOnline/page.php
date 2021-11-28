<p>Trang hiện tại : <?php echo $curentPage ; ?> </p>
                        <table class="table table-bordered">
                        <thead>
                                <tr>
                                    <th width="50px"> STT </th>
                                    <th width="100px"> Auth ID </th>
                                    <th> Hình ảnh</th>
                                    <th> Tên Người Dùng</th>
                                    <th> Ngày sinh </th> 
                                    <th> Giới tính </th> 
                                    <th>  Địa chỉ </th>
                                    <th> Email </th>
                                    <th> nghề nghiệp </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $index = 1;
                            foreach ($reader_list as $item) {
                            ?>
                                <tr>
                                    <td><?php echo $index++; ?></td>
                                    <td><?php echo $item->readerId; ?></td>
                                    <td> <img src="<?php echo $item->readerImg; ?>" alt="" style="width:100px;"></td>
                                    <td><?php echo $item->readerName; ?></td>
                                    <td><?php echo $item->readerBirthDay; ?></td>
                                    <td><?php echo $item->readerGender; ?></td>
                                    <td><?php echo $item->readerAdress; ?></td>
                                    <td><?php echo $item->readerEmail; ?></td>
                                    <td><?php echo $item->readerJob; ?></td>
                                </tr>   
                            <?php
                                    }
                            ?>
                        </tbody>
                    </table>