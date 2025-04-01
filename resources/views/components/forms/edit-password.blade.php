    <div class="w-160 mx-auto p-6 bg-white shadow-md rounded-lg max-md:w-full">
        <h2 class="text-2xl font-semibold text-gray-700 mb-6">Alterar Senha</h2>

        <form action="{{ route('users.update.password', ['user' => $user]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="current_password" class="block text-sm font-medium text-gray-700">Current Password</label>
                <x-bladewind::input type="password" id="current_password" name="current_password" viewable="true"
                    required="true" />
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
                <x-bladewind::input type="password" id="password" name="password" viewable="true" required="true" />
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm
                    Password</label>
                <x-bladewind::input type="password" id="password_confirmation" name="password_confirmation"
                    viewable="true" required="true" />
            </div>

            <div class="flex justify-end gap-2">

                <button type="submit" class="px-12 py-2 !bg-blue-600 text-white rounded-md">Save</button>
            </div>
        </form>
    </div>

