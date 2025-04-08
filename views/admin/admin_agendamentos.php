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
      <a href="/sistema_salao/adminServico" class="text-lg font-normal hover:underline">Serviços</a>
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
      <a href="/sistema_salao/adminServico" class="text-lg font-normal hover:underline">Serviços</a>
      <form action="adminLogin/logout" method="POST">
        <button type="submit" class="text-lg font-normal hover:underline">Sair</button>
      </form>
    </div>
  </header>

  <!-- Conteúdo -->
  <div class="p-6">
    <h2 class="text-3xl font-bold mb-6 text-black">Agendamentos</h2>

    <!-- Formulário de Filtros -->
    <form method="GET" action="/sistema_salao/adminAgendamento" class="mb-6 flex flex-wrap gap-4">
      <!-- Filtro por Data -->
      <div>
        <label for="data_inicio" class="block text-sm font-medium text-gray-700">Data Inicial</label>
        <input type="date" id="data_inicio" name="data_inicio" 
               value="<?= htmlspecialchars($_GET['data_inicio'] ?? '') ?>" 
               class="py-3 px-4 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black">
      </div>
      <div>
        <label for="data_fim" class="block text-sm font-medium text-gray-700">Data Final</label>
        <input type="date" id="data_fim" name="data_fim" 
               value="<?= htmlspecialchars($_GET['data_fim'] ?? '') ?>" 
               class="py-3 px-4 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black">
      </div>

      <!-- Filtro por Serviço -->
      <div>
        <label for="servico" class="block text-sm font-medium text-gray-700">Serviço</label>
        <select id="servico" name="servico" class="py-3 px-4 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black">
          <option value="">Todos</option>
          <?php foreach ($servicos as $servico): ?>
            <option value="<?= $servico['id'] ?>" 
                    <?= (isset($_GET['servico']) && $_GET['servico'] == $servico['id']) ? 'selected' : '' ?>>
              <?= htmlspecialchars($servico['nome']) ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <!-- Filtro por Status -->
      <div>
        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
        <select id="status" name="status" class="py-3 px-4 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black">
          <option value="">Todos</option>
          <option value="pendente" <?= (isset($_GET['status']) && $_GET['status'] == 'pendente') ? 'selected' : '' ?>>Pendente</option>
          <option value="confirmado" <?= (isset($_GET['status']) && $_GET['status'] == 'confirmado') ? 'selected' : '' ?>>Confirmado</option>
          <option value="realizado" <?= (isset($_GET['status']) && $_GET['status'] == 'realizado') ? 'selected' : '' ?>>Realizado</option>
          <option value="cancelado" <?= (isset($_GET['status']) && $_GET['status'] == 'cancelado') ? 'selected' : '' ?>>Cancelado</option>
        </select>
      </div>

      <!-- Botões -->
      <div class="flex items-end gap-2">
        <button type="submit" class="bg-black text-white px-6 py-3 rounded-lg font-semibold hover:bg-gray-900 transition">
          Filtrar
        </button>
        <a href="/sistema_salao/adminAgendamento" class="bg-gray-300 text-gray-700 px-6 py-3 rounded-lg font-semibold hover:bg-gray-400 transition">
          Limpar Filtros
        </a>
        <a href="adminAgendamento/criar" class="bg-green-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-600 transition">
          Novo Agendamento
        </a>
      </div>
    </form>

    <!-- Tabela de Agendamentos -->
    <div class="overflow-x-auto">
      <table class="min-w-full bg-white rounded-lg shadow-md">
        <thead class="bg-gray-100 text-gray-600 text-left text-sm uppercase">
          <tr>
            <th class="px-6 py-4">Cliente</th>
            <th class="px-6 py-4">Data</th>
            <th class="px-6 py-4">Serviço</th>
            <th class="px-6 py-4">Status</th>
            <th class="px-6 py-4 text-center">Ações</th>
          </tr>
        </thead>
        <tbody class="text-gray-800 text-sm">
          <?php if (!empty($agendamentos)): ?>
            <?php foreach ($agendamentos as $agendamento): ?>
              <tr class="border-b hover:bg-gray-50 transition">
                <td class="px-6 py-4 font-medium"><?= htmlspecialchars($agendamento['cliente'] ?? 'Cliente não informado') ?></td>
                <td class="px-6 py-4"><?= !empty($agendamento['data']) ? date('d/m/Y H:i', strtotime($agendamento['data'])) : 'Data não informada' ?></td>
                <td class="px-6 py-4"><?= htmlspecialchars($agendamento['servico'] ?? 'Serviço não informado') ?></td>
                <td class="px-6 py-4">
                  <span class="inline-block px-2 py-1 rounded text-xs font-medium <?= $statusClasses[$agendamento['status']] ?? 'bg-gray-100 text-gray-800' ?>">
                    <?= ucfirst($agendamento['status'] ?? 'Não informado') ?>
                  </span>
                </td>
                <td class="px-6 py-4 text-center">
                  <a href="/sistema_salao/adminAgendamento/editar/<?= $agendamento['id'] ?>" class="text-blue-600 hover:underline text-sm font-medium">
                    Editar
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="5" class="px-6 py-4 text-center text-gray-500">Nenhum agendamento encontrado.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>