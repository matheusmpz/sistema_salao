<body class="text-[#544143]">
    <section class="flex flex-col items-center justify-center h-screen space-y-12">
        <div class="flex flex-col items-center space-y-4">
            <h1 class="text-5xl font-bold">Bem vindo</h1>
            <p>Informe seus dados para acessar o sistema</p> 
        </div>
        
        <article class="flex justify-center items-center bg-[#2f2f2f] py-3 w-[296px] space-x-8 rounded-full text-xl">
            <div class="bg-[#B6685C] w-32 flex py-3 justify-center rounded-full">
                <a href="#" class="cursor-pointer text-[#FFFAE5]">Login</a>
            </div>
            <div>
                <a href="cadastrar" class="cursor-pointer text-[#FFFAE5]">Cadastro</a>
            </div>
        </article>

        <form action="/sistema_salao/auth/login" method="POST" class="flex flex-col space-y-12 w-1/4 min-w-[360px]">
            <div class="flex flex-col space-y-8">
                <div class="flex flex-col space-y-1">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required class="py-3 rounded-full border-[#2E2E2E] border">
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="password">Senha:</label>
                    <input type="password" name="password" id="password" required class="py-3 rounded-full border-[#2E2E2E] border">
                </div>
            </div>
            
            <button type="submit" class="bg-[#B6685C] text-[#FFFAE5] py-3 rounded-full text-xl flex justify-center">Login</button>
        </form>

        <a href="/sistema_salao/adminLogin" title="Login do administrador"
           class="text-[#B6685C] hover:text-[#8a4b43] transition flex items-center space-x-1">
            <i class="fas fa-lock"></i>
            <span class="text-sm">Área do Administrador</span>
        </a>
    </section>
</body>