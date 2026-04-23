@extends('layouts.app')

@section('content')
    {{-- Header Background --}}
    <div
        style="position: absolute; top: 0; width: 100%; height: 310px; border-bottom-left-radius: 45px; border-bottom-right-radius: 45px; background: linear-gradient(135deg, #FF923C 0%, #FF801A 50%, #F97316 100%);">
    </div>

    <div class="relative flex flex-col items-center px-5 mt-[30px]">

        {{-- Back Button --}}
        <div class="w-full flex items-center justify-between mb-4">
            <a href="{{ route('index', $store->username) }}"
                class="w-10 h-10 flex items-center justify-center rounded-full bg-white/20 backdrop-blur-sm">
                <img src="{{ asset('assets/images/icons/Arrow - Left.svg') }}" class="w-6 h-6" alt="back">
            </a>
            <p class="text-white font-semibold text-lg">Profil Toko</p>
            <div class="w-10 h-10"></div>
        </div>

        {{-- Profile Card --}}
        <div class="w-full mt-0 z-10">
            {{-- Logo & Name --}}
            <div class="flex flex-col items-center justify-center text-center">
                <div
                    class="w-[100px] h-[100px] rounded-full border-4 border-white shadow-md overflow-hidden bg-white flex items-center justify-center">
                    @if ($store->logo)
                        <img src="{{ asset('storage/' . $store->logo) }}" class="w-full h-full object-cover"
                            alt="Logo {{ $store->name }}">
                    @else
                        <div
                            class="w-full h-full flex items-center justify-center bg-gradient-to-br from-[#FF923C] to-[#F97316]">
                            <span class="text-white text-3xl font-bold">{{ strtoupper(substr($store->name, 0, 1)) }}</span>
                        </div>
                    @endif
                </div>
                <h1 class="text-[22px] font-bold text-[#1a1a1a] mt-3">{{ $store->name }}</h1>

            </div>

        </div>

        {{-- Detail Info Section --}}
        <div class="w-full space-y-4" style="margin-top: 30px;">

            {{-- Alamat --}}
            @if ($store->address)
                <div class="bg-white rounded-[16px] p-5 shadow-sm">
                    <div class="flex items-start gap-4">
                        <div class="flex shrink-0 mt-[2px]">
                            <svg class="w-6 h-6 text-[#1a1a1a]" fill="none" stroke="currentColor" stroke-width="1.8"
                                viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                                <circle cx="12" cy="10" r="3" />
                            </svg>
                        </div>
                        <div class="flex-1 flex flex-col gap-1.5">
                            <p class="text-[#353535] text-[15px]">Alamat</p>
                            <p class="text-[#353535] text-[15px] leading-relaxed">{{ $store->address }}</p>
                            @if ($store->google_maps_link)
                                <a href="{{ $store->google_maps_link }}" target="_blank"
                                    class="mt-2.5 px-3 py-1.5 rounded-[8px] bg-[#FAFAFA] border border-[#F1F2F6] text-[#FF801A] text-[12px] font-medium hover:bg-[#F5F5F5] transition-all"
                                    style="display: inline-block; width: fit-content; align-self: flex-start;">
                                    Buka di Google Maps
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            {{-- Telepon --}}
            @if ($store->phone)
                <div class="bg-white rounded-[16px] p-5 shadow-sm">
                    <div class="flex items-start gap-4">
                        <div class="flex shrink-0 mt-[2px]">
                            <svg class="w-6 h-6 text-[#1a1a1a]" fill="none" stroke="currentColor" stroke-width="1.8"
                                viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z" />
                            </svg>
                        </div>
                        <div class="flex-1 flex flex-col gap-1.5">
                            <p class="text-[#353535] text-[15px]">Telepon</p>
                            <a href="tel:{{ $store->phone }}"
                                class="text-[#353535] text-[15px] hover:text-[#F97316] transition-colors leading-relaxed">
                                {{ $store->phone }}
                            </a>
                        </div>
                    </div>
                </div>
            @endif

            {{-- Jam Operasional --}}
            @if ($store->opening_hours && $store->closing_hours)
                <div class="bg-white rounded-[16px] p-5 shadow-sm">
                    <div class="flex items-start gap-4">
                        <div class="flex shrink-0 mt-[2px]">
                            <svg class="w-6 h-6 text-[#1a1a1a]" fill="none" stroke="currentColor" stroke-width="1.8"
                                viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10" />
                                <polyline points="12 6 12 12 16 14" />
                            </svg>
                        </div>
                        <div class="flex-1 flex flex-col gap-1.5">
                            <p class="text-[#353535] text-[15px]">Jam Operasional</p>
                            <div class="flex items-center gap-1.5">
                                <span class="text-[#353535] text-[15px]">
                                    {{ \Carbon\Carbon::parse($store->opening_hours)->format('H:i') }}
                                </span>
                                <span class="text-[#888] text-[15px]">—</span>
                                <span class="text-[#353535] text-[15px]">
                                    {{ \Carbon\Carbon::parse($store->closing_hours)->format('H:i') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            {{-- Sosial Media --}}
            @if ($store->storeSocialMedia && $store->storeSocialMedia->count() > 0)
                <div class="bg-white rounded-[16px] p-5 shadow-sm">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="flex shrink-0 mt-[2px]">
                            <svg class="w-6 h-6 text-[#1a1a1a]" fill="none" stroke="currentColor" stroke-width="1.8"
                                viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10" />
                                <line x1="2" y1="12" x2="22" y2="12" />
                                <path
                                    d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z" />
                            </svg>
                        </div>
                        <div class="flex-1 flex flex-col justify-center min-h-[28px]">
                            <p class="text-[#353535] text-[15px]">Sosial Media</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-center gap-4">
                        @foreach ($store->storeSocialMedia as $social)
                            @php
                                $bgStyle = match($social->platform) {
                                    'instagram' => 'background: linear-gradient(135deg, #833ab4, #fd1d1d, #fcb045);',
                                    'facebook' => 'background: #1877F2;',
                                    'tiktok' => 'background: #010101;',
                                    default => 'background: #888;',
                                };
                            @endphp
                            <a href="{{ $social->url }}" target="_blank"
                                class="w-11 h-11 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 hover:shadow-md"
                                style="{{ $bgStyle }}">
                                @if ($social->platform === 'instagram')
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z" />
                                    </svg>
                                @elseif ($social->platform === 'facebook')
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                    </svg>
                                @elseif ($social->platform === 'tiktok')
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z" />
                                    </svg>
                                @else
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="10" />
                                    </svg>
                                @endif
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>



    </div>

    @include('includes.navigation')
@endsection

@section('script')
@endsection
