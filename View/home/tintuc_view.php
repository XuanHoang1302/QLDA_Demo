<h1 style="color: #2961f3; text-align: center; margin-top: 20px; margin-bottom: 20px;">Tin Tức</h1>
<div class="a">
    <?php
        $count = 0;
        foreach($result as $news)
        {
            $count++;
            if($count%2!=0) {
                echo ' <div class="row " style="margin:3em 0;display:flex;justify-content:flex-start">
                            <div class="col-md-7 ">
                                <h2 class="chitiet-noibat">'.$news->title.'</h2>
                                <p class="chitiet-phu">'.$news->content.'</p>
                                <p> '.$news->start.' -- '.$news->end.' </p>
                            </div>
                            <div class="col-md-5">
                                <img src="'.$news->img.'" style="width:80%" alt="part image" class="img-fluid">
                            </div>
                        </div> ';
            }
            else{
                echo ' <div class="row " style="margin:3em 0;display:flex;justify-content:flex-end">
                                <div class="col-md-5">
                                    <img src="'.$news->img.'" style="width:80%" alt="">
                                </div>
                                <div class="col-md-7">
                                    <h2 class="chitiet-noibat">'.$news->title.'</h2>
                                    <p class="chitiet-phu"> '.$news->content.'</p>
                                    <p> '.$news->start.' -- '.$news->end.' </p>
                                </div>
                            </div> ';    
            }
        }
    ?>
</div>
<div class="container text-center" style="background-color: gray;display:flex;margin-top:35px;justify-content:center">
    <?php
        for ($i = 1; $i <= $totalPage; $i++) {
            echo '<a style="margin:1px 5px;" class="page"  href="#">' . $i . '</a> ';
        }
    ?>
</div>

