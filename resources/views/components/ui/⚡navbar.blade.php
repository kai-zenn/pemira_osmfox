<?php

use Livewire\Component;

new class extends Component
{
    public function logout()
    {
        Auth::logout();
    }
};
?>

<nav class="absolute top-0 left-0 right-0 z-50 px-6 py-5 flex items-center justify-between">
    <! -- konten navbar akan berubah saat user ter otorisasi-->
    @auth
        <a href="/home" wire:navigate class="flex items-center gap-2 group pl-3.5">
            <div class="flex items-center justify-center">
                <img src="{{ asset('log46.png')}}" alt="Logo" class="items-center justify-center w-10 h-11 pb-1.5">
            </div>
            <span class="text-white font-semibold text-sm tracking-wide hidden sm:block">
                VOX46.io
            </span>
        </a>
        <li class="flext items-center justify-center gap-5">
           <a href="/home" wire:navigate class="text-bone/10 px-3 py-2 text-sm font-medium hover:bg-blk/15 hover:text-bone">Beranda</a>
           <a href="/bilik" wire:navigate class="text-bone/10 px-3 py-2 text-sm font-medium hover:bg-blk/15 hover:text-bone">Bilik Suara</a>
           <a href="/kandidat" wire:navigate class="text-bone/10 px-3 py-2 text-sm font-medium hover:bg-blk/15 hover:text-bone">Kandidat</a>
           <a href="/berita" wire:navigate class="text-bone/10 px-3 py-2 text-sm font-medium hover:bg-blk/15 hover:text-bone">Berita</a>
        </li>
    @endauth

    @guest
        <a href="/" wire:navigate class="flex items-center gap-2 group pl-3.5">
            <div class="flex items-center justify-center">
                <img src="{{ asset('log46.png')}}" alt="Logo" class="items-center justify-center w-10 h-11 pb-1.5">
            </div>
            <span class="text-white font-semibold text-sm tracking-wide hidden sm:block">
                VOX46.io
            </span>
        </a>

        <a href="/login" wire:navigate class="relative inline-flex items-center gap-2 px-5 py-2.5 text-sm font-semibold rounded-full bg-white/10 border border-white/25 text-white backdrop-blur-md
            hover:bg-white hover:text-main
            transition-all duration-300 ease-out group"
        >
            <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
            </svg>
            Login
        </a>
    @endguest
</nav>

