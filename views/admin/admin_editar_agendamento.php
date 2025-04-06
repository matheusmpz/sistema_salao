<body class="flex items-center justify-center min-h-screen bg-gray-100">

  <form method="POST" action="" class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-md">
    <h1 class="text-center text-2xl font-bold mb-2">Editar Agendamento</h1>
    <p class="text-center text-sm text-gray-500 mb-6">
      Atualize os dados do agendamento abaixo.
    </p>

    <input type="hidden" name="id" value="<?= htmlspecialchars($_GET['id'] ?? '') ?>">

    <label class="block mb-2 font-medium text-sm">Data</label>
    <input
      type="date"
      name="data"
      value="<?= htmlspecialchars($agendamento['data'] ?? '') ?>"
      class="w-full px-4 py-2 border rounded-lg mb-4 focus:outline-none focus:ring-2 focus:ring-purple-500"
    >

    <label class="block mb-2 font-medium text-sm">Serviço</label>
    <input
      type="text"
      name="servico"
      value="<?= htmlspecialchars($agendamento['servico'] ?? '') ?>"
      class="w-full px-4 py-2 border rounded-lg mb-4 focus:outline-none focus:ring-2 focus:ring-purple-500"
    >

    <label class="block mb-2 font-medium text-sm">Status</label>
    <select
      name="status"
      class="w-full px-4 py-2 border rounded-lg mb-6 focus:outline-none focus:ring-2 focus:ring-purple-500"
    >
      <?php
        $statusOptions = ['Pendente', 'Confirmado', 'Realizado', 'Cancelado'];
        foreach ($statusOptions as $status) {
          $selected = ($agendamento['status'] ?? '') === $status ? 'selected' : '';
          echo "<option value=\"$status\" $selected>$status</option>";
        }
      ?>
    </select>

    <button
      type="submit"
      class="w-full bg-gray-900 text-white py-2 rounded-lg font-semibold hover:bg-gray-800 transition"
    >
      Modificar
    </button>
  </form>

</body>
