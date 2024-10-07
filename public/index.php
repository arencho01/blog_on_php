<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../vendor/autoload.php';

require_once '../src/core/Controller.php';
require_once '../src/core/View.php';
require_once '../src/controllers/PostController.php';

//require_once __DIR__ . '/../vendor/autoload.php';
//
//use Blog\models\Post;
//?>
<!---->
<!--<!--Header-->-->
<?php
//    require_once '../src/views/total/header.php';
//?>
<!---->
<?php
//    if(isset($_GET['act'])) {
//        switch($_GET['act']) {
//            case 'register' :
//                require_once '../src/views/total/register.php';
//                break;
//        }
//    } else {
//        require_once '../src/views/total/content.php';
//    }
//
//
//    $cl = new Post();
//    print_r($cl->getPosts());
//?>



<?php
    require_once '../src/views/total/footer.php';
?>



