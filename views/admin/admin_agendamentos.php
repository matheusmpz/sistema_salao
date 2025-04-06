<body>
  <header class="w-full bg-white shadow-md py-4 px-6 flex items-center justify-between">
    <!-- Logo -->
    <div class="text-xl font-bold text-purple-700">Salão da Leila</div>
  
    <!-- Navegação Central -->
    <nav class="space-x-6">
      <a href="/dashboard.php" class="text-sm font-medium text-gray-700 hover:text-purple-600 transition">Dashboard</a>
      <a href="/agendamentos.php" class="text-sm font-medium text-gray-700 hover:text-purple-600 transition">Agendamentos</a>
      <a href="/servicos/listar.php" class="text-sm font-medium text-gray-700 hover:text-purple-600 transition">Serviços</a>
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

    <div class="overflow-x-auto">
      <table class="min-w-full bg-white rounded-xl shadow-sm overflow-hidden">
        <thead class="bg-gray-100 text-gray-600 text-left text-sm uppercase">
          <tr>
            <th class="px-6 py-4">Cliente</th>
            <th class="px-6 py-4">Data</th>
            <th class="px-6 py-4">Serviço</th>
            <th class="px-6 py-4">Ações</th>
          </tr>
        </thead>
        <tbody class="text-gray-800 text-sm">
          <?php
          $sql = "SELECT id, cliente, data, servico, status FROM agendamentos ORDER BY data DESC";
          $result = mysqli_query($conn, $sql);

          while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $cliente = $row['cliente'];
            $data = date('d/m/Y', strtotime($row['data']));
            $servico = $row['servico'];
            $status = $row['status'];

            // Estilos de status
            switch ($status) {
              case 'pendente':
                $bg = 'bg-blue-100';
                $text = 'text-blue-600';
                $icon = 'fa-clock';
                $label = 'Pendente';
                break;
              case 'confirmado':
                $bg = 'bg-emerald-100';
                $text = 'text-emerald-600';
                $icon = 'fa-circle-check';
                $label = 'Confirmado';
                break;
              case 'realizado':
                $bg = 'bg-green-100';
                $text = 'text-green-600';
                $icon = 'fa-check-double';
                $label = 'Realizado';
                break;
              case 'cancelado':
                $bg = 'bg-red-100';
                $text = 'text-red-600';
                $icon = 'fa-xmark-circle';
                $label = 'Cancelado';
                break;
              default:
                $bg = 'bg-gray-100';
                $text = 'text-gray-600';
                $icon = 'fa-question-circle';
                $label = ucfirst($status);
            }

            echo "
            <tr class='border-b hover:bg-gray-50 transition'>
              <td class='px-6 py-4 font-medium'>$cliente</td>
              <td class='px-6 py-4'>$data</td>
              <td class='px-6 py-4'>$servico</td>
              <td class='px-6 py-4'>
                <div class='flex gap-2 items-center'>
                  <!-- Editar -->
                  <a href='editar_agendamento.php?id=$id' title='Editar' class='text-yellow-600 hover:text-yellow-700 text-base'>
                    <i class='fa-solid fa-pen-to-square'></i>
                  </a>

                  <!-- Status -->
                  <span class='inline-flex items-center gap-1 px-3 py-1 rounded-full text-sm font-medium $bg $text'>
                    <i class='fa-solid $icon'></i> $label
                  </span>
                </div>
              </td>
            </tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>