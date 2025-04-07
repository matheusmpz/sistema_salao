<body class="bg-white text-gray-800 px-10 py-8 font-sans">
  <header class="w-full bg-white shadow-md py-4 px-8 flex items-center justify-between">
    <!-- Logo -->
    <div class="text-xl font-bold text-purple-700">Salão da Leila</div>
  
    <!-- Navegação Central -->
    <nav class="space-x-6">
      <a href="#" class="text-sm font-medium text-gray-700 hover:text-purple-600 transition">Dashboard</a>
      <a href="#" class="text-sm font-medium text-gray-700 hover:text-purple-600 transition">Agendamentos</a>
      <a href="#" class="text-sm font-medium text-gray-700 hover:text-purple-600 transition">Serviços</a>
    </nav>
  
    <!-- Botão Sair -->
    <form action="adminLogin/logout" method="POST">
      <button type="submit" class="text-sm font-medium text-red-600 hover:underline">
        Sair
      </button>
    </form>
  </header>
  <div class="flex flex-col lg:flex-row justify-between gap-10">
    <div class="flex-1">
      <h1 class="text-3xl font-bold mb-1">DashBoard</h1>
      <p class="text-gray-600 mb-6">Resumo do Salão</p>

      <div class="grid grid-cols-2 gap-6">
        <div class="bg-gray-50 border rounded-xl p-4 flex items-center gap-4 shadow-sm">
          <div class="bg-purple-100 p-2 rounded-md">
            <i data-lucide="clock" class="w-6 h-6 text-purple-600"></i>
          </div>
          <div>
            <p class="text-gray-600">Agendamentos</p>
            <p class="text-xl font-bold"><?php echo $totalHoje; ?></p>
          </div>
        </div>

        <div class="bg-gray-50 border rounded-xl p-4 flex items-center gap-4 shadow-sm">
          <div class="bg-green-100 p-2 rounded-md">
            <i data-lucide="check" class="w-6 h-6 text-green-600"></i>
          </div>
          <div>
            <p class="text-gray-600">Confirmados</p>
            <p class="text-xl font-bold"><?php echo $totalConfirmados; ?></p>
          </div>
        </div>

        <div class="bg-gray-50 border rounded-xl p-4 flex items-center gap-4 shadow-sm">
          <div class="bg-blue-100 p-2 rounded-md">
            <i data-lucide="check-circle" class="w-6 h-6 text-blue-600"></i>
          </div>
          <div>
            <p class="text-gray-600">Realizados</p>
            <p class="text-xl font-bold"><?php echo $totalRealizados; ?></p>
          </div>
        </div>

        <div class="bg-gray-50 border rounded-xl p-4 flex items-center gap-4 shadow-sm">
          <div class="bg-red-100 p-2 rounded-md">
            <i data-lucide="x-circle" class="w-6 h-6 text-red-600"></i>
          </div>
          <div>
            <p class="text-gray-600">Cancelados</p>
            <p class="text-xl font-bold"><?php echo $totalCancelados; ?></p>
          </div>
        </div>
      </div>
    </div>

    <div class="flex-1">
      <div class="flex justify-between items-center mb-2">
        <div>
          <h2 class="text-2xl font-bold">Agendamentos</h2>
          <p class="text-gray-600">Lista de atendimentos do dia</p>
        </div>
        <span class="text-sm text-gray-600">Visualizar</span>
      </div>

      <div class="overflow-x-auto">
      <table class="w-full text-left border-collapse mt-4">
        <thead>
          <tr class="bg-gray-200 text-sm">
            <th class="px-4 py-2">Cliente</th>
            <th class="px-4 py-2">Data</th>
            <th class="px-4 py-2">Serviço</th>
            <th class="px-4 py-2">Status</th>
            <th class="px-4 py-2 text-center">Ações</th>
          </tr>
        </thead>
        <tbody class="text-sm divide-y">
          <?php if (!empty($agendamentos)): ?>
            <?php foreach ($agendamentos as $ag): ?>
              <tr>
                <td class="px-4 py-3"><?= htmlspecialchars($ag['nome_cliente']) ?></td>
                <td class="px-4 py-3"><?= date('d/m/Y H:i', strtotime($ag['data_agendamento'])) ?></td>
                <td class="px-4 py-3"><?= htmlspecialchars($ag['servicos'] ?? 'Nenhum serviço') ?></td>
            
                <td class="px-4 py-3">
                  <?php
                    $status = $ag['status'];
                    $statusClasses = [
                      'pendente'   => 'bg-yellow-100 text-yellow-800',
                      'confirmado' => 'bg-blue-100 text-blue-800',
                      'realizado'  => 'bg-green-100 text-green-800',
                      'cancelado'  => 'bg-red-100 text-red-800',
                    ];
                  ?>
                  <span class="px-2 py-1 rounded text-xs font-medium <?= $statusClasses[$status] ?? 'bg-gray-100 text-gray-800' ?>">
                    <?= ucfirst($status) ?>
                  </span>
                </td>
                  
                <td class="px-4 py-3 text-center">
                  <a href="/sistema_salao/agendamentos/editar/<?= $ag['id'] ?>" class="text-blue-600 hover:underline text-sm font-medium">
                    Editar
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="5" class="px-4 py-3 text-center text-gray-500">Nenhum agendamento para hoje.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>

      </div>
    </div>
  </div>
</body>
