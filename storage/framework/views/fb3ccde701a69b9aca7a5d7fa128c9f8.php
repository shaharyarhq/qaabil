<div x-data="{
        closeAndReload() {
            // Close the modal using Livewire
            window.Livewire.find('<?php echo e($_instance->getId()); ?>').set('open', false);
        }
     }"
     x-on:reload-page.window="closeAndReload()"
     x-on:reset-theme-to-default.window="
        // Reset theme to system default
        localStorage.removeItem('theme');
        // Dispatch theme-changed event to update the UI
        window.dispatchEvent(new CustomEvent('theme-changed', { detail: 'system' }));
     ">

    
    <button
        wire:click="toggle"
        class="flex items-center gap-2 <?php echo e($layout === 'sidebar-no-topbar' ? 'justify-start w-full px-3 py-2' : 'justify-center w-9 h-9'); ?> rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors"
        type="button"
        aria-label="<?php echo e(__('filament-ui-switcher::filament-ui-switcher.button.aria_label')); ?>"
    >
        <?php if (isset($component)) { $__componentOriginalbfc641e0710ce04e5fe02876ffc6f950 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbfc641e0710ce04e5fe02876ffc6f950 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.icon','data' => ['icon' => ''.e($this->icon).'','class' => 'h-5 w-5 '.e($layout === 'sidebar-no-topbar' ? 'shrink-0' : '').'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => ''.e($this->icon).'','class' => 'h-5 w-5 '.e($layout === 'sidebar-no-topbar' ? 'shrink-0' : '').'']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbfc641e0710ce04e5fe02876ffc6f950)): ?>
<?php $attributes = $__attributesOriginalbfc641e0710ce04e5fe02876ffc6f950; ?>
<?php unset($__attributesOriginalbfc641e0710ce04e5fe02876ffc6f950); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbfc641e0710ce04e5fe02876ffc6f950)): ?>
<?php $component = $__componentOriginalbfc641e0710ce04e5fe02876ffc6f950; ?>
<?php unset($__componentOriginalbfc641e0710ce04e5fe02876ffc6f950); ?>
<?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($layout === 'sidebar-no-topbar'): ?>
            <span class="text-sm font-medium text-gray-700 dark:text-gray-300">
                <?php echo e(__('filament-ui-switcher::filament-ui-switcher.modal.heading')); ?>

            </span>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </button>

    
    <?php if (isset($component)) { $__componentOriginal0942a211c37469064369f887ae8d1cef = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0942a211c37469064369f887ae8d1cef = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.modal.index','data' => ['id' => 'ui-switcher-modal','slideOver' => true,'closeButton' => true,'width' => 'md','visible' => $open,'xOn:closeModal.window' => 'if ($event.detail.id === \'ui-switcher-modal\') { $wire.set(\'open\', false) }','xOn:modalClosed.window' => 'if ($event.detail.id === \'ui-switcher-modal\') { $wire.set(\'open\', false) }']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament::modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'ui-switcher-modal','slide-over' => true,'close-button' => true,'width' => 'md','visible' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($open),'x-on:close-modal.window' => 'if ($event.detail.id === \'ui-switcher-modal\') { $wire.set(\'open\', false) }','x-on:modal-closed.window' => 'if ($event.detail.id === \'ui-switcher-modal\') { $wire.set(\'open\', false) }']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

         <?php $__env->slot('header', null, []); ?> 
            
            <button
                wire:click="resetToDefaults"
                wire:loading.class="opacity-50 cursor-wait"
                wire:target="resetToDefaults"
                type="button"
                class="fi-icon-btn absolute end-[4.5rem] top-6 flex items-center justify-center text-gray-400 hover:text-gray-500 focus:outline-none dark:text-gray-500 dark:hover:text-gray-400 transition"
                x-tooltip="{
                    content: '<?php echo e(__('filament-ui-switcher::filament-ui-switcher.reset.button')); ?>',
                    theme: $store.theme,
                }"
                aria-label="<?php echo e(__('filament-ui-switcher::filament-ui-switcher.reset.aria_label')); ?>"
            >
                <?php if (isset($component)) { $__componentOriginalbfc641e0710ce04e5fe02876ffc6f950 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbfc641e0710ce04e5fe02876ffc6f950 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.icon','data' => ['icon' => 'heroicon-o-arrow-path','class' => 'h-5 w-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'heroicon-o-arrow-path','class' => 'h-5 w-5']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbfc641e0710ce04e5fe02876ffc6f950)): ?>
