<div>
    <form wire:submit.prevent="store">
        @csrf
        <div class="row">
            <div class="mb-3 col-md-8">
                <label for="client_id" class="form-label">ناوی مقاول</label>
                <select class="form-select " wire:model.live="client_id" id="client_id">
                    <option value="">مقاولێک هەڵبژێرە</option>
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                    @endforeach
                </select>
                @error('client_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        @foreach ($inputs as $index)
            <div class="row align-items-center" wire:ignore>
                <div class="mb-3 col-md-3">
                    @if ($index == 0)
                        <label class="form-label">خواردن</label>
                    @endif
                    <select class="form-select js-example-basic-single" wire:model.live="food_ids.{{ $index }}">
                        <option value="">خواردنێک هەڵبژێرە</option>
                        @foreach ($foods as $food)
                            <option value="{{ $food->id }}">{{ $food->name }}</option>
                        @endforeach
                    </select>
                    @error('food_ids.' . $index)
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3 col-md-2">
                    @if ($index == 0)
                        <label class="form-label">بڕ</label>
                    @endif
                    <input class="form-control" type="number" placeholder="بڕ"
                        wire:model.live="quantities.{{ $index }}" min="1">
                    @error('quantities.' . $index)
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3 col-md-2">
                    @if ($index == 0)
                        <label class="form-label">نرخ</label>
                    @endif
                    <input class="form-control" type="number" placeholder="نرخ"
                        wire:model.live="prices.{{ $index }}">
                    @error('prices.' . $index)
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3 col-md-3">
                    @if (!empty($food_ids[$index]) && $foods->firstWhere('id', $food_ids[$index]))
                        @php $food = $foods->firstWhere('id', $food_ids[$index]); @endphp
                        <img src="{{ $food->getFirstMediaUrl('image') }}" alt="{{ $food->name }}"
                            style="width: 50px; height: 50px; object-fit: cover;">
                    @endif
                </div>

                <div class="mb-3 col-md-2">
                    @if ($index == 0)
                        <label class="form-label d-block">&nbsp;</label>
                    @endif
                    <button class="btn btn-danger btn-sm"
                        wire:click.prevent="removeFood({{ $index }})">سڕینەوە</button>
                </div>
            </div>
        @endforeach

        <div class="mb-3">
            <button class="btn btn-success btn-sm add-food-button" wire:click.prevent="addFood">+ بەرهەمێکی نوێ زیاد بکە</button>
        </div>

        <div class="mb-3 col-md-6">
            <label class="form-label">کۆی گشتی</label>
            <input class="form-control" type="text" readonly value="{{ number_format($total, 0) }} IQD">
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">زیادکردن</button>
        </div>
    </form>
</div>
@script
    <script>
        // Ensure Select2 is reinitialized when "Add Food" button is clicked
        document.addEventListener('livewire:load', function() {
            initializeSelect2();
        });

        document.addEventListener('livewire:update', function() {
            initializeSelect2();
        });

        function initializeSelect2() {
            if ($(".js-example-basic-single").length) {
                $(".js-example-basic-single").select2();
            }

            // $(".js-example-basic-single").on('change', function(e) {
            //     let fieldName = $(this).attr('wire:model.live');
            //     if (fieldName) {
            //         @this.set(fieldName, $(this).val());
            //     }
            // });
        }

        $(document).on('click', '.add-food-button', function() {
            setTimeout(() => {
                initializeSelect2();
            }, 500);
        });
    </script>
@endscript
