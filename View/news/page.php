<p>Trang hiện tại : <?php echo $curentPage ; ?> </p>
                        <table class="table table-bordered" >
                            <thead>
                                <tr>
                                    <th width="50px"> STT </th>
                                    <th> id </th>
                                    <th> Ảnh </th>
                                    <th> Tiêu đề</th>
                                    <th> Nội đung </th>
                                    <th> Ngày bắt đầu </th>
                                    <th> Ngày kết thúc </th>
                                    <th width="50px"></th>
                                    <th width="50px"></th>
                                </tr>
                            </thead>
                            <tbody>
    <?php
    $index = 1;
    foreach ($news_list as $item) {
    ?>
                <tr>
                <td><?php echo $index++; ?></td>
                        <td><?php echo $item->newsId; ?></td>
                        <td><img src="<?php echo $item->newsImg; ?>" alt="" style="width:100px;"></td>
                        <td><?php echo $item->newsTitle; ?></td>
                        <td><?php echo $item->newsContent; ?></td>
                        <td><?php echo $item->newsStart; ?></td>
                        <td><?php echo $item->newsEnd; ?></td>
                        <td>
                            <a href="#" class="btn_update" data-id=<?php  echo $item->newsId ?>> 
                                Sửa   
                            </a>
                        </td>
                        <td>
                            <a class="btn_delete" data-id=<?php  echo $item->newsId ?> href="#">
                                Xóa
                            </a>
                        </td>
                </tr>   
    <?php
            }
    ?>
                        </tbody>
                    </table>
