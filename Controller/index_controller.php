
<?php
session_start();
require_once("model/home_model.php");
require_once("model/book_model.php");
require_once("model/entity.php");
class index_controller {
    private $home_model;
    private $book_model;
    function __construct() {
        $this->book_model = new book_model;
        $this->home_model = new home_model;
    }
   
    public function run() {
        $action = filter_input(INPUT_GET,'action');

        if (method_exists($this,$action)) {
            $this->$action();
        }
        else {
            $this->list();
        }
    }

    function list() {
        // lấy thông tin người dùng từ cookie
        $getStatus = false;
        $User = [];
        if (isset($_COOKIE['token'])) {
            $getUserName = $_COOKIE['token'];
            $User = $this->home_model->getUser($getUserName);
            //$this->login_model->InsertOrders($User);
            $getStatus = true;
        }
        else {
            $getStatus = false;
            $User['Role'] = 'reader';
            //header("location: index.php?controller=login");
        }
    
        // truy xuất vào sql lấy dl và đưa vào biến home_list
        $curentPage = filter_input(INPUT_POST,'_page');
        if(empty($curentPage)) {$curentPage=1;}
       
        $home_row = $this->home_model->getNumber();
        $totalPage = ceil($home_row/8);
        $home_list = $this->home_model->select($curentPage);
        $category_list = $this->book_model->selectCategory();
        $publish_list = $this->book_model->selectPublish();
        $auth_list = $this->book_model->selectAuth();        
        require_once("View/home/homelist_view.php");
    }

    function Pay() {
        if (isset($_COOKIE['token'])) {
            $getEmail = $_COOKIE['token'];
            $this->home_model->Pay($getEmail);
            header("location:index.php");
        }
    }

    function load() {
        // truy xuất vào sql lấy dl và đưa vào biến home_list
        $curentPage = filter_input(INPUT_POST,'_page');
        if(empty($curentPage)) {$curentPage=1;}
       
        ///
        $home_row = $this->home_model->getNumber();
        $totalPage = ceil($home_row/8);
        $home_list = $this->home_model->select($curentPage);        
        require_once("View/home/list_view.php");
    }
    function show() {
        // truy xuất vào sql lấy dl và đưa vào biến home_list
        $id = filter_input(INPUT_POST,'id');
        $result = $this->home_model->selectId($id);  
        require_once("View/home/show_view.php");
    }

    function card() {
        // truy xuất vào sql lấy dl và đưa vào biến home_list
        if(isset($_COOKIE['token'])) {
            $id = filter_input(INPUT_POST,'id');
            $quantity = 1;
            $result = $this->home_model->selectId($id);  
            //session_destroy();
            if (isset($_SESSION['cart'])) {
                $flag = false;
                $product=$_SESSION['cart'];
                foreach($_SESSION['cart'] as $item) {
                    if ($item['id'] == $id) { 
                        $flag = true;
                    }
                }
                if ($flag == false) {
                    $product[$id] =  array('id' => $result->bookId,'name' => $result->bookName,'img' => $result->bookImg,'price' => $result->bookPrice,'categoryName' => $result->categoryName,'quantity' => $quantity,
                    'publishName' => $result->publishName,'authName' => $result->authName);    
                }
            }
            else {
                $result = $this->home_model->selectId($id); 
                $product[$id] = array('id' => $result->bookId,'name' => $result->bookName,'img' => $result->bookImg,'price' => $result->bookPrice,'categoryName' => $result->categoryName,'quantity' => $quantity,
                'publishName' => $result->publishName,'authName' => $result->authName); 
                //$_SESSION['cart'] = $product;
            }
            $_SESSION['cart'] = $product;   
            require_once("View/home/card_view.php");
        }
        else {
            header("location:index.php?controller=login");
        }
    }

    function dichvu() {
        // truy xuất vào sql lấy dl và đưa vào biến home_list
        require_once("View/home/dichvu_view.php");
    }
    function tintuc() {
        // truy xuất vào sql lấy dl và đưa vào biến home_list
        $home_row = $this->home_model->getNumberNews();
        $totalPage = ceil($home_row/4);

        $curentPage = filter_input(INPUT_POST,'_page');
        if(empty($curentPage)) {$curentPage=1;}
        $result = $this->home_model->getNews($curentPage);

        require_once("View/home/tintuc_view.php");
    }
    
    function delete() {
        $id = filter_input(INPUT_POST,'id');
        unset($_SESSION['cart']["$id"]);
        require_once("View/home/card_view.php");
    }

    function save() {
        $getUserName = $_COOKIE['token'];
        $User = $this->home_model->getUser($getUserName); 
        $book = $_SESSION['cart'];
        $this->home_model->InsertOrdersBook($User,$book);
        require_once("View/home/card_view.php");
    }
    function search() {
        $listdata = filter_input(INPUT_POST,"listdata");
        parse_str($listdata,$arrdata);
        $result = $this->home_model->search($arrdata);
      require_once("View/home/search_view.php");
   }
}
?>
    

   

   
