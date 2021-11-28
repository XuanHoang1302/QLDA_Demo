<!-- <h2 class="text-center" style="display:block;"> <?php echo $msg;?></h2> -->
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
        </tr>
    </thead>
    <tbody>
    <?php
    $index = 1;
    foreach ($search as $item) {
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
        </tr>   
    <?php
            }
    ?>
</tbody>
</table>