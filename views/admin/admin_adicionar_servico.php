<body>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
      <form action="/servico/adicionar.php" method="POST" class="w-full max-w-md bg-white p-8 rounded-xl shadow-md">
        <h2 class="text-2xl font-semibold text-center text-gray-900">Adicionar Serviço</h2>
        <p class="text-sm text-gray-600 text-center mt-2 mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the</p>
        
        <hr class="my-4">
    
        <div class="mb-4">
          <label for="nome" class="block text-sm font-medium text-gray-700 mb-1">Nome</label>
          <input type="text" name="nome" id="nome" required
            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500" />
        </div>
    
        <div class="mb-4">
          <label for="preco" class="block text-sm font-medium text-gray-700 mb-1">Preço</label>
          <input type="number" step="0.01" name="preco" id="preco" required
            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500" />
        </div>
    
        <div class="mb-6">
          <label for="descricao" class="block text-sm font-medium text-gray-700 mb-1">Descrição</label>
          <textarea name="descricao" id="descricao" rows="3" required
            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500"></textarea>
        </div>
    
        <button type="submit"
          class="w-full bg-gray-900 text-white py-2 rounded-md font-semibold hover:bg-gray-800 transition">
          Adicionar
        </button>
      </form>
    </div>
</body>
