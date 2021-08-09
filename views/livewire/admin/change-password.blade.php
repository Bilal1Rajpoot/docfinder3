<div>
    <form wire:submit.prevent="submit">
        <div class="form-group">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <label>Old Password</label>
            <input type="password" wire:model.defer="old_password"  required class="form-control @error('old_password') is-invalid @enderror" >
            @error('old_password')
            <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
            @enderror
        </div>
        <div class="form-group">
            <label>New Password</label>
            <input type="password" wire:model.defer="password" required class="form-control @error('password') is-invalid @enderror" >
            @error('password')
            <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
            @enderror
        </div>
        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" wire:model.defer="password_confirmation" required class="form-control">
        </div>
        <button class="btn btn-primary" type="submit">Save Changes</button>
    </form>
</div>
