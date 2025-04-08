<body class="flex items-center justify-center min-h-screen bg-gray-100">

  <form method="POST" action="" class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-md">
    <h1 class="text-center text-2xl font-bold mb-2">Novo Agendamento</h1>
    <p class="text-center text-sm text-gray-500 mb-6">
      Preencha os dados para criar um novo agendamento.
    </p>

    <!-- Cliente -->
    <label class="block mb-2 font-medium text-sm">Cliente</label>
    <select
      name="cliente_id"
      class="w-full px-4 py-2 border rounded-lg mb-4 focus:outline-none focus:ring-2 focus:ring-purple-500"
      required
    >
      <option value="" disabled selected>Selecione um cliente</option>
      <?php foreach ($clientes as $cliente): ?>
        <option value="<?= $cliente['id'] ?>"><?= htmlspecialchars($cliente['nome']) ?></option>
      <?php endforeach; ?>
    </select>

    <!-- Data e Hora -->
    <label class="block mb-2 font-medium text-sm">Data e Hora</label>
    <input
      type="datetime-local"
      name="data"
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
      <option value="" disabled selected>Selecione um serviço</option>
      <?php foreach ($servicos as $servico): ?>
        <option value="<?= $servico['id'] ?>"><?= htmlspecialchars($servico['nome']) ?></option>
      <?php endforeach; ?>
    </select>

    <!-- Status -->
    <label class="block mb-2 font-medium text-sm">Status</label>
    <select
      name="status"
      class="w-full px-4 py-2 border rounded-lg mb-6 focus:outline-none focus:ring-2 focus:ring-purple-500"
      required
    >
      <option value="Pendente" selected>Pendente</option>
      <option value="Confirmado">Confirmado</option>
      <option value="Realizado">Realizado</option>
      <option value="Cancelado">Cancelado</option>
    </select>

    <!-- Botão -->
    <button
      type="submit"
      class="w-full bg-gray-900 text-white py-2 rounded-lg font-semibold hover:bg-gray-800 transition"
    >
      Criar Agendamento
    </button>
  </form>

</body>
