<body class="bg-white">
  <section class="flex h-screen">
    
    <!-- Imagem à esquerda -->
    <div class="w-1/2 h-full">
      <img src="../public/img/login_img.jpg" alt="Login" class="object-cover w-full h-full">
    </div>

    <!-- Área de login à direita -->
    <div class="w-1/2 flex items-center justify-center">
      <div class="bg-[#f9f9f9] rounded-xl p-10 w-full max-w-md shadow-lg space-y-8">
        <div class="space-y-2 flex items-center justify-between">
          <h1 class="text-3xl font-bold">Login</h1>
          <!-- Ícone de cadeado com link para login do administrador -->
          <a href="/sistema_salao/adminLogin" class="text-gray-500 hover:text-black transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m0-6a2 2 0 100 4 2 2 0 000-4zm6 2a6 6 0 10-12 0 6 6 0 0012 0z" />
            </svg>
          </a>
        </div>
        <p class="text-sm text-gray-500">
          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
        </p>

        <form action="/sistema_salao/auth/login" method="POST" class="space-y-6">
          <div class="space-y-4">
            <div class="flex flex-col space-y-1">
              <label for="email" class="text-sm font-medium">Seu email</label>
              <input type="email" name="email" id="email" required
                     class="py-3 px-4 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black">
            </div>
            <div class="flex flex-col space-y-1">
              <label for="password" class="text-sm font-medium">Sua senha</label>
              <input type="password" name="password" id="password" required
                     class="py-3 px-4 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black">
            </div>
          </div>

          <button type="submit"
                  class="w-full bg-black text-white py-3 rounded-lg font-semibold hover:bg-gray-900 transition">
            Entrar
          </button>
        </form>

        <!-- Mensagem para cadastro -->
        <div class="text-sm text-center">
          Não tem uma conta?
          <a href="cadastrar" class="text-black font-medium hover:underline">Cadastre-se aqui</a>
        </div>
      </div>
    </div>

  </section>
</body>