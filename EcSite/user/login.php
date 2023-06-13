<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<form method="post" action="login_act.php">
<section class="text-gray-600 body-font relative">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-12">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">ログイン</h1>
    </div>
    <div class="lg:w-1/2 md:w-2/3 mx-auto">
      <div class="flex flex-col -m-2 justify-center items-center">
        <div class="p-2 w-1/2">
          <div class="relative">
            <label for="email" class="leading-7 text-sm text-gray-600">メールアドレス　＊</label>
            <input type="email" id="email" name="email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
        </div>
        <div class="p-2 w-1/2">
          <div class="relative">
            <label for="pw" class="leading-7 text-sm text-gray-600">パスワード　＊</label>
            <input type="password" id="pw" name="pw" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
        </div>
      </div>
      <br>
      <br>
      <div class="flex flex-col text-center w-full">
        <a href="" class="flex mx-auto text-sm">パスワードをお忘れですか？</a> 
      </div>
      <div class="p-2 w-full">
        <button class="flex mx-auto m-2 text-white bg-slate-700 border-0 py-2 px-8 focus:outline-none hover:bg-slate-900 rounded text-ms">ログイン</button>
      </div>
      <div class="flex flex-col text-center w-full mb-12">
        <a href="user.php" class="flex mx-auto text-sm ">アカウント作成する</a>
      </div>
      <br>
      <br>
      <br>
      <div class="flex flex-col text-center w-full mb-12">
        <a href="../index.php" class="flex mx-auto text-sm">戻る</a>
      </div>
    </div>
  </div>
</section>
</form>

</body>
</html>