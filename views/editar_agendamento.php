<body class="bg-white flex items-center justify-center h-screen">
    <div class="absolute top-4 left-4">
        <a href="javascript:history.back()" class="flex items-center text-black hover:underline">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
            Voltar
        </a>
    </div>

    <div class="bg-[#f9f9f9] rounded-xl p-10 w-full max-w-md shadow-lg space-y-8">
        <div class="space-y-2">
            <h1 class="text-3xl font-bold">Editar Agendamento</h1>
            <p class="text-sm text-gray-500">
                Altere as informações do agendamento abaixo e clique em salvar.
            </p>
        </div>

        <?php if (!empty($mensagemErro)): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Erro:</strong>
                <span class="block sm:inline"><?php echo $mensagemErro; ?></span>
            </div>
        <?php endif; ?>

        <form action="/sistema_salao/agendamento/editar/<?php echo $agendamento['id']; ?>" method="POST" class="space-y-6">
            <div class="space-y-4">
                <div class="flex flex-col space-y-1">
                    <label for="servico" class="text-sm font-medium">Serviço</label>
                    <select id="servico" name="servico" required
                            class="py-3 px-4 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black">
                        <option value="">Selecione um serviço</option>
                        <?php foreach ($servicos as $servico): ?>
                            <option value="<?php echo $servico['id']; ?>" <?php echo ($servico['id'] == $agendamento['servico_id']) ? 'selected' : ''; ?>>
                                <?php echo $servico['nome']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="data" class="text-sm font-medium">Data</label>
                    <input type="datetime-local" id="data" name="data" value="<?php echo $agendamento['data_agendamento']; ?>" required
                           class="py-3 px-4 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black">
                </div>
            </div>

            <button type="submit"
                    class="w-full bg-black text-white py-3 rounded-lg font-semibold hover:bg-gray-900 transition">
                Salvar
            </button>
        </form>
    </div>
</body>