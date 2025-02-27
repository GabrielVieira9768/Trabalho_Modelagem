<div class="grid gap-4 mb-4">
    <!-- Campo Nome -->
    <div class="col-span-2">
        <label for="nome" class="block mb-2 text-sm font-medium text-gray-900">Nome</label>
        <input type="text" value="{{$projeto->nome}}" name="nome" id="nome" class="bg-white border border-[#256aa5] text-gray-900 text-sm rounded-lg focus:ring-[#256aa5] focus:border-[#256aa5] block w-full p-2.5" placeholder="Nome do Projeto">
    </div>

    <!-- Campo Data -->
    <div class="col-span-2">
        <label for="data" class="block mb-2 text-sm font-medium text-gray-900">Data</label>
        <input type="datetime-local" value="{{$projeto->data}}" name="data" id="data" class="bg-white border border-[#256aa5] text-gray-900 text-sm rounded-lg focus:ring-[#256aa5] focus:border-[#256aa5] block w-full p-2.5">
    </div>

    <!-- Local e Vagas na mesma linha -->
    <div class="col-span-2 grid grid-cols-2 gap-4">
        <!-- Campo Local -->
        <div>
            <label for="local" class="block mb-2 text-sm font-medium text-gray-900">Local</label>
            <input type="text" value="{{$projeto->local}}" name="local" id="local" class="bg-white border border-[#256aa5] text-gray-900 text-sm rounded-lg focus:ring-[#256aa5] focus:border-[#256aa5] block w-full p-2.5" placeholder="Local">
        </div>

        <!-- Campo Vagas -->
        <div>
            <label for="vagas" class="block mb-2 text-sm font-medium text-gray-900">Vagas</label>
            <input type="number" value="{{$projeto->vagas}}" name="vagas" id="vagas" class="bg-white border border-[#256aa5] text-gray-900 text-sm rounded-lg focus:ring-[#256aa5] focus:border-[#256aa5] block w-full p-2.5" placeholder="Número de vagas">
        </div>
    </div>

    <!-- Campo Descrição (textarea) -->
    <div class="col-span-2">
        <label for="descricao" class="block mb-2 text-sm font-medium text-gray-900">Descrição</label>
        <textarea name="descricao" id="descricao" class="bg-white border border-[#256aa5] text-gray-900 text-sm rounded-lg focus:ring-[#256aa5] focus:border-[#256aa5] block w-full p-2.5" rows="4" placeholder="Descrição do projeto">{{$projeto->descricao}}</textarea>
    </div>

    <!-- Campo Imagem -->
    <div class="col-span-2">
        <label for="imagem" class="block mb-2 text-sm font-medium text-gray-900">Imagem</label>
        <input value="{{$projeto->imagem}}" type="file" name="imagem" id="imagem" class="bg-white border border-[#256aa5] text-gray-900 text-sm rounded-lg focus:ring-[#256aa5] focus:border-[#256aa5] block w-full p-2.5">
    </div>
</div>