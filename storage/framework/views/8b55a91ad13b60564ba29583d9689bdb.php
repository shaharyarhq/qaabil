<div>

    <!-- ── Hero Slider ───────────────────────────────────── -->
    <?php
        $heroSlides = [
            [
                'image' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=1600',
                'alt' => 'Students collaborating',
                'title' => 'Learn anything, together.',
                'sub' => 'Submit a video, unlock all courses for 30 days.',
                'cta' => ['label' => 'Get Started', 'href' => '#'],
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?w=1600',
                'alt' => 'Workspace',
                'title' => '10K+ Active Learners',
                'sub' => 'Join a community of knowledge sharers worldwide.',
                'cta' => ['label' => 'Browse Courses', 'href' => '#'],
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1531482615713-2afd69097998?w=1600',
                'alt' => 'Online learning',
                'title' => 'Peer Reviewed Content',
                'sub' => 'Quality content validated by top contributors.',
                'cta' => ['label' => 'Learn More', 'href' => '#'],
            ],
        ];
    ?>

    <div class="hero-slider relative overflow-hidden">
        <div class="swiper heroSwiper">
            <div class="swiper-wrapper">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $heroSlides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <div class="swiper-slide">
                        <div class="relative h-125 md:h-150 lg:h-175">
                            <img src="<?php echo e($slide['image']); ?>" alt="<?php echo e($slide['alt']); ?>"
                                class="absolute inset-0 w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-r from-[#1b3a6b]/90 to-transparent"></div>
                            <div class="relative z-10 h-full flex items-center">
                                <div class="max-w-7xl mx-auto px-8 w-full">
                                    <div class="max-w-lg">
                                        <h2 class="text-white text-4xl md:text-5xl lg:text-6xl font-bold mb-4">
                                            <?php echo e($slide['title']); ?>

                                        </h2>
                                        <p class="text-white/70 text-lg mb-8">
                                            <?php echo e($slide['sub']); ?>

                                        </p>
                                        <a href="<?php echo e($slide['cta']['href']); ?>"
                                            class="inline-flex items-center bg-[#f59e0b] hover:bg-[#d97706] text-[#1b3a6b] font-semibold rounded-lg px-8 py-3.5 transition-all">
                                            <?php echo e($slide['cta']['label']); ?>

                                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>

            
            <button
                class="hero-prev absolute left-5 top-1/2 -translate-y-1/2 z-20 w-12 h-12 rounded-full bg-white/10 hover:bg-white/20 backdrop-blur-sm flex items-center justify-center transition-all border border-white/20">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button
                class="hero-next absolute right-5 top-1/2 -translate-y-1/2 z-20 w-12 h-12 rounded-full bg-white/10 hover:bg-white/20 backdrop-blur-sm flex items-center justify-center transition-all border border-white/20">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>

            
            <div class="hero-pagination absolute bottom-8 left-1/2 -translate-x-1/2 z-20 flex gap-3"></div>
        </div>
    </div>

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

        <?php
        $__scriptKey = '2160923857-0';
        ob_start();
    ?>
        <script>
            new Swiper('.heroSwiper', {
                loop: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
                speed: 800,
                navigation: {
                    nextEl: '.hero-next',
                    prevEl: '.hero-prev',
                },
                pagination: {
                    el: '.hero-pagination',
                    clickable: true,
                    renderBullet: function(index, className) {
                        return '<span class="' + className +
                            ' w-3 h-3 rounded-full cursor-pointer transition-all duration-300" style="background:rgba(255,255,255,.3)"></span>';
                    },
                },
                on: {
                    init: function() {
                        document.querySelectorAll('.hero-pagination .swiper-pagination-bullet').forEach(bullet => {
                            bullet.addEventListener('mouseenter', () => {
                                if (!bullet.classList.contains('swiper-pagination-bullet-active')) {
                                    bullet.style.background = 'rgba(245,158,11,.5)';
                                }
                            });
                            bullet.addEventListener('mouseleave', () => {
                                if (!bullet.classList.contains('swiper-pagination-bullet-active')) {
                                    bullet.style.background = 'rgba(255,255,255,.3)';
                                }
                            });
                        });
                    }
                }
            });

            const observer = new MutationObserver(() => {
                document.querySelectorAll('.hero-pagination .swiper-pagination-bullet').forEach(bullet => {
                    if (bullet.classList.contains('swiper-pagination-bullet-active')) {
                        bullet.style.background = '#f59e0b';
                        bullet.style.width = '28px';
                        bullet.style.borderRadius = '999px';
                    } else {
                        bullet.style.background = 'rgba(255,255,255,.3)';
                        bullet.style.width = '12px';
                        bullet.style.borderRadius = '50%';
                    }
                });
            });

            observer.observe(document.querySelector('.hero-pagination'), {
                childList: true,
                subtree: true,
                attributes: true,
                attributeFilter: ['class']
            });
        </script>
        <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?>

    <style>
        .hero-slider .swiper-slide {
            opacity: 0 !important;
            transition: opacity 0.8s ease;
        }

        .hero-slider .swiper-slide-active {
            opacity: 1 !important;
        }
    </style>

    

    <!-- ── Courses ─────────────────────────────────── -->
    <main class="max-w-7xl mx-auto px-6 py-14 pb-28">

        <!-- section header -->
        <div class="flex items-end justify-between mb-10">
            <div>
                <div
                    class="inline-flex items-center gap-2 text-[.72rem] font-extrabold uppercase tracking-[.1em] text-[#1b3a6b] mb-2">
                    <span class="inline-block w-[18px] h-[3px] rounded-sm bg-[#f59e0b]"></span>
                    All Courses
                </div>
                <h2 class="text-[2rem] font-extrabold text-[#0f172a] tracking-tight leading-snug">
                    Start learning
                    <span class="font-['Instrument_Serif',serif] font-normal italic text-[#1b3a6b]"
                        style="font-size:1.1em">today</span>
                </h2>
            </div>
        </div>

        <?php
            $bands = ['band-1', 'band-2', 'band-3', 'band-4', 'band-5'];
            $courses = $courses->values();
        ?>


        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 auto-rows-fr">

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('courses.course-card', ['course' => $course,'i' => $i]);

