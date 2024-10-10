<?php
namespace App\views\viewCore;

use Exception;

class View {
    public static function render($view, $data = []) {

        extract($data);
//        var_dump($data);

        $viewFile = __DIR__ . "/../" . $view . ".php";

        // Проверяю существует ли файл
        if (file_exists($viewFile)) {
            include_once __DIR__ . "/../$view.php";
        } else {
            throw new Exception("View $view not found");
        }
    }



//    public static function trimPostsContent($data) {
//        $data = $data['posts'];
//        var_dump($data);
//
//        for ($i = 0; $i < count($data['posts'][$i]); $i++ ) {
//            print_r($data['posts'][$i]);
//
//            foreach ($data['posts'][$i] as $key => $value) {
//                if($key == 'content' && mb_strlen($value, 'UTF-8') > 50) {
//                    $data['posts'][$i][$key] = mb_substr($value, 0, 50, 'UTF-8');
//                    var_dump($data['posts'][$i][$key]);
//                    $res = mb_substr($value, 0, 50, 'UTF-8');
//                    $data['posts'][$i][$key] = $res;
//
//                    echo $key . ": " . $res . "<br />";
//                }
//                echo $key . ": " . $value . "<br />";
//            }
//
//            if($data['posts'][$i] == 'content') {
//                echo $data['posts'][$i];
//            }
//        }
//        foreach ($data as $key => $value) {
//        var_dump($value);
//            var_dump($key, $value);
//            echo $key;
//            if($key == 'content' && mb_strlen($value, 'UTF-8') > 50) {
//                $data[$key] = mb_substr($value, 0, 50, 'UTF-8');
//                var_dump($key);
//            }
//        }
//
//        if(mb_strlen($str) > 50) {
//            return mb_substr($str, 0, 50);
//        }
//        var_dump($data);
//
//        return $data;
//    }

}