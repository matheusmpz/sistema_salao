<body class="flex flex-col items-center">
    <header class="w-full text-white py-4 px-6 md:px-12 flex justify-between items-center bg-black shadow-md">
        <h2 class="text-white text-2xl md:text-3xl">
            <a href="#">Salão<span class="font-bold">Leila</span></a>
        </h2>

        <button id="menu-btn" class="md:hidden text-white text-3xl focus:outline-none">
            ☰
        </button>

        <nav id="menu" class="hidden md:flex items-center space-x-8 text-white">
            <a href="#servico" class="cursor-pointer text-lg font-normal hover:underline">Serviços</a>
            <a href="agendamento/historico" class="cursor-pointer text-lg font-normal hover:underline">Agendamentos</a>
            <a href="#rodape" class="cursor-pointer text-lg font-normal hover:underline">Contato</a>
        </nav>

        <div class="text-lg text-white flex flex-col items-end hidden md:block">
            <a href="auth/logout" class="cursor-pointer font-normal hover:underline">Sair</a>
        </div>

        <div id="mobile-menu" class="absolute top-16 left-0 w-full bg-black shadow-md hidden flex-col items-center space-y-8 py-4 text-white md:hidden space-x-4 justify-center">
            <a href="#servico" class="cursor-pointer text-lg font-normal hover:underline">Serviços</a>
            <a href="agendamento/historico" class="cursor-pointer text-lg font-normal hover:underline">Agendamentos</a>
            <a href="#rodape" class="cursor-pointer text-lg font-normal hover:underline">Contato</a>
            <a href="auth/logout" class="cursor-pointer font-normal hover:underline">Sair</a>
        </div>
    </header>

    <!-- Banner -->
    <section class="w-full h-[440px] bg-cover bg-center text-white flex flex-col justify-center items-center space-y-6 px-6 sm:px-12 md:px-24" style="background-image: url('http://localhost/sistema_salao/public/img/banner.png');">
        <h1 class="text-3xl sm:text-4xl md:text-5xl xl:w-1/2 text-center font-bold">
            <span class="font-bold">Cabeleleila Leila:</span> Cabelos, unhas, hidratação e unhas!
        </h1>
        <p class="text-base sm:text-lg md:text-xl xl:w-1/2 text-center">
            Venha fazer suas unhas, seus cabelos, e até mesmo hidratar suas madeixas de cabelo conosco. 
            Tudo esterilizado para você não ficar mal.
        </p>
    </section>

    <!-- Serviços -->
    <section class="max-w-7xl w-full p-6 rounded-lg mt-20" id="servico">
        <h2 class="text-3xl font-bold mb-8 text-black text-center">Nossos serviços:</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 justify-center">
            <?php
            foreach ($this->dados2 as $servico) { 
            ?>
                <div class="w-full bg-white rounded-lg flex flex-col items-center p-6 shadow-md">
                    <div class="w-full text-black space-y-3">
                        <p class="text-xl font-semibold"><?php echo $servico['nome']; ?></p>
                        <p class="text-sm"><?php echo $servico['descricao']; ?></p>
                    </div>
                    <div class="w-full flex items-center justify-between mt-4">
                        <p class="text-lg font-bold text-black">R$ <?php echo $servico['preco']; ?></p>
                        <a href="agendamento">
                            <button class="bg-black px-6 py-2 rounded text-white cursor-pointer hover:bg-gray-800">
                                Agendar
                            </button>
                        </a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </section>

    <!-- Rodapé -->
    <footer id="rodape" class="w-full bg-black text-white py-8">
        <div class="max-w-screen-3xl mx-auto px-6 md:px-24 flex flex-col md:flex-row justify-between">
            <div class="mb-6 md:mb-0 space-y-2">
                <h2 class="text-2xl sm:text-3xl">Salão<span class="font-bold">Leila</span></h2>
                <p class="w-[300px] sm:w-[350px] md:w-[400px] text-sm sm:text-base">
                    No Cabeleleila Leila, oferecemos serviços de beleza com excelência e bom humor. Agende seu horário e renove seu visual!
                </p>
            </div>
            <div class="space-y-2">
                <p class="text-sm sm:text-base">Telefone: (11) 98765-4321</p>
                <p class="text-sm sm:text-base">E-mail: contato@cabeleleilaleila.com</p>
                <p class="text-sm sm:text-base">Rua das Tranças, 123 – Salão Cabeleleila Leila</p>
            </div>
        </div>
    </footer>
</body>