$__keyOuter = $__key ?? null;

$__key = $course->id;
$__componentSlots = [];

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-2160923857-0', $__key);

$__html = app('livewire')->mount($__name, $__params, $__key, $__componentSlots);

echo $__html;

unset($__html);
unset($__key);
$__key = $__keyOuter;
unset($__keyOuter);
unset($__name);
unset($__params);
unset($__componentSlots);
unset($__split);
?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

            

        </div>


        
        <div class="manifesto relative mt-16 bg-[#1b3a6b] rounded-3xl overflow-hidden px-8 md:px-16 py-14 text-center">
            <div class="relative z-10">
                <p class="font-['Instrument_Serif',serif] italic text-white leading-[1.4] max-w-[640px] mx-auto"
                    style="font-size:clamp(1.6rem,3vw,2.25rem)">
                    "Upload an approved video
                    <span class="text-[#f59e0b]"> ✦ </span>
                    unlock any chapter"
                </p>
                <div class="w-12 h-[2px] rounded mx-auto my-5" style="background:rgba(245,158,11,.4)"></div>
                <p class="text-[.85rem] text-white/45 max-w-[520px] mx-auto leading-[1.75]">
                    Every course contains chapters with clear objectives. Students submit video solutions.
                    Maintainers review and accept. One approved video unlocks the rest —
                    crowdsourced, peer-validated, forever free.
                </p>
            </div>
        </div>

    </main>

</div><?php /**PATH /var/www/html/storage/framework/views/livewire/views/d2ea49b4.blade.php ENDPATH**/ ?>