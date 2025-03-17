<body class="flex flex-col items-center">
    <header class="w-full text-sky-50 py-4 px-6 md:px-12 flex justify-between items-center bg-white shadow-md">
        <h2 class="text-[#544143] text-2xl md:text-3xl">
        <a href="../index.php">Salão<span class="font-bold">Leila</span></a>
        </h2>

        <button id="menu-btn" class="md:hidden text-[#544143] text-3xl focus:outline-none">
            ☰
        </button>

        <nav id="menu" class="hidden md:flex items-center space-x-8 text-[#544143]">
            <a href="#servico" class="cursor-pointer text-lg font-normal hover:underline">Serviços</a>
            <a href="agendamento/historico" class="cursor-pointer text-lg font-normal hover:underline">Agendamentos</a>
            <a href="#rodape" class="cursor-pointer text-lg font-normal hover:underline">Contato</a>
        </nav>

        <div class="text-lg text-[#544143] flex flex-col items-end hidden md:block">
            <a href="auth/logout" class="cursor-pointer font-normal hover:underline text-gray-500">Sair</a>
        </div>

        <div id="mobile-menu" class="absolute top-16 left-0 w-full bg-white shadow-md hidden flex-col items-center space-y-8 py-4 text-[#544143] md:hidden space-x-4 justify-center">
            <a href="#servico" class="cursor-pointer text-lg font-normal hover:underline">Serviços</a>
            <a href="agendamento/historico" class="cursor-pointer text-lg font-normal hover:underline">Agendamentos</a>
            <a href="#rodape" class="cursor-pointer text-lg font-normal hover:underline">Contato</a>
            <a href="auth/logout" class="cursor-pointer font-normal hover:underline text-gray-500">Sair</a>
        </div>
    </header>
    <section class="bg-[#B6685C] w-full h-auto min-h-[440px] text-[#FFFAE5] flex flex-col justify-center items-center space-y-6 py-12 px-6 sm:px-12 md:px-24">
        <h1 class="text-3xl sm:text-4xl md:text-5xl xl:w-1/2 text-center font-bold">
            <span class="font-bold">Cabeleleila Leila:</span> Cabelos, unhas, hidratação e unhas!
        </h1>
        <p class="text-base sm:text-lg md:text-xl xl:w-1/2 text-center">
            Venha fazer suas unhas, seus cabelos, e até mesmo hidratar suas madeixas de cabelo conosco. 
            Tudo esterilizado para você não ficar mal.
        </p>
    </section>

    <section class="max-w-7xl w-full p-6 rounded-lg mt-20" id="servico">
        <section class="mb-8">
            <h2 class="text-3xl font-bold mb-8 text-[#544143]">Nossos serviços:</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-40 gap-y-10 justify-center">
                <?php
                foreach ($this->dados2 as $servico) { 
                ?>
                    <div class="w-[332px] space-y-6 bg-[#EEECED] rounded flex flex-col items-center justify-center p-3">
                        <div class="space-y-3 w-[290px] text-[#544143]">
                            <p class="text-xl font-semibold"><?php echo $servico['nome']; ?></p>
                            <p class="leading-5"><?php echo $servico['descricao']; ?></p>
                        </div>
                        <div class="w-[290px] flex items-center justify-between">
                            <p class="text-xl font-semibold text-[#544143]">R$ <?php echo $servico['preco']; ?></p>
                            <a href="agendamento"><button class="bg-[#B6685C] px-6 py-2 rounded text-[#FFFAE5] cursor-pointer">Agendar</button></a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </section>
    </section>
    
    <section class="w-full py-12 px-6 sm:px-12 md:px-24 flex flex-col md:flex-row items-center justify-around space-y-8 md:space-y-0 my-20">
        <div class="w-full md:w-1/2 space-y-6">
            <h2 class="text-3xl font-bold text-[#544143] mb-4">
                Sobre o Salão Leila
            </h2>
            <p class="text-base sm:text-lg md:text-xl text-[#544143]">
                O Salão Leila é o lugar onde sua beleza é cuidada com dedicação e carinho. 
                Com um ambiente acolhedor e profissionais qualificados, oferecemos uma variedade de serviços de estética para cuidar de você da cabeça aos pés. 
                Venha conhecer nosso espaço, onde a beleza encontra qualidade e atenção aos detalhes. Estamos aqui para deixar você ainda mais bonita e confiante!
            </p>
            <p class="text-base sm:text-lg md:text-xl text-[#544143]">
                No Salão Leila, cada detalhe foi pensado para proporcionar a você uma experiência única e transformadora. Nosso time de profissionais é altamente capacitado, sempre em busca das últimas tendências e técnicas para garantir que você se sinta ainda mais especial. Oferecemos serviços personalizados para atender às suas necessidades e expectativas, com foco na sua satisfação e bem-estar.
            </p>
            <p class="text-base sm:text-lg md:text-xl text-[#544143]">
                Venha nos visitar e descubra como podemos realçar a sua beleza de maneira natural e única. Esperamos por você de braços abertos, prontos para oferecer o melhor atendimento e os cuidados mais especiais.
            </p>
        </div>

        <div class="w-full md:w-[500px] h-auto">
            <img src="http://localhost/sistema_salao/public/img/image.png" alt="Imagem do Salão" class="w-full h-auto rounded-lg object-cover">
        </div>
    </section>

    <footer id="rodape" class="w-full bg-[#B6685C] text-[#FFFAE5] py-8">
        <div class="max-w-screen-3xl mx-auto px-6 md:px-24 flex flex-col md:flex-row justify-between">
            <div class="mb-6 md:mb-0 space-y-2">
                <h2 class=" text-2xl sm:text-3xl">Salão<span class="font-bold">Leila</span> </h2>
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