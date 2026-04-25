@extends('layouts.app')

@section('content')
    <div id="Background"
        class="absolute top-0 w-full h-[170px] rounded-b-[45px] bg-[linear-gradient(90deg,#FF923C_0%,#FF801A_100%)]">
    </div>

    <div id="TopNav" class="relative flex flex-col px-5 mt-[20px] h-[170px]">
        <div class="relative flex items-center justify-between">
            <div class="flex flex-col gap-1">
                <p class="text-white text-sm">Selamat Datang di,</p>
                <h1 class="text-white font-semibold">{{ $store->name }}</h1>
            </div>
            <div class="relative">
                <button onclick="toggleNotification()" id="bell-btn"
                    class="w-12 h-12 flex items-center justify-center shrink-0 rounded-full bg-white bg-opacity-20">
                    <img src="{{ asset('assets/images/icons/ic_bell.svg') }}" class="w-[28px] h-[28px]" alt="icon">
                </button>
                @if (isset($unratedTransactions) && $unratedTransactions->count() > 0)
                    <div
                        class="absolute top-0 right-0 w-[18px] h-[18px] rounded-full bg-[#FF001A] flex items-center justify-center pointer-events-none z-10 border-2 border-white">
                        <span
                            class="text-white text-[9px] font-bold leading-none">{{ $unratedTransactions->count() }}</span>
                    </div>
                @endif

                {{-- Notification Dropdown --}}
                @if (isset($unratedTransactions) && $unratedTransactions->count() > 0)
                    <div id="notification-dropdown"
                        class="hidden absolute right-0 top-12 w-max min-w-[150px] max-w-[250px] bg-white rounded-[12px] shadow-2xl z-50 overflow-hidden border border-[#F1F2F6]">
                        <div class="max-h-[250px] overflow-y-auto">
                            @foreach ($unratedTransactions as $trx)
                                <a href="{{ route('rating', ['username' => $store->username, 'transaction_code' => $trx->code]) }}"
                                    class="flex items-center gap-3 px-4 py-2 hover:bg-[#FFF7ED] border-b border-[#F1F2F6] transition-colors">
                                    <div
                                        class="w-8 h-8 rounded-full bg-[#FFF7ED] flex items-center justify-center shrink-0">
                                        <svg class="w-4 h-4 text-[#F97316]" fill="none" stroke="currentColor"
                                            stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <polygon
                                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                                        </svg>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-[#353535] text-sm font-medium truncate leading-tight">
                                            {{ $trx->code }}</p>
                                        <p class="text-[#888] text-xs leading-tight">Beri rating pesanan Anda ⭐</p>
                                    </div>
                                    <svg class="w-4 h-4 text-[#ccc]" fill="none" stroke="currentColor" stroke-width="2"
                                        viewBox="0 0 24 24">
                                        <polyline points="9 18 15 12 9 6" />
                                    </svg>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <h1 class="text-white font-[600] text-2xl leading-[30px] mt-[20px]">Pesan menu pilihanmu di sini!</h1>

        <form action="{{ route('product.find-result', $store->username) }}" method="GET"
            class="absolute bottom-0 left-0 right-0 w-full gap-2 px-5">
            <label
                class="flex items-center w-full rounded-full p-[8px_8px] gap-3 bg-white ring-1 ring-[#F1F2F6] focus-within:ring-[#F3AF00] transition-all duration-300">
                <img src="{{ asset('assets/images/icons/ic_search.svg') }}" class="w-8 h-8 flex shrink-0" alt="icon">
                <input type="text" name="search" id="search-input"
                    class="appearance-none outline-none w-full font-semibold placeholder:text-ngekos-grey placeholder:font-light"
                    placeholder="Cari menu, dll...">
            </label>
        </form>

    </div>

    <div id="Categories" class="relative flex flex-col px-5 mt-[20px]">
        <div class="flex items-end justify-between ">
            <h1 class="text-[#353535] font-[500] text-lg">Jelajahi Kategori</h1>
            <a href="#" class="text-[#FF801A] text-sm ">Lihat Semua</a>
        </div>

        <div class="swiper w-full">
            <div class="swiper-wrapper mt-[20px]">
                @foreach ($store->productCategories as $category)
                    <a href="{{ route('product.find-result', $store->username) . '?category=' . $category->slug }}"
                        class="swiper-slide !w-fit">
                        <div class="flex flex-col items-center shrink-0 gap-2 text-center">
                            <div
                                class="w-[64px] h-[64px] rounded-full flex shrink-0 overflow-hidden bg-[#9393931A] bg-opacity-10">
                                <img src="{{ asset('storage/' . $category->icon) }}" class="w-full h-full object-cover"
                                    alt="thumbnail">
                            </div>

                            <div class="flex flex-col gap-[2px]">
                                <h3 class="font-light text-[#504D53] text-[14px]">{{ $category->name }}</h3>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>
    </div>

    <div id="Favorites" class="relative flex flex-col px-5 mt-[20px]">
        <div class="flex items-end justify-between">
            <h1 class="text-[#353535] font-[500] text-lg">Menu Favorit</h1>
            <a href="#" class="text-[#FF801A] text-sm ">Lihat Semua</a>
        </div>

        <div class="swiper w-full">
            <div class="swiper-wrapper mt-[10px]">
                @foreach ($populars as $popular)
                    <div class="swiper-slide !w-fit">
                        <a href="{{ route('product.show', ['username' => $store->username, 'id' => $popular->id]) }}"
                            class="card">
                            <div
                                class="flex flex-col w-[210px] shrink-0 rounded-[8px] bg-white p-[12px] pb-5 gap-[10px] hover:bg-[#FFF7F0] hover:border-[1px] hover:border-[#F3AF00] transition-all duration-300 cursor-pointer">
                                <div
                                    class="position-relative flex w-full h-[150px] shrink-0 rounded-[8px] bg-[#D9D9D9] overflow-hidden">
                                    <img src="{{ asset('storage/' . $popular->image) }}" class="w-full h-full object-cover"
                                        alt="thumbnail">

                                    <!-- rating -->
                                    <div
                                        class="absolute top-5 right-5 flex items-center gap-1 bg-white px-[8px] py-[4px] rounded-full">
                                        <img src="assets/images/icons/ic_star.svg" alt="rating" class="w-4 h-4">
                                        <p class="text-sm">{{ $popular->average_rating }}</p>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <p class="text-[#F3AF00] font-[400] text-[12px]">
                                        {{ $popular->productCategory->name }}
                                    </p>
                                    <h3 class="text-[#353535] font-[500] text-[14px]">
                                        {{ $popular->name }}
                                    </h3>
                                    <p class="text-[#606060] font-[400] text-[10px]">
                                        {{ $popular->description }}
                                    </p>

                                </div>

                                <div class="flex items-center justify-between ">
                                    <p class="text-[#FF001A] font-[600] text-[14px]">
                                        Rp {{ number_format($popular->price) }}
                                    </p>
                                    <button type="button"
                                        class="flex items-center justify-center w-[24px] h-[24px] rounded-full bg-transparent"
                                        data-id="{{ $popular->id }}" onclick="addToCart(this.dataset.id)">
                                        <img src="assets/images/icons/ic_plus.svg" class="w-full h-full" alt="icon">
                                    </button>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div id="Recomendations" class="relative flex flex-col px-5 mt-[20px]">
        <div class="flex items-end justify-between ">
            <h1 class="text-[#353535] font-[500] text-lg">Rekomendasi Chef</h1>
            <a href="#" class="text-[#FF801A] text-sm ">Lihat Semua</a>
        </div>
        <div class="flex flex-col gap-4 mt-[10px]">

            @foreach ($products as $product)
                <a href="{{ route('product.show', ['username' => $store->username, 'id' => $product->id]) }}"
                    class="card">
                    <div
                        class="flex rounded-[8px] border border-[#F1F2F6] p-[12px] gap-4 bg-white hover:bg-[#FFF7F0] hover:border-[1px] hover:border-[#F3AF00] transition-all duration-300">
                        <img src="{{ asset('storage/' . $product->image) }}" class="w-[128px] object-cover rounded-[8px]"
                            alt="icon">
                        <div class="flex flex-col gap-1 w-full">
                            <p class="text-[#F3AF00] font-[400] text-[12px]">
                                {{ $product->productCategory->name }}
                            </p>
                            <h3 class="text-[#353535] font-[500] text-[14px]">
                                {{ $product->name }}
                            </h3>
                            <p class="text-[#606060] font-[400] text-[10px]">
                                {{ $product->description }}
                            </p>

                            <div class="flex items-center justify-between ">
                                <p class="text-[#FF001A] font-[600] text-[14px]">
                                    Rp {{ number_format($product->price) }}
                                </p>
                                <button type="button"
                                    class="flex items-center justify-center w-[24px] h-[24px] rounded-full bg-transparent"
                                    data-id="{{ $product->id }}" onclick="addToCart(this.dataset.id)">
                                    <img src="assets/images/icons/ic_plus.svg" class="w-full h-full" alt="icon">
                                </button>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    @include('includes.navigation')
@endsection

@section('script')
    <script>
        function toggleNotification() {
            const dropdown = document.getElementById('notification-dropdown');
            if (dropdown) {
                dropdown.classList.toggle('hidden');
            }
        }

        // Tutup dropdown ketika klik di luar
        document.addEventListener('click', function(e) {
            const dropdown = document.getElementById('notification-dropdown');
            const bellBtn = document.getElementById('bell-btn');
            if (dropdown && bellBtn && !bellBtn.contains(e.target) && !dropdown.contains(e.target)) {
                dropdown.classList.add('hidden');
            }
        });

        // Tampilkan toast jika ada session rating_success
        @if (session('rating_success'))
            document.addEventListener('DOMContentLoaded', function() {
                showToast('{{ session('rating_success') }}');
            });
        @endif

        // Auto-buka notifikasi jika dari halaman sukses
        document.addEventListener('DOMContentLoaded', function() {
            const params = new URLSearchParams(window.location.search);
            if (params.get('from') === 'success') {
                const dropdown = document.getElementById('notification-dropdown');
                if (dropdown) {
                    dropdown.classList.remove('hidden');
                }
                showToast('Pesanan berhasil! Beri rating pesanan Anda ⭐');

                // Hapus query param dari URL agar tidak terbuka ulang saat refresh
                window.history.replaceState({}, '', window.location.pathname);
            }
        });
    </script>
@endsection
