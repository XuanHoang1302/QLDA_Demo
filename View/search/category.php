<h2>Danh mục</h2>
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