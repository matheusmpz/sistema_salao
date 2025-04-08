<body class="flex items-center justify-center min-h-screen bg-gray-100">

  <form method="POST" action="" class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-md">
    <h1 class="text-center text-2xl font-bold mb-2">Editar Agendamento</h1>
    <p class="text-center text-sm text-gray-500 mb-6">
      Atualize os dados do agendamento abaixo.
    </p>

    <?php if (!empty($mensagemErro)): ?>
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Erro:</strong>
        <span class="block sm:inline"><?php echo $mensagemErro; ?></span>
      </div>
    <?php endif; ?>

    <!-- Data e Hora -->
    <label class="block mb-2 font-medium text-sm">Data e Hora</label>
    <input
      type="datetime-local"
      name="data"
      value="<?= htmlspecialchars($agendamento['data'] ?? '') ?>"
      class="w-full px-4 py-2 border rounded-lg mb-4 focus:outline-none focus:ring-2 focus:ring-purple-500"
      required
    >

    <!-- Serviço -->
    <label class="block mb-2 font-medium text-sm">Serviço</label>
    <select
      name="servico_id"
      class="w-full px-4 py-2 border rounded-lg mb-4 focus:outline-none focus:ring-2 focus:ring-purple-500"
      required
    >
      <option value="" disabled>Selecione um serviço</option>
      <?php foreach ($servicos as $servico): ?>
        <option value="<?= $servico['id'] ?>" <?= ($servico['id'] == $agendamento['servico_id']) ? 'selected' : '' ?>>
          <?= htmlspecialchars($servico['nome']) ?>
        </option>
      <?php endforeach; ?>
    </select>

    <!-- Status -->
    <label class="block mb-2 font-medium text-sm">Status</label>
    <select
      name="status"
      class="w-full px-4 py-2 border rounded-lg mb-6 focus:outline-none focus:ring-2 focus:ring-purple-500"
      required
    >
      <option value="Pendente" <?= ($agendamento['status'] == 'Pendente') ? 'selected' : '' ?>>Pendente</option>
      <option value="Confirmado" <?= ($agendamento['status'] == 'Confirmado') ? 'selected' : '' ?>>Confirmado</option>
      <option value="Realizado" <?= ($agendamento['status'] == 'Realizado') ? 'selected' : '' ?>>Realizado</option>
      <option value="Cancelado" <?= ($agendamento['status'] == 'Cancelado') ? 'selected' : '' ?>>Cancelado</option>
    </select>

    <!-- Botão -->
    <button
      type="submit"
      class="w-full bg-gray-900 text-white py-2 rounded-lg font-semibold hover:bg-gray-800 transition"
    >
      Salvar Alterações
    </button>
  </form>

</body>