<?php $attributes = $__attributesOriginalbfc641e0710ce04e5fe02876ffc6f950; ?>
<?php unset($__attributesOriginalbfc641e0710ce04e5fe02876ffc6f950); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbfc641e0710ce04e5fe02876ffc6f950)): ?>
<?php $component = $__componentOriginalbfc641e0710ce04e5fe02876ffc6f950; ?>
<?php unset($__componentOriginalbfc641e0710ce04e5fe02876ffc6f950); ?>
<?php endif; ?>
            </button>

            
            <div class="flex items-center gap-2">
                <?php if (isset($component)) { $__componentOriginalbfc641e0710ce04e5fe02876ffc6f950 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbfc641e0710ce04e5fe02876ffc6f950 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.icon','data' => ['icon' => ''.e($this->icon).'','class' => 'h-6 w-6']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => ''.e($this->icon).'','class' => 'h-6 w-6']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbfc641e0710ce04e5fe02876ffc6f950)): ?>
<?php $attributes = $__attributesOriginalbfc641e0710ce04e5fe02876ffc6f950; ?>
<?php unset($__attributesOriginalbfc641e0710ce04e5fe02876ffc6f950); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbfc641e0710ce04e5fe02876ffc6f950)): ?>
<?php $component = $__componentOriginalbfc641e0710ce04e5fe02876ffc6f950; ?>
<?php unset($__componentOriginalbfc641e0710ce04e5fe02876ffc6f950); ?>
<?php endif; ?>
                <h2 class="fi-modal-heading">
                    <?php echo e(__('filament-ui-switcher::filament-ui-switcher.modal.heading')); ?>

                </h2>
            </div>
         <?php $__env->endSlot(); ?>

        
        <div wire:loading.delay.shortest
             wire:target="setFont,setLayout,setColor,setFontSize,setDensity,resetToDefaults"
             class="bg-primary-500 text-white px-4 py-3 rounded-lg mb-4 flex items-center gap-2">
            <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span class="font-medium"><?php echo e(__('filament-ui-switcher::filament-ui-switcher.loading.message')); ?></span>
        </div>

        <div class="space-y-8 py-4">
            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hasModeSwitcher): ?>
                <div>
                    <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                        <span class="flex items-center gap-2">
                            <?php if (isset($component)) { $__componentOriginalbfc641e0710ce04e5fe02876ffc6f950 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbfc641e0710ce04e5fe02876ffc6f950 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.icon','data' => ['icon' => 'heroicon-o-computer-desktop','class' => 'h-4 w-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'heroicon-o-computer-desktop','class' => 'h-4 w-4']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbfc641e0710ce04e5fe02876ffc6f950)): ?>
<?php $attributes = $__attributesOriginalbfc641e0710ce04e5fe02876ffc6f950; ?>
<?php unset($__attributesOriginalbfc641e0710ce04e5fe02876ffc6f950); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbfc641e0710ce04e5fe02876ffc6f950)): ?>
<?php $component = $__componentOriginalbfc641e0710ce04e5fe02876ffc6f950; ?>
<?php unset($__componentOriginalbfc641e0710ce04e5fe02876ffc6f950); ?>
<?php endif; ?>
                            <?php echo e(__('filament-ui-switcher::filament-ui-switcher.mode.heading')); ?>

                        </span>
                    </h3>
                    <div class="mt-3">
                        <?php if (isset($component)) { $__componentOriginal388e1416f496c833c11c2ba7d86d1f07 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal388e1416f496c833c11c2ba7d86d1f07 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-panels::components.theme-switcher.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament-panels::theme-switcher'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal388e1416f496c833c11c2ba7d86d1f07)): ?>
<?php $attributes = $__attributesOriginal388e1416f496c833c11c2ba7d86d1f07; ?>
<?php unset($__attributesOriginal388e1416f496c833c11c2ba7d86d1f07); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal388e1416f496c833c11c2ba7d86d1f07)): ?>
<?php $component = $__componentOriginal388e1416f496c833c11c2ba7d86d1f07; ?>
<?php unset($__componentOriginal388e1416f496c833c11c2ba7d86d1f07); ?>
<?php endif; ?>
                    </div>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            
            <div>
                <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                    <span class="flex items-center gap-2">
                        <?php if (isset($component)) { $__componentOriginalbfc641e0710ce04e5fe02876ffc6f950 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbfc641e0710ce04e5fe02876ffc6f950 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.icon','data' => ['icon' => 'heroicon-o-squares-2x2','class' => 'h-4 w-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'heroicon-o-squares-2x2','class' => 'h-4 w-4']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbfc641e0710ce04e5fe02876ffc6f950)): ?>
