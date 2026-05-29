<div>
    <?php
        $sections = $course->sections_count;
        // if ($sections <= 3) {
        //     $levelLabel = 'Beginner';
        //     $levelColor = 'bg-[#ecfdf5] text-[#059669] border-[rgba(5,150,105,.15)]';
        //     $dot = '#10b981';
        // } elseif ($sections <= 7) {
        $levelLabel = 'Intermediate';
        $levelColor = 'bg-[#fffbeb] text-[#b45309] border-[rgba(180,83,9,.15)]';
        $dot = '#f59e0b';
        // } else {
        // $levelLabel = 'Advanced';
        // $levelColor = 'bg-[#fef2f2] text-[#dc2626] border-[rgba(220,38,38,.15)]';
        // $dot = '#ef4444';
        // }
    ?>
    
    <a wire:navigate href="<?php echo e(route('courses.view', $course)); ?>" <?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::$currentLoop['key'] = 'course-'.e($course->id).''; ?>wire:key="course-<?php echo e($course->id); ?>"
        class="card group fade-up d<?php echo e(($i % 5) + 1); ?> min-h-80 flex flex-col bg-white border border-[#e2e8f0] rounded-[20px] overflow-hidden no-underline transition-all duration-[.22s] ease hover:-translate-y-1 hover:shadow-[0_20px_40px_-12px_rgba(27,58,107,.13)] hover:border-[rgba(27,58,107,.22)]">

        <div class="h-[5px] bg-[#1b3a6b] shrink-0" style="view-transition-name: course-bar-<?php echo e($course->id); ?>;">
        </div>

        <div class="p-6 flex flex-col flex-1">
            <div class="flex items-center justify-between mb-4">
                <span
                    class="pill inline-flex items-center gap-1.5 text-[.68rem] font-extrabold uppercase tracking-[.07em] px-3 py-[.25rem] rounded-md border transition-colors <?php echo e($levelColor); ?>">
                    <span class="w-[5px] h-[5px] rounded-full shrink-0" style="background:<?php echo e($dot); ?>"></span>
                    
                    <?php echo e($course->sections_count); ?>

                    <?php echo e(Str::plural('section', $course->sections_count)); ?>

                </span>
                <span class="font-['Instrument_Serif',serif] italic text-xs text-[#94a3b8]">
                    <?php echo e($course->updated_at->diffForHumans()); ?>

                </span>
            </div>

            <h3 class="mb-2 text-[1.3rem] font-extrabold text-[#0f172a] leading-snug tracking-tight transition-transform duration-300 group-hover:translate-x-0.5"
                style="view-transition-name: course-title-<?php echo e($course->id); ?>;">
                <?php echo e($course->name); ?>

                <span class="text-[#f59e0b] opacity-0 group-hover:opacity-100 transition-opacity ml-1">✦</span>
            </h3>

            <p class="text-sm leading-relaxed mb-5 flex-1 text-[#475569]">
                <?php echo e($course->description); ?>

            </p>

            <div class="flex items-center justify-between pt-4 border-t border-[#e2e8f0]">
                <span class="text-xs flex items-center gap-1.5 text-[#94a3b8]">
                    📚 <?php echo e($course->chapters_count); ?>

                    <?php echo e(Str::plural('chapter', $course->chapters_count)); ?>

                </span>
                <span class="underline-amber text-sm font-bold text-[#1b3a6b]">
                    🔥 <?php echo e($course->videos_count ?? 0); ?>

                    <?php echo e(Str::plural('video', $course->videos_count ?? 0)); ?>

                </span>
            </div>
        </div>
    </a>
</div><?php /**PATH /var/www/html/storage/framework/views/livewire/views/27319012.blade.php ENDPATH**/ ?>