<?php
// session_start();
include("../funcs.php");
//変数の初期化
$page_flg = 0;
if(!empty($_POST['btn_confirm'])){
  $page_flg = 1;
} else if(!empty($_POST['btn_submit'])) {
  $page_flg = 2;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<?php if($page_flg === 1): ?>
  <form method="post" action="user_insert.php"> 
<!-- actionが空だと同じphpが返ってくる -->
<section class="text-gray-600 body-font relative">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-12">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">アカウント作成</h1>
    </div>
    <div class="lg:w-1/2 md:w-2/3 mx-auto">
      <div class="flex flex-col -m-2 justify-center items-center">
        <div class="p-2 w-1/2 ">
          <div class="relative">
            <label for="surname" class="leading-7 text-sm text-gray-600">氏名（姓）＊</label>
            <p class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"><?php echo $_POST['surname']; ?></p>
          </div>
        </div>
        <div class="p-2 w-1/2 ">
          <div class="relative">
            <label for="name" class="leading-7 text-sm text-gray-600">氏名（名）＊</label>
            <p class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"><?php echo $_POST['name']; ?></p>
          </div>
        </div>
        <div class="p-2 w-1/2">
          <div class="relative">
            <label for="email" class="leading-7 text-sm text-gray-600">メールアドレス　＊</label>
            <p class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"><?php echo $_POST['email']; ?></p>
          </div>
        </div>
        <div class="p-2 w-1/2">
          <div class="relative">
            <label for="pw" class="leading-7 text-sm text-gray-600">パスワード　＊</label>
            <p class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"><?php echo $_POST['pw']; ?></p>
          </div>
        </div>
      <br>
      <br>
      <div class="flex justify-center"> 
          <input type="submit" name="btn_back" value="戻る" class="m-2 text-white bg-slate-700 border-0 py-2 px-8 focus:outline-none hover:bg-slate-900 rounded text-lg m-">
          <input type="submit" name="btn_submit" value="登録" class="m-2 text-white bg-slate-700 border-0 py-2 px-8 focus:outline-none hover:bg-slate-900 rounded text-lg m-">
        </div>                               
      </div>
    </div>
  </div>
  <input type="hidden" name="surname" value="<?php echo $_POST['surname']; ?>">
  <input type="hidden" name="name" value="<?php echo $_POST['name']; ?>">
  <input type="hidden" name="email" value="<?php echo $_POST['email']; ?>">
  <input type="hidden" name="pw" value="<?php echo $_POST['pw']; ?>">
</section>
</form>

<?php else: ?>

<form method="post" action=""> 
<!-- actionが空だと同じphpが返ってくる -->
<section class="text-gray-600 body-font relative">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-12">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">アカウント作成</h1>
    </div>
    <div class="lg:w-1/2 md:w-2/3 mx-auto">
      <div class="flex flex-col -m-2 justify-center items-center">
        <div class="p-2 w-1/2 ">
          <div class="relative">
            <label for="surname" class="leading-7 text-sm text-gray-600">氏名（姓）＊</label>
            <input type="text" id="surname" name="surname" value="" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-900 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
        </div>
        <div class="p-2 w-1/2 ">
            <div class="relative">
            <label for="name" class="leading-7 text-sm text-gray-600">氏名（名）＊</label>
            <input type="text" id="name" name="name" value="" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
        </div>
        <div class="p-2 w-1/2">
          <div class="relative">
            <label for="email" class="leading-7 text-sm text-gray-600">メールアドレス　＊</label>
            <input type="text" id="email" name="email" value="" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
        </div>
        <div class="p-2 w-1/2">
          <div class="relative">
            <label for="pw" class="leading-7 text-sm text-gray-600">パスワード　＊</label>
            <input type="password" id="pw" name="pw" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
        </div>
      <br>
      <br>
      <div class="flex justify-center"> 
          <a herf="login.php" name="cancel" value="cancel" class="m-2 text-white bg-slate-700 border-0 py-2 px-8 focus:outline-none hover:bg-slate-900 rounded text-lg">キャンセル</a> 
          <input type="submit" name="btn_confirm" value="作成する" class="m-2 text-white bg-slate-700 border-0 py-2 px-8 focus:outline-none hover:bg-slate-900 rounded text-lg m-">
        </div>                               
      </div>
    </div>
  </div>
</section>
</form>
<?php endif; ?>
</body>
</html>
