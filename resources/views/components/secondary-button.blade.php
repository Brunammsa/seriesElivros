<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 btn btn-outline-warning transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
