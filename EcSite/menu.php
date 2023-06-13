<div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
    <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
        <?php if($_SESSION["life_flg"] == "1") { ?>
               <span class="text-black text-4xl"><?=$_SESSION["surname"],$_SESSION["name"]?></span><span class="text-black text-xl">さん</span>
        <?php } ?>
    </a>
    <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
        <form action="search_act.php" class="md:ml-auto flex items-center text-base justify-center ">
            <input type="text" name="search_word" placeholder="アイテムを探す" class="search-box border-solid border-red-200">
            <input type="image" name="search" src="images/search.png" class="mr-5 p-1.5 bg-red-200">
        </form>
        <a href="log.php" class="mr-5"><img src="images/log.png"></a>
        <?php if($_SESSION["kanri_flg"] == "2") { ?>
            <a href="cms/kanri.php" class="mr-5 hover:text-gray-900 text-black"><img src="images/kanri.png"></a>
        <?php } ?>        
        <a href="cart.php" class="mr-5 hover:text-gray-900 text-black"><img src="images/cart.png"></a>  
        <?php if(isset($_SESSION["life_flg"]) && $_SESSION["life_flg"] == "1") {?> 
        <a href="user/logout.php" class="mr-5 hover:text-gray-900 text-black"><img src="images/logout.png"></a>     
        <?php } else {?>    
        <a href="user/login.php" class="mr-5 hover:text-gray-900 text-black"><img src="images/login.png"></a> 
        <?php } ?>
    </nav>
</div>    
