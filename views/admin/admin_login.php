<body class="bg-gray-100 flex items-center justify-center min-h-screen">
  <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-sm">
    <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Login do Administrador</h2>

    <form action="/sistema_salao/adminLogin/login" method="POST" class="space-y-4">
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
        <input type="email" name="email" id="email" required
               class="mt-1 block w-full px-4 py-2 border rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
      </div>

      <div>
        <label for="senha" class="block text-sm font-medium text-gray-700">Senha</label>
        <input type="password" name="password" id="password" required
               class="mt-1 block w-full px-4 py-2 border rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
      </div>

      <button type="submit"
              class="w-full bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded-xl font-semibold transition">
        Entrar
      </button>
    </form>
  </div>
</body>