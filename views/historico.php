<body class="flex flex-col items-center">
<header class="w-full text-sky-50 py-4 px-6 md:px-12 flex justify-between items-center bg-white shadow-md">
        <h2 class="text-[#544143] text-2xl md:text-3xl">
            <a href="../index.php">Salão<span class="font-bold">Leila</span></a>
        </h2>

        <button id="menu-btn" class="md:hidden text-[#544143] text-3xl focus:outline-none">
            ☰
        </button>

        <nav id="menu" class="hidden md:flex items-center space-x-8 text-[#544143]">
            <a href="../index.php#servico" class="cursor-pointer text-lg font-normal hover:underline">Serviços</a>
            <a href="agendamento/historico" class="cursor-pointer text-lg font-normal hover:underline">Agendamentos</a>
            <a href="../index.php#rodape" class="cursor-pointer text-lg font-normal hover:underline">Contato</a>
        </nav>

        <div class="text-lg text-[#544143] flex flex-col items-end hidden md:block">
            <a href="auth/logout" class="cursor-pointer font-normal hover:underline text-gray-500">Sair</a>
        </div>

        <div id="mobile-menu" class="absolute top-16 left-0 w-full bg-white shadow-md hidden flex-col items-center space-y-8 py-4 text-[#544143] md:hidden space-x-4 justify-center">
            <a href="../index.php#servico" class="cursor-pointer text-lg font-normal hover:underline">Serviços</a>
            <a href="agendamento/historico" class="cursor-pointer text-lg font-normal hover:underline">Agendamentos</a>
            <a href="../index.php#rodape" class="cursor-pointer text-lg font-normal hover:underline">Contato</a>
            <a href="auth/logout" class="cursor-pointer font-normal hover:underline text-gray-500">Sair</a>
        </div>
    </header>
    <main class="max-w-7xl w-full p-6 rounded-lg mt-6">
        <section class="mb-8">
            <h2 class="text-3xl font-bold mb-8 text-[#544143]">Histórico de Atendimentos:</h2>
        </section>
        <?php
            foreach ($this->dados2 as $agendamento) {
                ?>
                <div class="flex justify-between items-center bg-sky-50 py-4 px-6 rounded-2xl mb-4 border">
                    <div class="space-y-2 flex flex-col">
                        <span class="font-bold text-2xl text-[#544143]"><?php echo $agendamento['servico_nome']; ?></span>
                        <span class="text-xl font-normal text-[#544143]">Status: <?php echo $agendamento['status']; ?></span> 
                    </div>
                    
                    <div class="space-x-3 space-y-2 flex flex-col items-end">
                       <span class="text-xl font-bold text-[#544143]"><?php $data = new DateTime($agendamento['data_agendamento']); echo $data->format("d/m/Y"); ?></span>
                       <div class="space-x-3 flex justify-center items-center">
                            <a href="editar/<?php echo $agendamento['id']; ?>" class="py-2 px-3 text-[#eeeeee] bg-[#544143] rounded-full">Editar</a>
                            <a href="cancelar/<?php echo $agendamento['id']; ?>" class="py-2 px-3 text-[#eeeeee] bg-[#B6685C] rounded-full">Cancelar</a>
                       </div>
                    </div>
                    
                </div>
                <?php
            }
        ?>
    </main>
</body>