<body class="bg-white">
  <!-- Cabeçalho -->
  <header class="w-full bg-black text-white py-4 px-6 flex items-center justify-between shadow-md">
    <!-- Logo -->
    <h2 class="text-2xl md:text-3xl">
      <a href="#">Salão<span class="font-bold">Leila</span></a>
    </h2>

    <!-- Menu -->
    <nav class="hidden md:flex items-center space-x-8">
      <a href="adminDashboard" class="text-lg font-normal hover:underline">Dashboard</a>
      <a href="adminAgendamento" class="text-lg font-normal hover:underline">Agendamentos</a>
      <a href="adminServico" class="text-lg font-normal hover:underline">Serviços</a>
    </nav>

    <!-- Botão Sair -->
    <form action="adminLogin/logout" method="POST" class="hidden md:block">
      <button type="submit" class="text-lg font-normal hover:underline">Sair</button>
    </form>

    <!-- Menu Mobile -->
    <button id="menu-btn" class="md:hidden text-3xl focus:outline-none">
      ☰
    </button>
    <div id="mobile-menu" class="absolute top-16 left-0 w-full bg-black shadow-md hidden flex-col items-center space-y-8 py-4 text-white md:hidden">
      <a href="adminDashboard" class="text-lg font-normal hover:underline">Dashboard</a>
      <a href="adminAgendamento" class="text-lg font-normal hover:underline">Agendamentos</a>
      <a href="adminServico" class="text-lg font-normal hover:underline">Serviços</a>
      <form action="adminLogin/logout" method="POST">
        <button type="submit" class="text-lg font-normal hover:underline">Sair</button>
      </form>
    </div>
  </header>

  <!-- Conteúdo -->
  <section class="p-6">
    <!-- Título e Botão -->
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-3xl font-bold text-black">Serviços</h1>
      <a href="adminServico/adicionar" class="bg-green-500 text-white text-sm px-6 py-3 rounded-lg font-semibold hover:bg-green-600 transition">
        Novo Serviço
      </a>
    </div>

    <!-- Tabela de Serviços -->
    <div class="overflow-x-auto rounded-lg shadow-md">
      <table class="min-w-full bg-white rounded-lg">
        <thead class="bg-gray-100 text-gray-600 text-left text-sm uppercase">
          <tr>
            <th class="px-6 py-4">Imagem</th>
            <th class="px-6 py-4">Nome</th>
            <th class="px-6 py-4">Preço</th>
            <th class="px-6 py-4">Descrição</th>
            <th class="px-6 py-4 text-center">Ações</th>
          </tr>
        </thead>
        <tbody class="text-gray-800 text-sm">
          <?php foreach ($servicos as $servico): ?>
            <tr class="border-b hover:bg-gray-50 transition">
              <!-- Coluna da Imagem -->
              <td class="px-6 py-4">
                <?php if (!empty($servico['imagem'])): ?>
                  <img src="/<?= htmlspecialchars($servico['imagem']) ?>" alt="Imagem do Serviço" class="w-16 h-16 object-cover rounded">
                <?php else: ?>
                  <span class="text-gray-500">Sem imagem</span>
                <?php endif; ?>
              </td>
              <!-- Coluna do Nome -->
              <td class="px-6 py-4 font-medium"><?= htmlspecialchars($servico['nome']) ?></td>
              <!-- Coluna do Preço -->
              <td class="px-6 py-4">R$ <?= number_format($servico['preco'], 2, ',', '.') ?></td>
              <!-- Coluna da Descrição -->
              <td class="px-6 py-4"><?= htmlspecialchars($servico['descricao']) ?></td>
              <!-- Coluna de Ações -->
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
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </section>
</body>