<?php $attributes = $__attributesOriginalbfc641e0710ce04e5fe02876ffc6f950; ?>
<?php unset($__attributesOriginalbfc641e0710ce04e5fe02876ffc6f950); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbfc641e0710ce04e5fe02876ffc6f950)): ?>
<?php $component = $__componentOriginalbfc641e0710ce04e5fe02876ffc6f950; ?>
<?php unset($__componentOriginalbfc641e0710ce04e5fe02876ffc6f950); ?>
<?php endif; ?>
                        <?php echo e(__('filament-ui-switcher::filament-ui-switcher.layout.heading')); ?>

                    </span>
                </h3>
                <div class="grid grid-cols-2 gap-3">
                    <button
                        wire:click="setLayout('sidebar')"
                        wire:loading.class="opacity-50 cursor-wait"
                        wire:target="setLayout"
                        type="button"
                        class="relative flex flex-col items-center justify-center p-4 rounded-lg border-2 transition-all hover:border-primary-400 hover:shadow-md <?php echo e($layout === 'sidebar' ? 'border-primary-500 bg-primary-50 dark:bg-primary-900/20 ring-2 ring-primary-200 dark:ring-primary-800' : 'border-gray-200 dark:border-gray-700'); ?>">
                        <div class="flex flex-col gap-0.5 mb-2">
                            <div class="w-14 h-1 rounded bg-gray-400 dark:bg-gray-500"></div>
                            <div class="flex gap-0.5">
                                <div class="w-3.5 h-7 rounded bg-gray-400 dark:bg-gray-500"></div>
                                <div class="w-10 h-7 rounded bg-gray-300 dark:bg-gray-600"></div>
                            </div>
                        </div>
                        <span class="text-xs font-medium"><?php echo e(__('filament-ui-switcher::filament-ui-switcher.layout.sidebar')); ?></span>
                    </button>

                    <button
                        wire:click="setLayout('sidebar-collapsed')"
                        type="button"
                        class="relative flex flex-col items-center justify-center p-4 rounded-lg border-2 transition-all hover:border-primary-400 <?php echo e($layout === 'sidebar-collapsed' ? 'border-primary-500 bg-primary-50 dark:bg-primary-900/20' : 'border-gray-200 dark:border-gray-700'); ?>">
                        <div class="flex flex-col gap-0.5 mb-2">
                            <div class="w-14 h-1 rounded bg-gray-400 dark:bg-gray-500"></div>
                            <div class="flex gap-0.5">
                                <div class="w-1.5 h-7 rounded bg-gray-400 dark:bg-gray-500"></div>
                                <div class="w-12 h-7 rounded bg-gray-300 dark:bg-gray-600"></div>
                            </div>
                        </div>
                        <span class="text-xs font-medium"><?php echo e(__('filament-ui-switcher::filament-ui-switcher.layout.compact')); ?></span>
                    </button>

                    <button
                        wire:click="setLayout('sidebar-no-topbar')"
                        type="button"
                        class="relative flex flex-col items-center justify-center p-4 rounded-lg border-2 transition-all hover:border-primary-400 <?php echo e($layout === 'sidebar-no-topbar' ? 'border-primary-500 bg-primary-50 dark:bg-primary-900/20' : 'border-gray-200 dark:border-gray-700'); ?>">
                        <div class="flex gap-0.5 mb-2">
                            <div class="w-3.5 h-8 rounded bg-gray-400 dark:bg-gray-500"></div>
                            <div class="w-10 h-8 rounded bg-gray-300 dark:bg-gray-600"></div>
                        </div>
                        <span class="text-xs font-medium text-center leading-tight"><?php echo e(__('filament-ui-switcher::filament-ui-switcher.layout.no_topbar')); ?></span>
                    </button>

                    <button
                        wire:click="setLayout('topbar')"
                        type="button"
                        class="relative flex flex-col items-center justify-center p-4 rounded-lg border-2 transition-all hover:border-primary-400 <?php echo e($layout === 'topbar' ? 'border-primary-500 bg-primary-50 dark:bg-primary-900/20' : 'border-gray-200 dark:border-gray-700'); ?>">
                        <div class="flex flex-col gap-0.5 mb-2">
                            <div class="w-14 h-1.5 rounded bg-gray-400 dark:bg-gray-500"></div>
                            <div class="w-14 h-6.5 rounded bg-gray-300 dark:bg-gray-600"></div>
                        </div>
                        <span class="text-xs font-medium"><?php echo e(__('filament-ui-switcher::filament-ui-switcher.layout.topbar')); ?></span>
                    </button>
                </div>
            </div>

            
            <div>
                <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                    <span class="flex items-center gap-2">
                        <?php if (isset($component)) { $__componentOriginalbfc641e0710ce04e5fe02876ffc6f950 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbfc641e0710ce04e5fe02876ffc6f950 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.icon','data' => ['icon' => 'heroicon-o-swatch','class' => 'h-4 w-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'heroicon-o-swatch','class' => 'h-4 w-4']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbfc641e0710ce04e5fe02876ffc6f950)): ?>
