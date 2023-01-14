<div x-data="{show: true}"
    x-init="setTimeout(() => show = false, 3000)"
    x-show="show"
    class="{{ $class }}"
    >
    <p>{{ $slot }}</p>  
</div>