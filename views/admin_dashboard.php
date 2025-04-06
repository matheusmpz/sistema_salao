<body class="bg-white text-gray-800 px-10 py-8 font-sans">
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
            <p class="text-xl font-bold">9</p>
          </div>
        </div>

        <div class="bg-gray-50 border rounded-xl p-4 flex items-center gap-4 shadow-sm">
          <div class="bg-green-100 p-2 rounded-md">
            <i data-lucide="check" class="w-6 h-6 text-green-600"></i>
          </div>
          <div>
            <p class="text-gray-600">Confirmados</p>
            <p class="text-xl font-bold">9</p>
          </div>
        </div>

        <div class="bg-gray-50 border rounded-xl p-4 flex items-center gap-4 shadow-sm">
          <div class="bg-blue-100 p-2 rounded-md">
            <i data-lucide="check-circle" class="w-6 h-6 text-blue-600"></i>
          </div>
          <div>
            <p class="text-gray-600">Realizados</p>
            <p class="text-xl font-bold">9</p>
          </div>
        </div>

        <div class="bg-gray-50 border rounded-xl p-4 flex items-center gap-4 shadow-sm">
          <div class="bg-red-100 p-2 rounded-md">
            <i data-lucide="x-circle" class="w-6 h-6 text-red-600"></i>
          </div>
          <div>
            <p class="text-gray-600">Cancelados</p>
            <p class="text-xl font-bold">9</p>
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
              <th class="px-4 py-2 text-center">Ações</th>
            </tr>
          </thead>
          <tbody class="text-sm divide-y">
            <!-- Repetir linha conforme necessário -->
            <tr>
              <td class="px-4 py-3">cliente</td>
              <td class="px-4 py-3">06/04/2025</td>
              <td class="px-4 py-3">Corte</td>
              <td class="px-4 py-3 flex gap-3 justify-center">
                <i data-lucide="x-circle" class="w-5 h-5 text-red-500 cursor-pointer"></i>
                <i data-lucide="eye" class="w-5 h-5 text-blue-500 cursor-pointer"></i>
                <i data-lucide="check-circle" class="w-5 h-5 text-green-500 cursor-pointer"></i>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="https://unpkg.com/lucide@latest"></script>
  <script>
    lucide.createIcons();
  </script>
</body>
