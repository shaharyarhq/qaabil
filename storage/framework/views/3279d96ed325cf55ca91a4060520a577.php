<div>

    <!-- ── Hero ───────────────────────────────────── -->
    <div class="hero bg-[#1b3a6b] relative overflow-hidden">
        <div class="absolute rounded-full pointer-events-none" style="width:500px;height:500px;background:radial-gradient(circle,rgba(245,158,11,.2) 0%,transparent 65%);top:-180px;right:-100px">
        </div>
        <div class="absolute rounded-full pointer-events-none" style="width:280px;height:280px;background:radial-gradient(circle,rgba(99,132,255,.12) 0%,transparent 65%);bottom:-80px;left:40px">
        </div>

        <div class="relative z-10 max-w-3xl mx-auto px-6 py-20 text-center">
            <div class="inline-flex items-center gap-2 rounded-full px-4 py-1.5 mb-6" style="background:rgba(245,158,11,.12);border:1px solid rgba(245,158,11,.25)">
                <span class="inline-block w-[7px] h-[7px] rounded-full bg-[#f59e0b] shrink-0"></span>
                <span class="text-white/80 text-[.75rem] font-bold uppercase tracking-[.08em]">We'd love to hear from
                    you</span>
            </div>
            <h1 class="font-extrabold text-white leading-[1.1] tracking-tight mb-5" style="font-size:clamp(2.4rem,5vw,3.75rem)">
                Let's
                <span class="font-['Instrument_Serif',serif] font-normal italic text-[#f59e0b]"> talk.</span>
            </h1>
            <p class="text-white/60 text-lg max-w-lg mx-auto leading-relaxed">
                Whether you're a student, a teacher, or an institution — we're here and happy to chat.
            </p>
        </div>
    </div>

    <!-- ── Main ──────────────────────────────────── -->
    <main class="max-w-6xl mx-auto px-6 py-16 pb-28">

        <div class="grid grid-cols-1 lg:grid-cols-5 gap-10 items-start">

            <!-- ── Left: contact methods + info ─────── -->
            <div class="lg:col-span-2 flex flex-col gap-5">

                <?php
                $methods = [
                [
                'label' => 'Email us at',
                'value' => 'admin@qaabil.academy',
                'sub' => 'We reply within 24 hours',
                'href' => 'mailto:admin@qaabil.academy',
                'icon' => '
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />',
                ],
                [
                'label' => 'WhatsApp us at',
                'value' => '+60162924472',
                'sub' => 'Schools, universities & bootcamps',
                'href' => 'https://wa.me/60162924472',
                'icon' => '
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 2C6.477 2 2 6.477 2 12c0 1.89.525 3.66 1.438 5.168L2 22l4.832-1.438A9.955 9.955 0 0012 22c5.523 0 10-4.477 10-10S17.523 2 12 2z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.5 8.5s.5 1 1.5 2 2 1.5 2 1.5l1.5-1.5s1 .5 2 1.5v2s-1 1-3 0S8 11 7 9l1.5-1.5z" />',
                ],
                ];

                $socials = [
                [
                'label' => 'LinkedIn',
                'href' => 'https://linkedin.com/company/qaabilacademy',
                'color' => '#0077b5',
                'icon' => 'https://site-images.similarcdn.com/image?url=linkedin.com&t=2&s=1&h=64a0e043fc8ff74ac308e3f0e136ae7d1b6544be4e9e704ad7fd062070be48a1',
                ],
                [
                'label' => 'Instagram',
                'href' => 'https://instagram.com/qaabil.academy',
                'color' => '#e1306c',
                'icon' => 'https://cdn.simpleicons.org/instagram/e1306c',
                ],
                [
                'label' => 'Facebook',
                'href' => 'https://fb.com/qaabil.academy',
                'color' => '#1877f2',
                'icon' => 'https://cdn.simpleicons.org/facebook/1877f2',
                ],
                [
                'label' => 'TikTok',
                'href' => 'https://tiktok.com/@qaabil.academy',
                'color' => '#010101',
                'icon' => 'https://cdn.simpleicons.org/tiktok/010101',
                ],
                [
                'label' => 'YouTube',
                'href' => 'https://www.youtube.com/@qaabil.academy',
                'color' => '#ff0000',
                'icon' => 'https://cdn.simpleicons.org/youtube/ff0000',
                ],
                [
                'label' => 'Threads',
                'href' => 'https://www.threads.com/@qaabil.academy',
                'color' => '#000000',
                'icon' => 'https://cdn.simpleicons.org/threads/000000',
                ],
                ];
                ?>

                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <a href="<?php echo e($m['href']); ?>" class="contact-card fu d<?php echo e($i + 1); ?> flex items-center gap-4 bg-white border border-[#e2e8f0] rounded-2xl p-5 no-underline text-inherit transition-all duration-200 hover:-translate-y-0.5 hover:shadow-[0_12px_28px_-8px_rgba(27,58,107,.12)] hover:border-[rgba(27,58,107,.2)]">
                    <div class="contact-icon-wrap w-11 h-11 rounded-xl flex items-center justify-center shrink-0 duration-200" style="background:rgba(27,58,107,.07)">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#1b3a6b" stroke-width="1.8">
                            <?php echo $m['icon']; ?>

                        </svg>
                    </div>
                    <div class="min-w-0">
                        <p class="text-[.7rem] font-extrabold uppercase tracking-[.08em] text-[#94a3b8] mb-0.5">
                            <?php echo e($m['label']); ?>

                        </p>
                        <p class="text-sm font-bold text-[#0f172a] truncate"><?php echo e($m['value']); ?></p>
                        <p class="text-xs text-[#94a3b8] mt-0.5"><?php echo e($m['sub']); ?></p>
                    </div>
                    <svg class="w-4 h-4 text-[#e2e8f0] shrink-0 ml-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

                
                <div class="bg-white border border-[#e2e8f0] rounded-2xl p-5">
                    <p class="text-[.7rem] font-extrabold uppercase tracking-[.08em] text-[#94a3b8] mb-3">Follow us on
                    </p>
                    <div class="flex flex-wrap gap-3">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <a href="<?php echo e($s['href']); ?>" target="_blank" title="<?php echo e($s['label']); ?>" class="w-10 h-10 rounded-xl flex items-center justify-center transition-all duration-200 hover:-translate-y-0.5 hover:shadow-md" style="background:<?php echo e($s['color']); ?>1a;border:1px solid <?php echo e($s['color']); ?>33;">
                            <img src="<?php echo e($s['icon']); ?>" width="20" height="20" alt="<?php echo e($s['label']); ?>" />
                        </a>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>
                    <p class="text-xs text-[#94a3b8] mt-3">Stay connected with the Qaabil community</p>
                </div>

                <!-- response time note -->
                <div class="fu d4 bg-[#1b3a6b] rounded-2xl p-6 relative overflow-hidden">
                    <div class="absolute rounded-full pointer-events-none" style="width:180px;height:180px;background:radial-gradient(circle,rgba(245,158,11,.18) 0%,transparent 70%);bottom:-60px;right:-40px">
                    </div>
                    <div class="relative z-10">
                        <div class="text-[#f59e0b] text-2xl mb-3">✦</div>
                        <p class="text-sm font-bold text-white mb-1">Built by the community</p>
                        <p class="text-xs text-white/50 leading-relaxed">
                            Qaabil is a passion project. We're a small team backed by a big community. Your message
                            genuinely matters to us.
                        </p>
                    </div>
                </div>

            </div>

            <!-- ── Right: contact form ───────────────── -->
            <div class="lg:col-span-3 fu d2 bg-white border border-[#e2e8f0] rounded-3xl p-8 md:p-10">

                <div class="mb-8">
                    <div class="inline-flex items-center gap-2 text-[.7rem] font-extrabold uppercase tracking-widest text-[#1b3a6b] mb-2">
                        <span class="inline-block w-4 h-0.75 rounded-sm bg-[#f59e0b]"></span>
                        Send a message
                    </div>
                    <h2 class="text-[1.6rem] font-extrabold text-[#0f172a] tracking-tight leading-snug">
                        Drop us a <span class="font-['Instrument_Serif',serif] font-normal italic text-[#1b3a6b]">note</span>
                    </h2>
                </div>

                <form wire:submit="send" class="flex flex-col gap-5">

                    <!-- name + email row -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div class="float-wrap">
                            <input type="text" wire:model="name" id="name" placeholder=" " class="field w-full bg-[#f8fafd] border border-[#e2e8f0] rounded-xl px-4 py-3.5 text-sm text-[#0f172a] font-medium transition-all">
                            <label for="name" class="field-label">Your name</label>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <div class="float-wrap">
                            <input type="email" wire:model="email" id="email" placeholder=" " class="field w-full bg-[#f8fafd] border border-[#e2e8f0] rounded-xl px-4 py-3.5 text-sm text-[#0f172a] font-medium transition-all">
                            <label for="email" class="field-label">Email address</label>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>

                    <!-- phone row -->
                    <div>
                        <div class="flex w-full bg-[#f8fafd] border border-[#e2e8f0] rounded-xl overflow-hidden transition-all focus-within:border-[#1b3a6b] focus-within:ring-2 focus-within:ring-[#1b3a6b]/10">
                            <select wire:model="country_code" id="country_code" class="bg-[#f1f5f9] border-none text-sm text-[#0f172a] font-medium px-3 py-3.5 cursor-pointer focus:outline-none shrink-0" style="border-right:1px solid #e2e8f0;">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = \App\Enums\CountryCode::cases(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                <option value="<?php echo e($code->value); ?>" <?php echo e($code === \App\Enums\CountryCode::default() ? 'selected' : ''); ?>>
                                    <?php echo e($code->label()); ?>

                                </option>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            </select>
                            <input type="tel" wire:model="phone" id="phone" placeholder="e.g. 3314225652" class="flex-1 bg-transparent border-none px-4 py-3.5 text-sm text-[#0f172a] font-medium focus:outline-none placeholder:text-[#94a3b8]">
                        </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <!-- subject / type -->
                    <div>
                        <label class="block text-[.72rem] font-extrabold uppercase tracking-[.08em] text-[#94a3b8] mb-2">
                            What's this about?
                        </label>
                        <div class="flex flex-wrap gap-2">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ['General enquiry', 'Student support', 'Become a Moderator/Tutor', 'Institution / partnership', 'Bug report', 'Other']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <button type="button" wire:click="$set('topic', '<?php echo e($t); ?>')" class="text-[.78rem] font-semibold px-3.5 py-1.5 rounded-full border transition-all
                    <?php echo e($topic === $t
                        ? 'bg-[#1b3a6b] text-white border-[#1b3a6b]'
                        : 'border-[#e2e8f0] text-[#475569] bg-white hover:border-[#1b3a6b] hover:text-[#1b3a6b]'); ?>">
                                <?php echo e($t); ?>

                            </button>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </div>
                    </div>

                    <!-- message -->
                    <div class="float-wrap">
                        <textarea wire:model="message" id="message" rows="5" placeholder=" " class="field w-full bg-[#f8fafd] border border-[#e2e8f0] rounded-xl px-4 py-3.5 text-sm text-[#0f172a] font-medium transition-all resize-none"></textarea>
                        <label for="message" class="field-label">Your message</label>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <!-- submit -->
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$sent): ?>
                    <button type="submit" wire:loading.attr="disabled" class="w-full py-4 rounded-xl text-sm font-extrabold text-[#1b3a6b] bg-[#f59e0b] hover:bg-[#d97706] border-none cursor-pointer transition-colors flex items-center justify-center gap-2">
                        <span wire:loading.remove wire:target="send">Send message</span>
                        <svg wire:loading.remove wire:target="send" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                        <span wire:loading wire:target="send">Sending…</span>
                        <svg wire:loading wire:target="send" class="animate-spin" width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3" stroke-dasharray="32" stroke-dashoffset="12" opacity=".4" />
                            <path d="M12 2a10 10 0 0110 10" stroke="currentColor" stroke-width="3" stroke-linecap="round" />
                        </svg>
                    </button>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <!-- success state -->
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($sent): ?>
                    <div class="text-center py-4">
                        <div class="text-3xl mb-2">✅</div>
                        <p class="text-sm font-bold text-[#0f172a]">Message sent!</p>
                        <p class="text-xs text-[#94a3b8] mt-1">We'll get back to you within 24 hours.</p>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                </form>
            </div>

        </div>

    </main>

</div><?php /**PATH /var/www/html/storage/framework/views/livewire/views/778c02f5.blade.php ENDPATH**/ ?>