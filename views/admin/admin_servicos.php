<body>

  <!-- Header -->
  <header class="w-full bg-white shadow-md py-4 px-6 flex items-center justify-between mb-8">
    <!-- Logo -->
    <div class="text-xl font-bold text-purple-700">Salão da Leila</div>

    <!-- Navegação -->
    <nav class="space-x-6">
      <a href="adminDashboard" class="text-sm font-medium text-gray-700 hover:text-purple-600 transition">Dashboard</a>
      <a href="adminAgendamento" class="text-sm font-medium text-gray-700 hover:text-purple-600 transition">Agendamentos</a>
      <a href="adminServico" class="text-sm font-medium text-gray-700 hover:text-purple-600 transition">Serviços</a>
    </nav>

    <!-- Botão Sair -->
    <form action="adminLogin/logout" method="POST">
      <button type="submit" class="text-sm font-medium text-red-600 hover:underline">
        Sair
      </button>
    </form>
  </header>
  <section class="p-6">
    <!-- Título e Botão -->
    <section class="flex justify-between items-center mb-6">
      <h1 class="text-3xl font-bold text-gray-800">Serviços</h1>
      <a href="adminServico/adicionar" class="bg-purple-600 text-white text-sm px-6 py-2 rounded-md font-semibold hover:bg-purple-500 transition">
        Novo Serviço
      </a>
    </section>
  
    <!-- Tabela de Serviços -->
    <div class="overflow-x-auto rounded-xl shadow">
      <table class="min-w-full border-collapse">
        <thead class="bg-gray-200 text-left text-sm font-semibold text-gray-700">
          <tr>
            <th class="px-6 py-4">Nome</th>
            <th class="px-6 py-4">Preço</th>
            <th class="px-6 py-4">Descrição</th>
            <th class="px-6 py-4 text-center">Ações</th>
          </tr>
        </thead>
        <tbody class="text-sm text-gray-800 bg-white">
          <?php foreach ($servicos as $servico): ?>
            <tr class="border-t hover:bg-gray-50">
              <td class="px-6 py-4"><?= htmlspecialchars($servico['nome']) ?></td>
              <td class="px-6 py-4">R$ <?= number_format($servico['preco'], 2, ',', '.') ?></td>
              <td class="px-6 py-4"><?= htmlspecialchars($servico['descricao']) ?></td>
              <td class="px-6 py-4 text-center">
                <div class="flex justify-center gap-4">
                  <!-- Editar -->
                  <a href="/sistema_salao/adminServico/editar/<?= $servico['id'] ?>" title="Editar" class="text-blue-600 hover:text-blue-800 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 113 3L12 15l-4 1 1-4 9.5-9.5z" />
                    </svg>
                  </a>
  
                  <!-- Excluir -->
                  <form action="/sistema_salao/adminServico/excluir/<?= $servico['id'] ?>" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este serviço?');">
                      <button type="submit" title="Excluir" class="text-red-600 hover:text-red-800 transition">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                          </svg>
                      </button>
                  </form>
                  </form>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

  </section>


</body>