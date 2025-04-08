<body>
  <header class="w-full bg-white shadow-md py-4 px-6 flex items-center justify-between">
    <!-- Logo -->
    <div class="text-xl font-bold text-purple-700">Salão da Leila</div>
  
    <!-- Navegação Central -->
    <nav class="space-x-6">
      <a href="adminDashboard" class="text-sm font-medium text-gray-700 hover:text-purple-600 transition">Dashboard</a>
      <a href="adminAgendamento" class="text-sm font-medium text-gray-700 hover:text-purple-600 transition">Agendamentos</a>
      <a href="adminServicos" class="text-sm font-medium text-gray-700 hover:text-purple-600 transition">Serviços</a>
    </nav>
  
    <!-- Botão Sair -->
    <form action="/logout.php" method="POST">
      <button type="submit" class="text-sm font-medium text-red-600 hover:underline">
        Sair
      </button>
    </form>
  </header>
  <div class="p-6">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Agendamentos</h2>

    <!-- Formulário de Filtros -->
    <form method="GET" action="/sistema_salao/adminAgendamento" class="mb-6 flex flex-wrap gap-4">
        <!-- Filtro por Data -->
        <div>
            <label for="data_inicio" class="block text-sm font-medium text-gray-700">Data Inicial</label>
            <input type="date" id="data_inicio" name="data_inicio" 
                   value="<?= htmlspecialchars($_GET['data_inicio'] ?? '') ?>" 
                   class="border rounded px-3 py-2">
        </div>
        <div>
            <label for="data_fim" class="block text-sm font-medium text-gray-700">Data Final</label>
            <input type="date" id="data_fim" name="data_fim" 
                   value="<?= htmlspecialchars($_GET['data_fim'] ?? '') ?>" 
                   class="border rounded px-3 py-2">
        </div>

        <!-- Filtro por Serviço -->
        <div>
            <label for="servico" class="block text-sm font-medium text-gray-700">Serviço</label>
            <select id="servico" name="servico" class="border rounded px-3 py-2">
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
            <select id="status" name="status" class="border rounded px-3 py-2">
                <option value="">Todos</option>
                <option value="pendente" <?= (isset($_GET['status']) && $_GET['status'] == 'pendente') ? 'selected' : '' ?>>Pendente</option>
                <option value="confirmado" <?= (isset($_GET['status']) && $_GET['status'] == 'confirmado') ? 'selected' : '' ?>>Confirmado</option>
                <option value="realizado" <?= (isset($_GET['status']) && $_GET['status'] == 'realizado') ? 'selected' : '' ?>>Realizado</option>
                <option value="cancelado" <?= (isset($_GET['status']) && $_GET['status'] == 'cancelado') ? 'selected' : '' ?>>Cancelado</option>
            </select>
        </div>  
                
        <!-- Botões -->
        <div class="flex items-end gap-2">
            <button type="submit" class="bg-blue-500 cursor-pointer text-white px-4 py-2 rounded">Filtrar</button>
            <a href="/sistema_salao/adminAgendamento" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">
                Limpar Filtros
            </a>
        </div>
    </form>

    <div class="overflow-x-auto">
      <table class="min-w-full bg-white rounded-xl shadow-sm overflow-hidden">
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
          <?php
          // Verifica se há agendamentos disponíveis
          if (!empty($agendamentos)) {
            foreach ($agendamentos as $agendamento) {
              $id = $agendamento['id'];
              $cliente = htmlspecialchars($agendamento['cliente']);
              $data = !empty($agendamento['data']) ? date('d/m/Y H:i', strtotime($agendamento['data'])) : 'Data não informada';
              $servico = htmlspecialchars($agendamento['servico']);
              $status = strtolower(trim($agendamento['status'])); // Normaliza o status para evitar problemas
            
              // Estilos de status
              switch ($status) {
                case 'pendente':
                  $bg = 'bg-yellow-100';
                  $text = 'text-yellow-800';
                  $label = 'Pendente';
                  break;
                case 'confirmado':
                  $bg = 'bg-blue-100';
                  $text = 'text-blue-800';
                  $label = 'Confirmado';
                  break;
                case 'realizado':
                  $bg = 'bg-green-100';
                  $text = 'text-green-800';
                  $label = 'Realizado';
                  break;
                case 'cancelado':
                  $bg = 'bg-red-100';
                  $text = 'text-red-800';
                  $label = 'Cancelado';
                  break;
                default:
                  $bg = 'bg-gray-100';
                  $text = 'text-gray-800';
                  $label = ucfirst($status);
              }
            
              echo "
              <tr class='border-b hover:bg-gray-50 transition'>
                <td class='px-6 py-4 font-medium'>$cliente</td>
                <td class='px-6 py-4'>$data</td>
                <td class='px-6 py-4'>$servico</td>
                <td class='px-6 py-4'>
                  <span class='inline-block px-2 py-1 rounded text-xs font-medium $bg $text'>
                    $label
                  </span>
                </td>
                <td class='px-6 py-4 text-center'>
                  <a href='/sistema_salao/adminAgendamento/editar/$id' title='Editar' class='text-blue-600 hover:underline text-sm font-medium'>
                    Editar
                  </a>
                </td>
              </tr>";
            }
          } else {
            echo "
              <tr>
                <td colspan='5' class='px-6 py-4 text-center text-gray-500'>
                  Nenhum agendamento encontrado.
                </td>
              </tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>