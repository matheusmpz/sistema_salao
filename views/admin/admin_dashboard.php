<body class="bg-white">
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

  <section class="p-6">
    <div class="flex flex-col lg:flex-row justify-between gap-10">
      <div class="flex-1">
        <h1 class="text-3xl font-bold mb-1 text-black">Dashboard</h1>
        <p class="text-gray-600 mb-6">Resumo do Salão</p>

        <div class="grid grid-cols-2 gap-6">
          <div class="bg-white border rounded-lg p-4 flex items-center gap-4 shadow-md">
            <div class="bg-gray-100 p-2 rounded-md">
              <i data-lucide="clock" class="w-6 h-6 text-black"></i>
            </div>
            <div>
              <p class="text-gray-600">Agendamentos do dia</p>
              <p class="text-xl font-bold text-black"><?php echo $totalHoje; ?></p>
            </div>
          </div>

          <div class="bg-white border rounded-lg p-4 flex items-center gap-4 shadow-md">
            <div class="bg-gray-100 p-2 rounded-md">
              <i data-lucide="check" class="w-6 h-6 text-black"></i>
            </div>
            <div>
              <p class="text-gray-600">Confirmados</p>
              <p class="text-xl font-bold text-black"><?php echo $totalConfirmados; ?></p>
            </div>
          </div>

          <div class="bg-white border rounded-lg p-4 flex items-center gap-4 shadow-md">
            <div class="bg-gray-100 p-2 rounded-md">
              <i data-lucide="check-circle" class="w-6 h-6 text-black"></i>
            </div>
            <div>
              <p class="text-gray-600">Realizados</p>
              <p class="text-xl font-bold text-black"><?php echo $totalRealizados; ?></p>
            </div>
          </div>

          <div class="bg-white border rounded-lg p-4 flex items-center gap-4 shadow-md">
            <div class="bg-gray-100 p-2 rounded-md">
              <i data-lucide="x-circle" class="w-6 h-6 text-black"></i>
            </div>
            <div>
              <p class="text-gray-600">Cancelados</p>
              <p class="text-xl font-bold text-black"><?php echo $totalCancelados; ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>