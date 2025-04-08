<body class="">
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
  <section class="p-6">
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
              <p class="text-gray-600">Agendamentos do dia</p>
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
    </div>
  </section>
</body>
