<?php


use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

new class extends Component
{
    public string $nis = '';
    public string $password = '';

    protected $rules = [
        'nis' => 'required|integer|exists:users,nis',
        'password' => 'required|string',
    ];

    public function login()
    {
        $credentials = $this->validate();

        if (! Auth::attempt(['nis' => $this->nis, 'password' => $this->password], true))
        {
            throw ValidationException::withMessages([
                'nis' => 'Kredensial yang Anda masukkan salah.',
            ]);
        }

        session()->regenerate();

        if (Auth::user()->canAccessPanel())
        {
            return redirect()->to('/admin');
        }

        return redirect()->to(config('fortify.home', '/admin'));
    }

    public function render()
    {
        return $this->view(['auth.login'])->layout('layouts::app');
    }
};
?>

<div class="flex min-h-screen w-full bg-white">
    <div class="hidden flex-1 items-center justify-center p-8 lg:flex lg:p-16">
        <div class="relative flex h-full w-full max-w-4xl items-center justify-center border bg-[#f4f7f9]">
            <svg class="absolute inset-0 h-full w-full text-gray-200" preserveAspectRatio="none" viewBox="0 0 100 100">
                <line x1="0" y1="0" x2="100" y2="100" stroke="currentColor" stroke-width="0.5" />
                <line x1="0" y1="100" x2="100" y2="0" stroke="currentColor" stroke-width="0.5" />
            </svg>
            <div class="relative z-10 flex h-20 w-24 items-center justify-center border-2 border-gray-300 bg-[#f4f7f9]">
                <svg class="h-10 w-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
        </div>
    </div>

    <div class="flex w-full flex-col justify-center bg-[#424A53] px-8 sm:px-12 lg:w-[450px]">
        <div class="mx-auto w-full max-w-xs">
            <div class="mb-12 flex justify-center">
                <a href="/" wire:navigate class="flex items-center justify-center">
                    <img src="{{ asset('log46.png')}}" alt="Logo" class="w-35 h-35">
                </a>
            </div>

            <form method="POST" action="{{ route('login.store') }}" class="space-y-4">
                @csrf
                <input type="number" name="nis" value="{{ old('nis') }}" class="w-full bg-white px-4 py-3 text-sm focus:outline-none" placeholder="NIS">
                @error('nis') <p class="text-xs text-red-400">{{ $message }}</p> @enderror

                <div class="space-y-2">
                    <input type="password" name="password" class="w-full bg-white px-4 py-3 text-sm focus:outline-none" placeholder="Password">
                    <div class="text-right">
                        <a href="#" class="text-xs text-gray-300 hover:text-white transition">Lupa password?</a>
                    </div>
                </div>

                <button type="submit" class="mt-4 w-full bg-white py-3 text-sm font-bold text-[#424A53] hover:bg-gray-100 uppercase tracking-widest transition">
                    Masuk
                </button>
            </form>

        </div>
    </div>
</div>
