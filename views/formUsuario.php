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
            <div class="w-9/12 h-full flex justify-center items-center">
                <h2>Menu Rápido</h2>
            </div>
            <div class="w-3/12 h-full flex justify-center items-center">
                <button id="close_menu" onclick="menu_interact(this)" class="w-9 h-9 flex justify-center items-center rounded-lg text-lg transition-all cursor-pointer hover:bg-red-500 active:bg-red-400"><i class="fa-solid fa-xmark"></i></button>
            </div>
        </div>
        <a href="index.php" class="w-full h-16 flex justify-center items-center transition-all cursor-pointer drop-shadow-2xl hover:bg-[#235B83] hover:shadow-2xl active:bg-[#2B6F9F] text-base text-white font-semibold">Home</a>
        <a href="categorias.php" class="w-full h-16 flex justify-center items-center transition-all cursor-pointer drop-shadow-2xl hover:bg-[#235B83] hover:shadow-2xl active:bg-[#2B6F9F] text-base text-white font-semibold">Gerenciar Categorias</a>
        <a href="produtos.php" class="w-full h-16 flex justify-center items-center transition-all cursor-pointer drop-shadow-2xl bg-[#235B83] shadow-2xl active:bg-[#2B6F9F] text-base text-white font-semibold">Gerenciar Produtos</a>
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
            <button id="open_menu" onclick="menu_interact(this)" class="<?php if ($_SESSION["usuario"]->getNivel() == 1) { echo ("hidden"); } ?> w-10 h-10 flex justify-center items-center text-2xl rounded-lg text-white transition-all cursor-pointer hover:bg-[#5F86A0] active:bg-[#4E6D84]"><i class="fa-solid fa-gear"></i></button>
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
    <main class="mt-16 z-0 w-screen flex justify-center items-center flex-col gap-y-2">
        <div class="w-1/2 h-24 flex justify-center items-center flex-col gap-y-1">
            <h3 class="text-sm text-gray-800">Home</h3>
            <h2 class=" text-4xl font-bold drop-shadow-2xl"><?php echo((empty($usuario->getId()) ? "Inserir" : "Editar"));?> Usuários</h2>
        </div>
        <div class="w-2/4 flex justify-center items-center">
            <form action="salvarUsuario.php" method="post" enctype="multipart/form-data" class="w-1/2 flex justify-start items-center flex-col bg-[#BCCCD8] gap-y-0.5 rounded-lg shadow-2xl drop-shadow-2xl border-2 border-solid border-[#8A969E]">
                <input type="hidden" id="id" name="id" value="<?php echo($usuario->getId());?>">
                <div class="mt-3 w-full h-16 flex justify-evenly items-center flex-col">
                    <label for="login" class="self-start pl-7 text-sm font-bold">Login</label>
                    <input type="text" name="login" id="login" value="<?php echo($usuario->getLogin())?>" class="w-11/12 h-1/2 border-2 border-solid border-[#8A969E] text-sm px-2 outline-0">
                </div>
                <div class="w-full h-16 flex justify-center items-center">
                    <div class="w-1/2 h-full flex justify-evenly items-center flex-col">
                        <label for="senha" class="self-start pl-7 text-sm font-bold">Sua senha</label>
                        <input type="password" name="senha" id="senha" class="w-10/12 h-1/2 border-2 border-solid border-[#8A969E] text-sm px-2 outline-0">
                    </div>
                    <div class="w-1/2 h-full flex justify-evenly items-center flex-col">
                        <label for="nivel" class="self-start pl-7 text-sm font-bold">Nivel de Acesso</label>
                        <select name="nivel" id="nivel" class="w-10/12 h-1/2 border-2 border-solid border-[#8A969E] font-semibold text-sm px-2 outline-0 cursor-pointer">
                            <option value="1" <?php if ($usuario->getNivel() == 1) {echo("selected");}?>>Cliente</option>
                            <option value="2" <?php if ($usuario->getNivel() == 2) {echo("selected");}?>>Funcionário</option>
                        </select>
                    </div>
                </div>
                <div class="w-full h-16 flex justify-evenly items-center flex-col">
                    <label for="foto" class="self-start pl-7 text-sm font-bold">Sua Foto de Perfil</label>
                    <input type="file" name="foto" id="foto" class="w-11/12 h-1/2 text-sm font-semibold px-2 outline-0">
                </div>
                <div class="w-full h-16 flex justify-around items-center">
                    <button type="reset" class="w-1/3 py-2 text-sm font-bold bg-[#325975] text-white rounded-lg border-2 border-solid border-[#3F7092] transition-all cursor-pointer drop-shadow-2xl shadow-2xl hover:bg-[#3F7092] active:bg-[#4B85AE]">Clear</button>
                    <button type="submit" class="w-1/3 py-2 text-sm font-bold bg-[#325975] text-white rounded-lg border-2 border-solid border-[#3F7092] transition-all cursor-pointer drop-shadow-2xl shadow-2xl hover:bg-[#3F7092] active:bg-[#4B85AE]">Submit</button>
                </div>
            </form>
        </div>
    </main>
    <script src="script/menu.js"></script>
</body>

</html>