<?php $attributes = $__attributesOriginalbfc641e0710ce04e5fe02876ffc6f950; ?>
<?php unset($__attributesOriginalbfc641e0710ce04e5fe02876ffc6f950); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbfc641e0710ce04e5fe02876ffc6f950)): ?>
<?php $component = $__componentOriginalbfc641e0710ce04e5fe02876ffc6f950; ?>
<?php unset($__componentOriginalbfc641e0710ce04e5fe02876ffc6f950); ?>
<?php endif; ?>
                        <?php echo e(__('filament-ui-switcher::filament-ui-switcher.color.heading')); ?>

                    </span>
                </h3>

                <div>
                    <div class="flex flex-wrap gap-2">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $this->customColors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <button
                                wire:click="setColor('<?php echo e($color); ?>')"
                                wire:loading.class="opacity-50"
                                wire:target="setColor"
                                type="button"
                                class="relative w-10 h-10 rounded-lg transition-all hover:scale-110 <?php echo e($primaryColor === $color ? 'border-gray-900 dark:border-gray-100 shadow-lg ring-2 ring-offset-2 ring-gray-400' : 'border-transparent'); ?>"
                                style="background-color: <?php echo e($color); ?>">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($primaryColor === $color): ?>
                                    <svg class="absolute inset-0 m-auto w-6 h-6 text-white drop-shadow-lg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                    </svg>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </button>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>
                </div>
            </div>

            
            <div>
                <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                    <span class="flex items-center gap-2">
                        <?php if (isset($component)) { $__componentOriginalbfc641e0710ce04e5fe02876ffc6f950 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbfc641e0710ce04e5fe02876ffc6f950 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.icon','data' => ['icon' => 'heroicon-o-bars-3-bottom-left','class' => 'h-4 w-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'heroicon-o-bars-3-bottom-left','class' => 'h-4 w-4']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbfc641e0710ce04e5fe02876ffc6f950)): ?>
