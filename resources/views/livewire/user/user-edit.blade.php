<div class="pt-5">
    <form wire:submit="update" class="bg-white dark:bg-slate-900 shadow-md rounded px-4 md:px-8 pt-6 pb-8 mb-4">
        <h2 class="mb-2 font-bold text-3xl dark:text-white text-blue-500">Edit User</h2>
        <hr>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-3">
            <div class="mb-1">
                <label for="Name" class="my-label">Name</label>
                <input type="text" wire:model="name" placeholder="Name" id="Name" class="my-input focus:outline-none focus:shadow-outline">
                @if ($errors->has('name'))
                    <div class="text-red-500">{{ $errors->first('name') }}</div>
                @endif
            </div>
            <div class="mb-1">
                <label for="email" class="my-label">Email</label>
                <input type="email" wire:model="email" placeholder="Email" id="email" class="my-input focus:outline-none focus:shadow-outline appearance-none">
                @if ($errors->has('email'))
                    <div class="text-red-500">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <div class="mb-1">
                <div wire:ignore>
                    <label for="roles" class="my-label">Role</label>
                    <select id="roles" wire:model="roles" class="my-input focus:outline-none focus:shadow-outline p-0" name="roles[]" multiple>
                        @foreach ($allRoles as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
                @if ($errors->has('roles'))
                    <div class="text-red-500">{{ $errors->first('roles') }}</div>
                @endif
            </div>
        </div>
        <div class="flex justify-start items-center mt-4">
            <button type="submit" class="btn-submit btn mr-4" wire:loading.remove>Update</button>
            <button type="button" disabled class="btn-submit btn mr-4" wire:loading>Loading</button>
        </div>
    </form>
    @push('js')
    <script>
        document.addEventListener("DOMContentLoaded", function(e) {
            // seachable
            var options = {
                searchable: true,
                placeholder: 'Select Roles'
            };
            NiceSelect.bind(document.getElementById("roles"), options);
        });
    </script>
    @endpush
</div>
