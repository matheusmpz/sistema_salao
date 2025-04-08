<body class="bg-white">
  <section class="flex h-screen">

    <!-- Lado esquerdo: formulário de cadastro -->
    <div class="w-1/2 flex items-center justify-center">
      <div class="bg-[#f9f9f9] rounded-xl p-10 w-full max-w-md shadow-lg space-y-6">
        <div class="space-y-2">
          <h1 class="text-3xl font-bold">Cadastro</h1>
          <p class="text-sm text-gray-500">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
          </p>
        </div>

        <form action="/sistema_salao/auth/cadastrar" method="POST" class="space-y-4">
          <div>
            <label for="nome" class="block text-sm font-medium">Nome:</label>
            <input type="text" name="nome" id="nome" required
                   class="w-full py-3 px-4 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black">
          </div>

          <div>
            <label for="telefone" class="block text-sm font-medium">Telefone:</label>
            <input type="text" name="telefone" id="telefone" required
                   class="w-full py-3 px-4 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black">
          </div>

          <div>
            <label for="email" class="block text-sm font-medium">Email:</label>
            <input type="email" name="email" id="email" required
                   class="w-full py-3 px-4 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black">
          </div>

          <div>
            <label for="senha" class="block text-sm font-medium">Senha:</label>
            <input type="password" name="senha" id="senha" required
                   class="w-full py-3 px-4 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black">
          </div>

          <div>
            <label for="confirmar_senha" class="block text-sm font-medium">Confirmar Senha:</label>
            <input type="password" name="confirmar_senha" id="confirmar_senha" required
                   class="w-full py-3 px-4 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black">
          </div>

          <button type="submit"
                  class="w-full bg-black text-white py-3 rounded-lg font-semibold hover:bg-gray-900 transition">
            Entrar
          </button>
        </form>
        <!-- Mensagem para login -->
        <div class="text-sm text-center">
          Já possui uma conta?
          <a href="index" class="text-black font-medium hover:underline">Faça seu login.</a>
        </div>
      </div>
    </div>

    <!-- Lado direito: imagem -->
    <div class="w-1/2 h-full">
      <img src="../public/img/cadastro_img.jpg" alt="Cadastro" class="object-cover w-full h-full">
    </div>

  </section>
</body>
