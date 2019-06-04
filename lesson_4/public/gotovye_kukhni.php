<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=1240" name="viewport" id="viewport">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="js/jquery-3.3.1.min.js"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"></link>
    <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.js"integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"></link>

    <link rel="stylesheet" href="style/style.css">

    <script defer src="js/show_more_products.js"></script>
    
    <title>Магазин мебели - Мебель для Вас</title>
</head>
<body ontouchstart="">
    <div class="wrapper">
        <header>
            <?php include("../templates/header_top_menu.php");?>

            <?php include("../templates/header_center.php");?>

            <?php include("../templates/header_bottom_menu.php");?>
        </header>
            

        <main>
            <nav class="breadcrumbs_wrapper">
                <ul class="breadcrumbs">
                    <li><a href="#">Главная</a></li>
                    <li><a href="#">Каталог</a></li>
                    <li class="active">Готовые кухни</li>
                </ul>
            </nav>
            
            <div class="catalog_wrapper">
                <section class="product_category_page">
                    <h2 class="uppercase">Готовые кухни</h2>
                    <?php include("../templates/catalog_product_category_page.php");?>            
                </section>                
            </div>   
        </main>

        <footer>
            <?php include("../templates/footer.php");?>
        </footer>
        
    </div>
</body>
</html>