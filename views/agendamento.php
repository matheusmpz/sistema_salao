<body>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6 text-center">Agendamento</h2>
            <?php if (!empty($mensagemErro)): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Erro:</strong>
                    <span class="block sm:inline"><?php echo $mensagemErro; ?></span>
                </div>
            <?php endif; ?>
            <form action="/sistema_salao/agendamento/agendar" method="POST">
                <div class="mb-4">
                    <label for="servico" class="block text-gray-700">Serviço</label>
                    <select id="servico" name="servico" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="">Selecione um serviço</option>
                        <?php foreach ($servicos as $servico): ?>
                            <option value="<?php echo $servico['id']; ?>"><?php echo $servico['nome']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="data" class="block text-gray-700">Data e Hora</label>
                    <input type="datetime-local" id="data" name="data" step="1800" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-[#FB7237] text-white px-4 py-2 rounded-lg">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</body>