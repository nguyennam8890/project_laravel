<?php
namespace App\library;
//1- Đường dẫn file functions.php: E:\PHP\xampp\htdocs\www\framework\project_laravel\app\KhoaPham\functions.php
//2- Cấu hình trong file E:\PHP\xampp\htdocs\www\framework\project_laravel\composer.json
/*3- Viết thêm đoạn này vào
"files" :[
            "app/KhoaPham/functions.php"
        ]*/
//4- Mở Command window here: php composer.phar dump-autoload
//5- changeTitle dùng để tạo alias trong một bảng changeTitle($str) --> $str là chuỗi cần đưa vào để chuyển đổi

class myFunctions {
    public $recursive;
    public function __construct()
        {
            $this->recursive = NULL;
        }
    public function is_ok() {
            return 'myFunction is OK';
        }
    public function removeUtf8($str='')
        {
             $chars = array(
                       'a'=>array('á','à','ả','ã','ạ','ă','ắ','ặ','ằ','ẳ','ẵ','â','ấ','ầ','ẩ','ẫ','ậ','Á','À','Ả','Ã','Ạ','Ă','Ắ','Ặ','Ằ','Ẳ','Ẵ','Â','Ấ','Ầ','Ẩ','Ẫ','Ậ'),
                        'd'=>array('đ','Đ'),
                        'e'=>array('é','è','ẻ','ẽ','ẹ','ê','ế','ề','ể','ễ','ệ','É','È','Ẻ','Ẽ','Ẹ','Ê','Ế','Ề','Ể','Ễ','Ệ'),
                        'i'=>array('í','ì','ỉ','ĩ','ị','Í','Ì','Ỉ','Ĩ','Ị'),
                        'o'=>array('ó','ò','ỏ','õ','ọ','ô','ố','ồ','ổ','ỗ','ộ','ơ','ớ','ờ','ở','ỡ','ợ','Ó','Ò','Ỏ','Õ','Ọ','Ô','Ố','Ồ','Ổ','Ỗ','Ộ','Ơ','Ớ','Ờ','Ở','Ỡ','Ợ'),
                        'u'=>array('ú','ù','ủ','ũ','ụ','ư','ứ','ừ','ử','ữ','ự','Ú','Ù','Ủ','Ũ','Ụ','Ư','Ứ','Ừ','Ử','Ữ','Ự'),
                        'y'=>array('ý','ỳ','ỷ','ỹ','ỵ','Ý','Ỳ','Ỷ','Ỹ','Ỵ'),
               );
              foreach($chars as $key=>$arr){
               foreach ($arr as $val) {
                $str = str_replace($val,$key,$str);
               }
              }
              return $str;
        }
     public function slug($str ='')
         {
            $str = $this->removeUtf8($str);
            $str = strtolower($str);
            $str = preg_replace('/[^a-z0-9 ]+/i','',$str);//Xóa bỏ các ký tự đặc biệt
            $str = preg_replace('/[[:blank:]]+/','-',$str);//Xóa bỏ khoảng trắng giữa hai ký tự

            return $str;
         }
    //lẤY ĐƯỜNG DẪN TUYỆT ĐỐI
    public function fullurl()
        {
            $ssl      = ( isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' )?TRUE:FALSE;
            $sp       = strtolower( $_SERVER['SERVER_PROTOCOL'] );
            $protocol = substr( $sp, 0, strpos( $sp, '/' ) ) . ( ( $ssl ) ? 's' : '' );
            $port     = $_SERVER['SERVER_PORT'];
            $port     = ( ( ! $ssl && $port=='80' ) || ( $ssl && $port=='443' ) ) ? '' : ':'.$port;
            $host     = ( isset($use_forwarded_host) && isset( $_SERVER['HTTP_X_FORWARDED_HOST'] ) ) ? $_SERVER['HTTP_X_FORWARDED_HOST'] : ( isset( $_SERVER['HTTP_HOST'] ) ? $_SERVER['HTTP_HOST'] : null );
            $host     = isset( $host ) ? $host : $_SERVER['SERVER_NAME'] . $port;
            return $protocol . '://' . $host.$_SERVER['REQUEST_URI'];
        }
    //Hàm để quy danh mục
    public function recursive($parentid = 0, $data = NULL, $step = '', $type = 'dropdown')//recursive:đệ quy
         {
            if(isset($data))
            {

                foreach($data as $key => $val)
                {

                    if($val['parent_id'] == $parentid)
                    {

                        if($type  == 'dropdown'){
                            $this->recursive[$val['id']] = $step.' '.$val['name'];
                        }
                        else if($type  == 'view')
                        {
                            $val['name'] = $step.' '.$val['name'];
                            $this->recursive[$val['id']] = $val;
                        }
                        $this->recursive($val['id'], $data, $step.'|_____ ',$type);

                    }
                }

            }
            return $this->recursive;
         }
     public function dropdown($default = '', $data = NULL)//recursive:đệ quy
         {
            $temp[0] = $default;
            if(isset($data) && is_array($data))
            {
                foreach($data as $key => $val)
                {
                    $temp[$key] = $val;
                }
            }
            return $temp;
         }
}
