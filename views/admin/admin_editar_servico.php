<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
  <form action="/sistema_salao/adminServico/editar/<?= $servico['id'] ?>" method="POST" class="w-full max-w-md bg-white p-8 rounded-xl shadow-md">
    <h2 class="text-2xl font-semibold text-center text-gray-900">Editar Serviço</h2>
    <p class="text-sm text-gray-600 text-center mt-2 mb-4">Altere as informações do serviço cadastrado abaixo.</p>

    <?php if (!empty($mensagemErro)): ?>
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Erro:</strong>
        <span class="block sm:inline"><?= $mensagemErro ?></span>
      </div>
    <?php endif; ?>

    <hr class="my-4">

    <!-- Campo oculto com ID do serviço -->
    <input type="hidden" name="id" value="<?= $servico['id'] ?>">

    <div class="mb-4">
      <label for="nome" class="block text-sm font-medium text-gray-700 mb-1">Nome</label>
      <input type="text" name="nome" id="nome" required value="<?= htmlspecialchars($servico['nome']) ?>"
        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500" />
    </div>

    <div class="mb-4">
      <label for="preco" class="block text-sm font-medium text-gray-700 mb-1">Preço</label>
      <input type="number" step="0.01" name="preco" id="preco" required value="<?= htmlspecialchars($servico['preco']) ?>"
        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500" />
    </div>

    <div class="mb-6">
      <label for="descricao" class="block text-sm font-medium text-gray-700 mb-1">Descrição</label>
      <textarea name="descricao" id="descricao" rows="3" required
        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500"><?= htmlspecialchars($servico['descricao']) ?></textarea>
    </div>

    <button type="submit"
      class="w-full bg-gray-900 text-white py-2 rounded-md font-semibold hover:bg-gray-800 transition">
      Atualizar
    </button>
  </form>
</div>