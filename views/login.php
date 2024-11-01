<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyStoreQuel - Seu CRUD MySQL de produtos favorito</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="icon" href="imgs/icon.png">
    <link rel="stylesheet" href="styles/font.css">
</head>

<body class="flex justify-center items-center flex-col overflow-auto overflow-x-hidden bg-[#D6E8F5]">
    <section class="fixed z-10 top-0 w-screen h-16 flex justify-center items-center self-start bg-[#325975] shadow-2xl drop-shadow-2xl">
        <div class="w-1/4 h-full flex justify-center items-center">
            <a href="index.php" class="w-7/12 h-5/6 flex justify-center items-center">
                <img src="imgs/brand1.png" class="max-w-full max-h-full" alt="">
            </a>
        </div>
    </section>
    <main class="mt-16 z-0 w-screen h-96 flex justify-center items-center">
        <div class="w-2/4 flex justify-center items-center">
            <form action="fazerLogin.php" method="post" class="w-1/2 flex justify-start items-center flex-col bg-[#BCCCD8] gap-y-0.5 rounded-lg shadow-2xl drop-shadow-2xl border-2 border-solid border-[#8A969E]">
                <div class="mt-3 w-full h-16 flex justify-evenly items-center flex-col">
                    <label for="login" class="self-start pl-7 text-sm font-bold">Login</label>
                    <input type="text" name="login" id="login" class="w-11/12 h-1/2 border-2 border-solid border-[#8A969E] text-sm px-2 outline-0">
                </div>
                <div class="mt-3 w-full h-16 flex justify-evenly items-center flex-col">
                    <label for="senha" class="self-start pl-7 text-sm font-bold">Sua senha</label>
                    <input type="password" name="senha" id="senha" class="w-11/12 h-1/2 border-2 border-solid border-[#8A969E] text-sm px-2 outline-0">
                </div>
                <div class="w-full h-16 flex justify-around items-center">
                    <button type="reset" class="w-1/3 py-2 text-sm font-bold bg-[#325975] text-white rounded-lg border-2 border-solid border-[#3F7092] transition-all cursor-pointer drop-shadow-2xl shadow-2xl hover:bg-[#3F7092] active:bg-[#4B85AE]">Clear</button>
                    <button type="submit" class="w-1/3 py-2 text-sm font-bold bg-[#325975] text-white rounded-lg border-2 border-solid border-[#3F7092] transition-all cursor-pointer drop-shadow-2xl shadow-2xl hover:bg-[#3F7092] active:bg-[#4B85AE]">Submit</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>