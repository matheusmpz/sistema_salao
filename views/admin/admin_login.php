<body class="bg-white flex items-center justify-center h-screen">
  <div class="bg-[#f9f9f9] rounded-xl p-10 w-full max-w-md shadow-lg space-y-8">
    <div class="space-y-2">
      <h1 class="text-3xl font-bold">Login do Administrador</h1>
      <p class="text-sm text-gray-500">
        Acesse o painel administrativo para gerenciar o sistema.
      </p>
    </div>

    <form action="/sistema_salao/adminLogin/login" method="POST" class="space-y-6">
      <div class="space-y-4">
        <div class="flex flex-col space-y-1">
          <label for="email" class="text-sm font-medium">E-mail</label>
          <input type="email" name="email" id="email" required
                 class="py-3 px-4 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black">
        </div>
        <div class="flex flex-col space-y-1">
          <label for="password" class="text-sm font-medium">Senha</label>
          <input type="password" name="password" id="password" required
                 class="py-3 px-4 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black">
        </div>
      </div>

      <button type="submit"
              class="w-full bg-black text-white py-3 rounded-lg font-semibold hover:bg-gray-900 transition">
        Entrar
      </button>
    </form>
  </div>
</body>