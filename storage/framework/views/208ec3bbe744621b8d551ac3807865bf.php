<!-- ── Footer ─────────────────────────────────── -->
<footer class="bg-white border-t border-[#e2e8f0]">
    <div
        class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5 sm:py-6 lg:py-7 flex flex-col sm:flex-row items-center justify-between gap-2 sm:gap-3 lg:gap-4">
        <div class="flex flex-col xs:flex-row items-center gap-2 xs:gap-3 text-center xs:text-left">
            <img src="<?php echo e(asset('/images/logo/qaabil.jpeg')); ?>" alt="Qaabil"
                class="h-6 sm:h-7 lg:h-8 w-auto object-contain opacity-60">
            <span class="text-[.7rem] xs:text-[.75rem] sm:text-[.8rem] text-[#94a3b8]">© 2026 Qaabil · Empowering
                learning.</span>
        </div>
        <div class="flex gap-4 sm:gap-5 lg:gap-6">
            <a wire:navigate href="<?php echo e(route('contact')); ?>"
                class="text-[.7rem] xs:text-[.75rem] sm:text-[.8rem] text-[#94a3b8] no-underline transition-colors hover:text-[#1b3a6b]">Contact</a>
        </div>
    </div>
</footer>
<?php /**PATH /var/www/html/resources/views/components/footer.blade.php ENDPATH**/ ?>