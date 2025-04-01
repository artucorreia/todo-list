<div class="w-160 mx-auto p-6 bg-white shadow-md rounded-lg max-md:w-full">
    <h2 class="text-2xl font-semibold text-gray-700 mb-6">Editar Perfil</h2>

    <form action="{{ route('users.update.profile', ['user' => $user]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
            <input type="text" id="name" name="name" placeholder="{{ $user->name }}"
                value="{{ old('name') }}"
                class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
            <input type="email" id="email" name="email" placeholder="{{ $user->email }}"
                value="{{ old('email') }}"
                class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="flex justify-end gap-2">
            <button type="submit" class="px-12 py-2 !bg-blue-600 text-white rounded-md" title="Save edit">Save</button>
        </div>
    </form>
</div>

