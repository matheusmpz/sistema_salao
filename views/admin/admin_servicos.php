<body class="bg-white min-h-screen px-8 py-12">
  <header class="w-full bg-white shadow-md py-4 px-6 flex items-center justify-between">
    <!-- Logo -->
    <div class="text-xl font-bold text-purple-700">Salão da Leila</div>
  
    <!-- Navegação Central -->
    <nav class="space-x-6">
      <a href="adminDashboard" class="text-sm font-medium text-gray-700 hover:text-purple-600 transition">Dashboard</a>
      <a href="adminAgendamento" class="text-sm font-medium text-gray-700 hover:text-purple-600 transition">Agendamentos</a>
      <a href="#" class="text-sm font-medium text-gray-700 hover:text-purple-600 transition">Serviços</a>
    </nav>
  
    <!-- Botão Sair -->
    <form action="/logout.php" method="POST">
      <button type="submit" class="text-sm font-medium text-red-600 hover:underline">
        Sair
      </button>
    </form>
  </header>
  
  <section class="flex justify-between items-center mb-8">
    <h1 class="text-3xl font-bold">Serviços</h1>
    <a
      href="/servico/novo"
      class="bg-black text-white text-sm px-6 py-2 rounded-md font-semibold hover:bg-gray-800 transition"
    >
      Novo Serviço
    </a>
  </section>

  <div class="overflow-x-auto">
    <table class="min-w-full border-collapse rounded-xl overflow-hidden shadow-sm">
      <thead>
        <tr class="bg-gray-200 text-left text-sm font-semibold">
          <th class="px-6 py-4">Nome</th>
          <th class="px-6 py-4">Preço</th>
          <th class="px-6 py-4">Descrição</th>
        </tr>
      </thead>
      <tbody class="text-sm text-gray-800">
        <?php foreach ($servicos as $servico): ?>
          <tr class="border-t hover:bg-gray-50">
            <td class="px-6 py-4"><?= htmlspecialchars($servico['nome']) ?></td>
            <td class="px-6 py-4">R$ <?= number_format($servico['preco'], 2, ',', '.') ?></td>
            <td class="px-6 py-4"><?= htmlspecialchars($servico['descricao']) ?></td>
            <td class="px-6 py-4 flex gap-3 items-center">
              <!-- Editar -->
              <a href="/servico/editar.php?id=<?= $servico['id'] ?>" title="Editar" class="text-blue-600 hover:text-blue-800 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 113 3L12 15l-4 1 1-4 9.5-9.5z" />
                </svg>
              </a>
              <!-- Excluir -->
              <form action="/servico/excluir.php" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este serviço?');">
                <input type="hidden" name="id" value="<?= $servico['id'] ?>">
                <button type="submit" title="Excluir" class="text-red-600 hover:text-red-800 transition">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
  </div>
</body>
