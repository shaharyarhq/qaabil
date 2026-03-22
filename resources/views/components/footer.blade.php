   <!-- ── Footer ─────────────────────────────────── -->
    <footer class="bg-white border-t border-[#e2e8f0]">
        <div class="max-w-7xl mx-auto px-6 py-7 flex flex-col md:flex-row items-center justify-between gap-3">
            <div class="flex items-center gap-3">
                <img src="{{ asset('/images/logo/qaabil.jpeg') }}" alt="Qaabil" class="h-8 w-auto object-contain opacity-60">
                <span class="text-[.8rem] text-[#94a3b8]">© 2025 Qaabil · empower learning.</span>
            </div>
            <div class="flex gap-6">
                <a wire:navigate href="{{ route('contact') }}"
                    class="text-[.8rem] text-[#94a3b8] no-underline transition-colors hover:text-[#1b3a6b]">Contact</a>
            </div>
        </div>
    </footer>
