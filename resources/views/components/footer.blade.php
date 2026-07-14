 @php
     $links = [
         [
             'route' => 'contact',
             'label' => getContactPageSettings()->route['label'],
         ],
         [
             'route' => 'policy',
             'label' => getPrivacyPolicyPageSettings()->route['label'],
         ],
         [
             'route' => 'terms',
             'label' => getTermsAndConditionsPageSettings()->route['label'],
         ],
     ];
 @endphp
 <!-- ── Footer ─────────────────────────────────── -->
 <footer class="bg-white border-t border-[#e2e8f0]">
     <div
         class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5 sm:py-6 lg:py-7 flex flex-col sm:flex-row items-center justify-between gap-2 sm:gap-3 lg:gap-4">
         <div class="flex flex-col xs:flex-row items-center gap-2 xs:gap-3 text-center xs:text-left">
             <img src="{{ asset('storage/' . getSiteSettings()['logo']) }}" alt="Qaabil"
                 class="h-6 sm:h-7 lg:h-8 w-auto object-contain opacity-60">
             <span class="text-[.7rem] xs:text-[.75rem] sm:text-[.8rem] text-[#94a3b8]">© 2026 Qaabil · Empowering
                 learning.</span>
         </div>
         <div class="flex gap-4 sm:gap-5 lg:gap-6">
             @foreach ($links as $link)
                 @php
                     $pattern = $link['pattern'] ?? $link['route'];
                     $active = request()->routeIs($pattern);
                 @endphp
                 <a {{ spa() }} href="{{ route($link['route']) }}" @class([
                     'text-[.7rem] xs:text-[.75rem] sm:text-[.8rem] no-underline transition-colors',
                     'text-[#94a3b8] hover:text-[#1b3a6b]' => !$active,
                     'text-[#1b3a6b]' => $active,
                 ])>
                     {{ $link['label'] }}
                 </a>
             @endforeach
         </div>
     </div>
 </footer>