<?php $attributes = $__attributesOriginalbfc641e0710ce04e5fe02876ffc6f950; ?>
<?php unset($__attributesOriginalbfc641e0710ce04e5fe02876ffc6f950); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbfc641e0710ce04e5fe02876ffc6f950)): ?>
<?php $component = $__componentOriginalbfc641e0710ce04e5fe02876ffc6f950; ?>
<?php unset($__componentOriginalbfc641e0710ce04e5fe02876ffc6f950); ?>
<?php endif; ?>
                        <?php echo e(__('filament-ui-switcher::filament-ui-switcher.font.heading')); ?>

                    </span>
                </h3>
                <p class="text-xs text-gray-600 dark:text-gray-400 mb-3"><?php echo e(__('filament-ui-switcher::filament-ui-switcher.font.family')); ?></p>
                <div class="grid grid-cols-2 gap-2">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $this->availableFonts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fontOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <button
                            wire:click="setFont('<?php echo e($fontOption); ?>')"
                            wire:loading.class="opacity-50"
                            wire:target="setFont"
                            type="button"
                            class="relative flex flex-col items-center justify-center p-3 rounded-lg border-2 transition-all hover:border-primary-400 hover:shadow-md <?php echo e($font === $fontOption ? 'border-primary-500 bg-primary-50 dark:bg-primary-900/20 ring-2 ring-primary-200 dark:ring-primary-800' : 'border-gray-200 dark:border-gray-700'); ?>"
                            style="font-family: '<?php echo e($fontOption); ?>', sans-serif">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($font === $fontOption): ?>
                                <svg class="absolute top-1 right-1 w-5 h-5 text-primary-600 dark:text-primary-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                                </svg>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <span class="text-2xl font-medium mb-1">Aa</span>
                            <span class="text-xs"><?php echo e($fontOption); ?></span>
                        </button>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>
            </div>

            
            <div x-data="{
                fontSize: <?php echo e($fontSize); ?>,
                min: <?php echo e($this->fontSizeRange['min']); ?>,
                max: <?php echo e($this->fontSizeRange['max']); ?>,
                getGradient() {
                    const percent = ((this.fontSize - this.min) / (this.max - this.min)) * 100;
                    const isDark = document.documentElement.classList.contains('dark');
                    const direction = document.documentElement.getAttribute('dir') === 'rtl' ? 'to left' : 'to right';
                    if (isDark) {
                        return `linear-gradient(${direction}, rgba(167, 139, 250, 0.3) 0%, rgba(139, 92, 246, 0.7) ${percent / 2}%, rgb(139, 92, 246) ${percent}%, #374151 ${percent}%, #374151 100%)`;
                    } else {
                        return `linear-gradient(${direction}, rgba(139, 92, 246, 0.3) 0%, rgba(139, 92, 246, 0.6) ${percent / 2}%, rgb(124, 58, 237) ${percent}%, #e5e7eb ${percent}%, #e5e7eb 100%)`;
                    }
                }
            }">
                <div class="flex items-center justify-between mb-3">
                    <p class="text-xs text-gray-600 dark:text-gray-400"><?php echo e(__('filament-ui-switcher::filament-ui-switcher.font.size')); ?></p>
                    <span class="px-2 py-1 text-xs font-medium bg-gray-100 dark:bg-gray-800 rounded" x-text="fontSize + 'px'"></span>
                </div>
                <div wire:ignore>
                    <input
                        type="range"
                        :min="min"
                        :max="max"
                        step="1"
                        x-model="fontSize"
                        @change="$wire.setFontSize(fontSize)"
                        :style="{ background: getGradient() }"
                        class="ui-switcher-slider w-full">
                </div>
            </div>
        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0942a211c37469064369f887ae8d1cef)): ?>
<?php $attributes = $__attributesOriginal0942a211c37469064369f887ae8d1cef; ?>
<?php unset($__attributesOriginal0942a211c37469064369f887ae8d1cef); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0942a211c37469064369f887ae8d1cef)): ?>
<?php $component = $__componentOriginal0942a211c37469064369f887ae8d1cef; ?>
<?php unset($__componentOriginal0942a211c37469064369f887ae8d1cef); ?>
<?php endif; ?>
</div>
<?php /**PATH /var/www/html/vendor/andreia/filament-ui-switcher/resources/views/livewire/ui-switcher.blade.php ENDPATH**/ ?>