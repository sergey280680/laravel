@foreach($statistics as $stats)
    <h6>
        {{ __('Статистика для :currency', ['currency' => $stats->currency_id]) }}
    </h6>

    <div class="row mb-3">
        <div class="col-12 col-md-4">
            <x-card>
                <x-card-body>
                    <div class="mb-2 text-muted small">
                        Количество донатов
                    </div>

                    <h5 class="m-0">{{ $stats['total_count'] }}</h5>
                </x-card-body>
            </x-card>
        </div>
        <div class="col-12 col-md-4">
            <x-card>
                <x-card-body>
                    <div class="mb-2 text-muted small">
                        Общая сумма
                    </div>

                    <h5 class="m-0">{{ __money( $stats->total_amount, $stats->currency_id ) }}</h5>
                </x-card-body>
            </x-card>
        </div>
        <div class="col-12 col-md-4">
            <x-card>
                <x-card-body>
                    <div class="mb-2 text-muted small">
                        Средняя сумма
                    </div>

                    <h5 class="m-0">{{ $stats['avg_amount'] }}</h5>
                </x-card-body>
            </x-card>
        </div>
        <div class="col-12 col-md-4">
            <x-card>
                <x-card-body>
                    <div class="mb-2 text-muted small">
                        Мин. сумма
                    </div>

                    <h5 class="m-0">{{ $stats['min_amount'] }}</h5>
                </x-card-body>
            </x-card>
        </div>
        <div class="col-12 col-md-4">
            <x-card>
                <x-card-body>
                    <div class="mb-2 text-muted small">
                        Макс.Сумма
                    </div>

                    <h5 class="m-0">{{ $stats['max_amount'] }}</h5>
                </x-card-body>
            </x-card>
        </div>
    </div>

@endforeach
