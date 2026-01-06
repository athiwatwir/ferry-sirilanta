@props(['count'=>0])

<div class="row py-3 mb-3">
    <div class="col-12">
        <h6 class="text-main">Passenger {{ $count+1 }} @if ($count==0)
            (Lead passenger)
            @endif</h6>
    </div>
    <div class="col-12 mb-3">
        <div class="row">
            <input type="hidden" name="customers[{{ $count }}][type]" value="ADULT">
            <div class="col-6 col-lg-2">
                <x-form.float-select label="Title" name="customers[{{ $count }}][title]" :options="[
        'Mr.' => 'Mr.',
        'Mrs.' => 'Mrs.',
        'Miss' => 'Miss',
        'Ms.' => 'Ms.',
    ]" />

            </div>
            <div class="col-lg-5">
                <x-form.float-input name="customers[{{ $count }}][firstname]" label="First name" />
            </div>
            <div class="col-lg-5">
                <x-form.float-input name="customers[{{ $count }}][lastname]" label="Last name" />
            </div>

            @if ($count==0)
            <div class="col-12 col-lg-6">
                <x-form.float-input name="customers[{{ $count }}][email]" label="Email" />
            </div>

            <div class="col-12 col-lg-6">
                <x-form.float-input name="customers[{{ $count }}][onfirm_email]" label="Confirm Email" />
            </div>


            @endif


        </div>

        @if ($count==0)
        <div class="row">
            <div class="col-12 mb-3">
                <label>Telephone number</label>
                <div class="row">
                    <div class="col-12 col-lg-5">
                        <x-select-country-code name="customers[{{ $count }}][mobile_code]" />

                    </div>
                    <div class="col-12 col-lg-7">
                        <div class="mb-3">
                            <input type="number" class="form-control" id="mobile" name="customers[{{ $count }}][mobile]">
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @endif
    </div>
</div>
