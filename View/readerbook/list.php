
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

</style>

    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center">Quản lý sách cho mượn </h2>
            </div>
            <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="50px"> STT </th>
                                <th> Tên người mượn</th>
                                <th> Tên sách </th>
                                <th> Số lượng</th>
                                <th> Ngày mượn </th>
                                <th> Ngày trả</th>
                                <th> Tình trạng</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
$index = 1;
foreach ($readerbook_list as $item) {
?>
            <tr>
                <td><?php echo $index++; ?></td>
                <td><?php echo $item->userName; ?></td>
                <td><?php echo $item->bookName; ?></td>
                <td><?php echo $item->quantity; ?></td>
                <td> <?php echo $item->startPayment; ?></td>
                <td> <?php echo $item->endPayment; ?></td>
                <td> <?php echo $item->Status; ?></td>
            </tr>   
<?php
        }
?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>      