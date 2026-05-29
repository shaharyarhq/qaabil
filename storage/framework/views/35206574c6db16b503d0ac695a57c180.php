<div x-cloak x-show="$store.isLoading.value" class="global-loading-indicator" style="bottom: 0 !important;">
    <div class="flex gap-2" style="
             display: flex;
    gap: 6px;">
        <div class="text-sm hidden sm:block">
            Processing
        </div>
        <?php if (isset($component)) { $__componentOriginalbef7c2371a870b1887ec3741fe311a10 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbef7c2371a870b1887ec3741fe311a10 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.loading-indicator','data' => ['class' => 'h-5 w-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament::loading-indicator'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-5 w-5']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbef7c2371a870b1887ec3741fe311a10)): ?>
<?php $attributes = $__attributesOriginalbef7c2371a870b1887ec3741fe311a10; ?>
<?php unset($__attributesOriginalbef7c2371a870b1887ec3741fe311a10); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbef7c2371a870b1887ec3741fe311a10)): ?>
<?php $component = $__componentOriginalbef7c2371a870b1887ec3741fe311a10; ?>
<?php unset($__componentOriginalbef7c2371a870b1887ec3741fe311a10); ?>
<?php endif; ?>
    </div>
    <script type="module">
        document.addEventListener('alpine:init', () => Alpine.store('isLoading', {
            value: false,
            delayTimer: null,
            set(value) {
                clearTimeout(this.delayTimer);
                if (value === false) this.value = false;
                else this.delayTimer = setTimeout(() => this.value = true, 0);
            }
        }))
        document.addEventListener("livewire:init", () => {
            Livewire.hook('commit.prepare', () => Alpine.store('isLoading').set(true))
            Livewire.hook('commit', ({
                succeed
            }) => succeed(() => queueMicrotask(() => Alpine.store('isLoading').set(false))))
        })
    </script>
</div>

<?php /**PATH /var/www/html/resources/views/partials/global-loading-indicator.blade.php ENDPATH**/ ?>