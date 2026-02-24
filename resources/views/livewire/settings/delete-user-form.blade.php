<div>
    <form wire:submit.prevent="deleteUser">
        <div class="mb-3">
            <label class="form-label">Kata Sandi</label>
            <input type="password" class="form-control" wire:model="password" />
            @error('password') <span class="text-danger small">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-danger">Hapus Akun</button>
    </form>
</div>
