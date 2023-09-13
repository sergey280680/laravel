<div class="border-bottom pb-3 mb-4">
    @isset($link)
        <div class="mb-3">
            {{ $link }}
        </div>
    @endisset

    <h1 class="h2 mb-0">
        {{ $slot }}
    </h1>
</div>
