@extends('layouts.booking')


@section('content')
<form action="{{ route('booking.store') }}" method="POST">
    @method('post')
    @csrf
    <div class="row d-block d-lg-none">
        <x-booking.sumary />

    </div>
    <div class="row">
        <div class="col-12 col-lg-8 mb-3">
            <div class="card p-2">
                <div class="row">
                    <div class="col">
                        <h4 class="text-main mb-1">Passengers</h4>
                    </div>
                </div>


                @include('components.booking.session-query-hidden', ['data' => $sessionData])


                <div class="row p-3">
                    <div class="col-12">
                        <x-form.adult-passenger count="0" />
                    </div>
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <label for="description" class="mb-0">CUSTOMER NOTE | REQUEST</label>
                            <small class="text-muted"><span id="description-count">0</span> / 200</small>
                        </div>
                        <textarea
                            class="form-control"
                            id="description"
                            name="description"
                            maxlength="200"
                            rows="4"
                            placeholder="Please provide your transfer detail if the selected station is a hotel or airport"
                        ></textarea>
                        <small class="text-muted d-block mt-1">Maximum 200 characters.</small>
                        <small class="text-danger d-block mt-1">Please make sure your provided detail is within area. A pick-up location outside the selected city / area range may result in an unconfirmed transfer. Extra requests that are not relevant will not be confirmed here. If necessary, please call 081 358 8989.</small>
                    </div>
                </div>

                <hr>
                <div class="row">
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="terms_accepted" value="1" id="termsCheckbox">
                            <label class="form-check-label" for="termsCheckbox">
                                By completing to this booking, you agree to buy the product and confirm you have read and accept the full <a href="{{ route('terms.index') }}" target="_blank"><u>terms and conditions.</u></a>
                            </label>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row pe-3">
                    <div class="col">
                        <a href="{{ route('booking.flight', $sessionData) }}" class="btn btn-lg btn-secondary" type="button">
                            << Change / Edit</a>
                    </div>
                    <div class="col text-end">
                        <button class="btn btn-lg btn-secondary waves-effect waves-light" type="submit" id="bt-next" disabled>Book / Payment >></button>
                    </div>

                </div>

            </div>


        </div>

        <div class="col-12 col-lg-4 d-none d-lg-block">
            <div class="card p-2 p-md-4">
                <x-booking.sumary />

            </div>
        </div>
    </div>

</form>
@stop

@section('script')
<script>
    (function() {
        var checkbox = document.getElementById('termsCheckbox');
        var btn = document.getElementById('bt-next');
        var description = document.getElementById('description');
        var descriptionCount = document.getElementById('description-count');

        function updateButton() {
            if (!checkbox || !btn) return;
            if (checkbox.checked) {
                btn.disabled = false;
                btn.classList.remove('btn-secondary');
                btn.classList.add('btn-main');
            } else {
                btn.disabled = true;
                btn.classList.remove('btn-main');
                btn.classList.add('btn-secondary');
            }
        }

        function updateDescriptionCount() {
            if (!description || !descriptionCount) return;
            var length = description.value.length;
            descriptionCount.textContent = length;
            descriptionCount.classList.toggle('text-danger', length >= 200);
            descriptionCount.parentElement.classList.toggle('text-danger', length >= 200);
            descriptionCount.parentElement.classList.toggle('text-muted', length < 200);
        }

        if (checkbox) {
            checkbox.addEventListener('change', updateButton);
            updateButton();
        }

        if (description) {
            description.addEventListener('input', updateDescriptionCount);
            updateDescriptionCount();
        }
    })();
</script>
@endsection
