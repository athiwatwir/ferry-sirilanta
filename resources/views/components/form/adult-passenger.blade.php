@props(['count' => 0])

@php
$isLead = (int) $count === 0;
@endphp

<style>
    .passenger-block {
        border: 1px solid rgba(0, 0, 0, 0.08);
        border-radius: 0.75rem;
        background: #fff;
        padding: 1rem 1rem 0.25rem;
        margin-bottom: 1rem;
    }

    .passenger-block__head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 0.75rem;
        margin-bottom: 1rem;
        padding-bottom: 0.75rem;
        border-bottom: 1px solid rgba(0, 0, 0, 0.06);
    }

    .passenger-block__title {
        margin: 0;
        font-size: 1rem;
        font-weight: 700;
        color: var(--bs-primary, #0d6efd);
    }

    .passenger-block__badge {
        display: inline-flex;
        align-items: center;
        font-size: 0.72rem;
        font-weight: 600;
        letter-spacing: 0.03em;
        text-transform: uppercase;
        color: #e67e00;
        background: rgba(230, 126, 0, 0.12);
        border-radius: 999px;
        padding: 0.25rem 0.65rem;
        white-space: nowrap;
    }

    .passenger-block__section-label {
        font-size: 0.72rem;
        font-weight: 600;
        letter-spacing: 0.04em;
        text-transform: uppercase;
        color: #6c757d;
        margin: 0.25rem 0 0.75rem;
    }

    .passenger-phone-wrap label {
        font-size: 0.85rem;
        color: #6c757d;
        margin-bottom: 0.35rem;
    }

    .passenger-phone-wrap .form-control,
    .passenger-phone-wrap .form-select {
        min-height: calc(3.5rem + 2px);
    }

</style>

<div class="passenger-block">
    <div class="passenger-block__head">
        <h6 class="passenger-block__title text-main">Passenger {{ $count + 1 }}</h6>
        @if ($isLead)
        <span class="passenger-block__badge">Lead passenger</span>
        @endif
    </div>

    <input type="hidden" name="customers[{{ $count }}][type]" value="ADULT">

    <p class="passenger-block__section-label">Personal details</p>
    <div class="row g-2">
        <div class="col-4 col-md-2">
            <x-form.float-select label="Title" name="customers[{{ $count }}][title]" :options="[
                    'Mr.' => 'Mr.',
                    'Mrs.' => 'Mrs.',
                    'Miss' => 'Miss',
                    'Ms.' => 'Ms.',
                ]" />
        </div>
        <div class="col-8 col-md-5">
            <x-form.float-input name="customers[{{ $count }}][firstname]" label="First name" />
        </div>
        <div class="col-12 col-md-5">
            <x-form.float-input name="customers[{{ $count }}][lastname]" label="Last name" />
        </div>
    </div>

    @if ($isLead)
    <p class="passenger-block__section-label">Contact details</p>
    <div class="row g-2 align-items-start">
        <div class="col-12 col-lg-6">
            <x-form.float-input name="customers[{{ $count }}][email]" label="Email" />
        </div>
        <div class="col-12 col-lg-6 passenger-phone-wrap mb-3">

            <div class="row g-2">
                <div class="col-4 col-md-4">
                    <x-select-country-code name="customers[{{ $count }}][mobile_code]" />
                </div>
                <div class="col-8 col-md-8">
                    <input type="tel" class="form-control" id="customers_{{ $count }}_mobile" name="customers[{{ $count }}][mobile]" required placeholder="Phone number" inputmode="tel">
                </div>
            </div>
        </div>
        <div class="col-12">
            <x-form.float-input name="customers[{{ $count }}][other_contact]" label="Optional Contact: WhatsApp, WeChat, LINE" :isrrequire="false" />
        </div>
    </div>
    @endif
</div>
