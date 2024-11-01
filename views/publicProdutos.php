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
    <aside id="aside_menu" class="fixed w-0 h-screen top-0 left-0 z-20 transition-all flex justify-start items-center flex-col bg-[#1C4867] shadow-2xl drop-shadow-2xl border-r-[3px] border-solid border-[#235B83] overflow-hidden">
        <div class="w-full h-16 flex justify-center items-center drop-shadow-2xl text-base text-white font-bold">
            <div class="w-9/12 h-full flex justify-center items-center"><h2>Menu Rápido</h2></div>
            <div class="w-3/12 h-full flex justify-center items-center">
                <button id="close_menu" onclick="menu_interact(this)" class="w-9 h-9 flex justify-center items-center rounded-lg text-lg transition-all cursor-pointer hover:bg-red-500 active:bg-red-400"><i class="fa-solid fa-xmark"></i></button>
            </div>
        </div>
        <a href="index.php" class="w-full h-16 flex justify-center items-center transition-all cursor-pointer drop-shadow-2xl bg-[#235B83] shadow-2xl active:bg-[#2B6F9F] text-base text-white font-semibold">Home</a>
        <a href="categorias.php" class="w-full h-16 flex justify-center items-center transition-all cursor-pointer drop-shadow-2xl hover:bg-[#235B83] hover:shadow-2xl active:bg-[#2B6F9F] text-base text-white font-semibold">Gerenciar Categorias</a>
        <a href="produtos.php" class="w-full h-16 flex justify-center items-center transition-all cursor-pointer drop-shadow-2xl hover:bg-[#235B83] hover:shadow-2xl active:bg-[#2B6F9F] text-base text-white font-semibold">Gerenciar Produtos</a>
        <a href="usuarios.php" class="w-full h-16 flex justify-center items-center transition-all cursor-pointer drop-shadow-2xl hover:bg-[#235B83] hover:shadow-2xl active:bg-[#2B6F9F] text-base text-white font-semibold">Gerenciar Usuários</a>
    </aside>
    <section class="fixed z-10 top-0 w-screen h-16 flex justify-center items-center self-start bg-[#325975] shadow-2xl drop-shadow-2xl">
        <div class="w-1/4 h-full flex justify-center items-center">
            <a href="index.php" class="w-7/12 h-5/6 flex justify-center items-center">
                <img src="imgs/brand1.png" class="max-w-full max-h-full" alt="">
            </a>
        </div>
        <div class="w-2/4 h-full flex justify-center items-center"></div>
        <div class="w-1/4 h-full flex justify-start items-center gap-x-3">
            <button id="open_menu" onclick="menu_interact(this)" class="<?php if ($_SESSION["usuario"]->getNivel() == 1) {echo("hidden");} ?> w-10 h-10 flex justify-center items-center text-2xl rounded-lg text-white transition-all cursor-pointer hover:bg-[#5F86A0] active:bg-[#4E6D84]"><i class="fa-solid fa-gear"></i></button>
            <div class="w-6/12 h-[75%] flex justify-center items-center rounded-3xl cursor-pointer transition-all bg-[#14344B] border-[3px] border-solid border-[#1C4867] hover:bg-[#1C4867] active:bg-[#235B83]">
                <div class="w-2/6 h-full flex justify-center items-center">
                    <img src="uploads/<?php echo((empty($_SESSION["usuario"]->getFoto()) ? "default_avatar.webp" : $_SESSION["usuario"]->getFoto()));?>" class="max-w-9 h-9 rounded-full shadow-2xl drop-shadow-2xl border-2 border-solid border-gray-500" alt="">
                </div>
                <div class="w-4/6 h-full flex justify-start items-center">
                    <p class="text-white font-bold text-base">Seu Perfil</p>
                </div>
            </div>
            <a href="logout.php" class="w-10 h-10 flex justify-center items-center text-2xl rounded-lg text-white transition-all cursor-pointer hover:bg-[#5F86A0] active:bg-[#4E6D84]"><i class="fa-solid fa-right-from-bracket"></i></a>
        </div>
    </section>
    <main class="mt-16 z-0 w-screen flex justify-center items-center flex-col gap-y-10">
        <div class="w-1/2 h-24 flex justify-center items-center flex-col gap-y-1">
            <h3 class="text-sm text-gray-800">Home</h3>
            <h2 class=" text-4xl font-bold drop-shadow-2xl">Nosso Acervo</h2>
        </div>
        <div class="w-2/3 grid grid-cols-4 gap-1.5">
        <?php
        foreach($produtos as $produto) {
            ?>
            <div class="product_link h-[400px] flex justify-center items-center flex-col cursor-pointer transition-all rounded-lg hover:drop-shadow-2xl shadow-2xl hover:scale-105 bg-[rgb(230,244,253)]">
                <div class="w-full h-3/5 flex justify-center items-center">
                    <img src="uploads/<?php echo((empty($produto->getFoto()) ? "default_product.jpg" : $produto->getFoto()))?>" class="max-w-[95%] max-h-[95%] rounded-lg border-2 border-solid border-gray-300" alt="">
                </div>
                <div class="w-full h-2/5 flex justify-center items-center flex-col px-5 pb-2 truncate">
                    <div class="w-full flex justify-center items-start flex-col">
                        <h4 class="max-w-52 text-lg font-bold truncate"><?php echo($produto->getNome())?></h4>
                        <h5 class="text-sm font-semibold"><?php echo($produto->getId_categorias())?></h5>
                    </div>
                    <div class="w-full grow flex justify-evenly items-start flex-col">
                        <h6 class="text-2xl text-[#14344B] font-semibold">R$ <?php echo($produto->getPreco())?></h6>
                        <button class="w-11/12 py-1 self-center flex justify-center items-center bg-[#9AB6CA] rounded-sm transition-all cursor-pointer hover:bg-[#5F85A0] hover:shadow-2xl active:bg-gray-400">Adicionar ao carrinho</button>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
        </div>
    </main>
    <script src="script/menu.js"></script>
</body>
</html>