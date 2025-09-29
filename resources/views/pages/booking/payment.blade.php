@extends('layouts.default')


@section('content')

<div class="row">
    <div class="col-12">
        <h3>InvoiceNo. {{ $booking['bookingno'] }}</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="accordion" id="accordionShadow">
            <div class="card mb-2" style="background-color: #f5e9ff;">
                <div class="card-header mb-0 p-0 border-0 bg-transparent" id="accPaymentOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link w-100 btn-lg text-align-start text-decoration-none text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#paymentOne" aria-expanded="true" aria-controls="paymentOne">
                            Siam Commercial Bank PCL (2C2P)
                            <span class="group-icon float-end">
                                <i class="fi fi-arrow-start-slim"></i>
                                <i class="fi fi-arrow-down-slim"></i>
                            </span>
                        </button>
                    </h2>
                </div>
                <div id="paymentOne" class="collapse show" aria-labelledby="accPaymentOne" data-bs-parent="#accordionShadow" style="">
                    <div class="card-body pt-0 px-2">
                        <div class="row mx-3">
                            <div class="col-12 col-lg-12 text-center ps-0">
                                <form method="POST" id="_2c2p" action="https://www.tigerlineferry.com/payment/create" data-gtm-form-interact-id="0">
                                    <input type="hidden" name="_token" value="CjBDxeB60LwtLrjpSQDWgoom0xohF53EvGlF8fVN" autocomplete="off">
                                    <div class="text-start _2c2p">
                                        <div class="row mt-2">
                                            <div class="col-12">
                                                <label class="row mb-2">
                                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                                        <input class="form-check-input form-check-input-primary payment-methods" type="radio" data-type="_2c2p" data-fee="Y" name="payment_method" id="payment-method-1" value="CC" data-gtm-form-interact-field-id="0">
                                                    </div>
                                                    <div class="col-9 col-lg-11 card">
                                                        <div class="card-body p-2">
                                                            <p class="mb-2 d-flex align-items-center flex-wrap">
                                                                <span class="me-3 d-lg-inline d-block fw-bold w-m-100">Credit Card / Debit Card</span>
                                                                <img src="https://www.tigerlineferry.com/icons/visa_icon.svg" class="me-2 w--m-img" width="40" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="VISA" data-bs-original-title="VISA">
                                                                <img src="https://www.tigerlineferry.com/icons/mastercard_icon.svg" class="me-2 w--m-img" width="40" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Master Card" data-bs-original-title="Master Card">
                                                                <img src="https://www.tigerlineferry.com/icons/jcb_icon.svg" class="me-2 w--m-img" width="40" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="JCB" data-bs-original-title="JCB">
                                                            </p>
                                                            <small class="d-block mt-minus-creditfee" style="margin-top: -5px;">
                                                                Processing fee
                                                                <span class="cc-fee">183.81</span>฿
                                                            </small>

                                                        </div>
                                                    </div>
                                                </label>

                                                <label class="row mb-2">
                                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                                        <input class="form-check-input form-check-input-primary payment-methods" type="radio" data-type="_2c2p" name="payment_method" id="payment-method-2" value="GCARD" data-gtm-form-interact-field-id="1">
                                                    </div>
                                                    <div class="col-9 col-lg-11 card">
                                                        <div class="card-body p-2">
                                                            <p class="mb-2 d-flex align-items-center flex-wrap">
                                                                <span class="me-3 fw-bold w-m-100">Global Card</span>
                                                                <img src="https://www.tigerlineferry.com/icons/unionpay_icon.svg" class="me-2 w--m-img" width="40" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="UnionPay" data-bs-original-title="UnionPay">
                                                                <img src="https://www.tigerlineferry.com/icons/diners_icon.svg" class="me-2 w--m-img" width="40" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Diners" data-bs-original-title="Diners">
                                                            </p>
                                                            <small class="d-block mt-minus-creditfee" style="margin-top: -5px;">
                                                                Processing fee
                                                                <span class="cc-fee">183.81</span>฿
                                                            </small>
                                                        </div>
                                                    </div>
                                                </label>

                                                <label class="row mb-2">
                                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                                        <input class="form-check-input form-check-input-primary payment-methods" type="radio" data-type="_2c2p" name="payment_method" id="payment-method-3" value="DPAY" data-gtm-form-interact-field-id="2">
                                                    </div>
                                                    <div class="col-9 col-lg-11 card">
                                                        <div class="card-body p-2">
                                                            <p class="mb-2 d-flex align-items-center flex-wrap">
                                                                <span class="me-3 fw-bold w-m-100">Digital Payment</span>
                                                                <img src="https://www.tigerlineferry.com/icons/alipay_icon.svg" class="me-2 w--m-img" width="40" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Alipay" data-bs-original-title="Alipay">
                                                                <img src="https://www.tigerlineferry.com/icons/wechatpay_icon.svg" class="me-2 w--m-img" width="40" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Wechat Pay" data-bs-original-title="Wechat Pay">
                                                                <img src="https://www.tigerlineferry.com/icons/linepay_icon.svg" class="me-2 w--m-img" width="100" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Line Pay" data-bs-original-title="Line Pay">
                                                                <img src="https://www.tigerlineferry.com/icons/truemoney_wallet_icon.svg" class="me-2 w--m-img" width="50" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="TrueMoney" data-bs-original-title="TrueMoney">
                                                            </p>
                                                            <small class="d-block mt-minus-creditfee" style="margin-top: -5px;">
                                                                Processing fee
                                                                <span class="cc-fee">183.81</span>฿
                                                            </small>
                                                        </div>
                                                    </div>
                                                </label>

                                                <label class="row mb-2">
                                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                                        <input class="form-check-input form-check-input-primary payment-methods" type="radio" data-type="_2c2p" name="payment_method" id="payment-method-4" value="THQR" data-gtm-form-interact-field-id="3">
                                                    </div>
                                                    <div class="col-9 col-lg-11 card">
                                                        <div class="card-body p-2">
                                                            <p class="mb-2 d-flex align-items-center flex-wrap">
                                                                <span class="me-3 fw-bold w-m-100">Thai QR Payment</span>
                                                                <img src="https://www.tigerlineferry.com/icons/promptpay_icon.svg" class="me-2 w--m-img" width="90" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Prompt Pay" data-bs-original-title="Prompt Pay">
                                                            </p>
                                                            <small class="d-block mt-minus-creditfee" style="margin-top: -5px;">
                                                                Processing fee
                                                                <span class="cc-fee">183.81</span>฿
                                                            </small>
                                                        </div>
                                                    </div>
                                                </label>

                                                <label class="row mb-2">
                                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                                        <input class="form-check-input form-check-input-primary payment-methods" type="radio" data-type="_2c2p" name="payment_method" id="payment-method-5" value="GQR" data-gtm-form-interact-field-id="4">
                                                    </div>
                                                    <div class="col-9 col-lg-11 card">
                                                        <div class="card-body p-2">
                                                            <p class="mb-2 d-flex align-items-center flex-wrap">
                                                                <span class="me-3 fw-bold w-m-100">QR Payment</span>
                                                                <img src="https://www.tigerlineferry.com/icons/visa_qr_icon.svg" class="me-2 w--m-img border border-secondary rounded" width="90" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Visa QR Payment" data-bs-original-title="Visa QR Payment">
                                                                <img src="https://www.tigerlineferry.com/icons/mastercard_qr_icon.svg" class="me-2 w--m-img border border-secondary rounded" width="90" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Master Card QR Payment" data-bs-original-title="Master Card QR Payment">
                                                                <img src="https://www.tigerlineferry.com/icons/unionpay_qr_icon.svg" class="me-2 w--m-img border border-secondary rounded" width="90" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="UnionPay QR Payment" data-bs-original-title="UnionPay QR Payment">
                                                            </p>
                                                            <small class="d-block mt-minus-creditfee" style="margin-top: -5px;">
                                                                Processing fee
                                                                <span class="cc-fee">183.81</span>฿
                                                            </small>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-end mt-2">
                                        <input type="hidden" name="payments" value="9fc732f6-8dff-412f-b596-f0540e391b96">
                                    </div>
                                    <input type="hidden" name="passenger_email" value="x@x.x">
                                    <input type="hidden" name="payment_type" value="2c2p">
                                </form>
                            </div>
                            <div class="col-12 col-lg-5 d-none">
                                <div class="card mt-2">
                                    <div class="card-body pt-1">
                                        <div class="row py-3 px-0 rounded" style="background-color: #e6edf5;">
                                            <div class="col-12 col-lg-5 text-end text-lg-start">
                                                <span class="fw-bold">Total Payment</span>
                                            </div>
                                            <div class="col-12 col-lg-7 text-end">
                                                <h3 class="mb-0"><span class="summary-total-payment">3,415</span> THB</h3>
                                                <small>Lorem Ipsum is simply dummy.</small>
                                            </div>
                                            <div class="col-12 mt-3">
                                                Lorem Ipsum is simply dummy text.
                                            </div>
                                        </div>

                                        <div class="row py-4">
                                            <div class="col-12 mb-2">
                                                <div class="row">
                                                    <div class="col-6">
                                                        Lorem Ipsum
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <span class="main-total-payment">3,300</span> THB
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 is-credit-fee">
                                                <div class="row">
                                                    <div class="col-6">
                                                        Processing Fee <span class="is-show-fee">183.81</span>%
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <span class="fee-result">115</span> THB
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-2" style="background-color: #d0e5ff;display: none;">
                <div class="card-header mb-0 p-0 border-0 bg-transparent" id="accPaymentTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-link w-100 btn-lg text-align-start text-decoration-none text-dark collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#paymentTwo" aria-expanded="false" aria-controls="paymentTwo">
                            Pay of All By All Ticket
                            <span class="group-icon float-end">
                                <i class="fi fi-arrow-start-slim"></i>
                                <i class="fi fi-arrow-down-slim"></i>
                            </span>
                        </button>
                    </h2>
                </div>
                <div id="paymentTwo" class="collapse" aria-labelledby="accPaymentTwo" data-bs-parent="#accordionShadow">
                    <div class="card-body pt-0 px-2">
                        <div class="row mx-3 mb-2">
                            <div class="col-12 col-lg-12 text-center ps-0 ">
                                <form method="POST" id="ctsv" action="https://www.tigerlineferry.com/payment/create">
                                    <input type="hidden" name="_token" value="CjBDxeB60LwtLrjpSQDWgoom0xohF53EvGlF8fVN" autocomplete="off">
                                    <div class="text-start ctsv">
                                        <div class="row mt-2">
                                            <div class="col-11 offset-1 px-0 mb-2 d-none">
                                                <input type="text" class="form-control" name="member_id" placeholder="Member ID">
                                            </div>
                                            <div class="col-12">
                                                <label class="row mb-2">
                                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                                        <input class="form-check-input form-check-input-primary payment-methods" type="radio" data-type="ctsv" name="payment_method" id="payment-method-1" value="CARD">
                                                    </div>
                                                    <div class="col-9 col-lg-11 card">
                                                        <div class="card-body p-2">
                                                            <p class="mb-2 d-flex align-items-center flex-wrap">
                                                                <span class="me-3 d-lg-inline d-block fw-bold w-m-100">Credit Card / Debit Card</span>
                                                                <img src="https://www.tigerlineferry.com/icons/visa_icon.svg" class="me-2 w--m-img" width="40" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="VISA" data-bs-original-title="VISA">
                                                                <img src="https://www.tigerlineferry.com/icons/mastercard_icon.svg" class="me-2 w--m-img" width="40" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Master Card" data-bs-original-title="Master Card">
                                                                <img src="https://www.tigerlineferry.com/icons/jcb_icon.svg" class="me-2 w--m-img" width="40" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="JCB" data-bs-original-title="JCB">
                                                            </p>
                                                            <small class="d-block mt-minus-creditfee" style="margin-top: -5px;">
                                                                Processing fee
                                                                <span class="cc-fee">183.81</span>฿
                                                            </small>

                                                        </div>
                                                    </div>
                                                </label>

                                                <label class="row mb-2">
                                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                                        <input class="form-check-input form-check-input-primary payment-methods" type="radio" data-type="ctsv" name="payment_method" id="payment-method-2" value="CASH">
                                                    </div>
                                                    <div class="col-9 col-lg-11 card">
                                                        <div class="card-body p-2">
                                                            <p class="mb-2 d-flex align-items-center flex-wrap">
                                                                <span class="me-3 fw-bold w-m-100">CASH</span>
                                                                <img src="https://www.tigerlineferry.com/icons/counter-service-icon.svg" class="me-1 w--m-img rounded" width="40" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Counter Service" data-bs-original-title="Counter Service">
                                                                <img src="https://www.tigerlineferry.com/icons/7-eleven_logo_2.svg" class="me-1 w--m-img rounded" width="30" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="7-Eleven" data-bs-original-title="7-Eleven">
                                                            </p>
                                                            <small class="d-block mt-minus-creditfee" style="margin-top: -5px;">
                                                                Processing fee
                                                                <span class="cc-fee">183.81</span>฿
                                                            </small>
                                                        </div>
                                                    </div>
                                                </label>

                                                <label class="row mb-2 d-none">
                                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                                        <input class="form-check-input form-check-input-primary payment-methods" type="radio" data-type="ctsv" name="payment_method" id="payment-method-3" value="INST">
                                                    </div>
                                                    <div class="col-9 col-lg-11 card">
                                                        <div class="card-body p-2">
                                                            <p class="mb-2 d-flex align-items-center flex-wrap">
                                                                <span class="me-3 fw-bold w-m-100">INST</span>
                                                                <img src="https://www.tigerlineferry.com/icons/alipay_icon.svg" class="me-2 w--m-img" width="40" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Alipay" data-bs-original-title="Alipay">
                                                                <img src="https://www.tigerlineferry.com/icons/wechatpay_icon.svg" class="me-2 w--m-img" width="40" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Wechat Pay" data-bs-original-title="Wechat Pay">
                                                                <img src="https://www.tigerlineferry.com/icons/linepay_icon.svg" class="me-2 w--m-img" width="100" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Line Pay" data-bs-original-title="Line Pay">
                                                                <img src="https://www.tigerlineferry.com/icons/truemoney_wallet_icon.svg" class="me-2 w--m-img" width="50" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="TrueMoney" data-bs-original-title="TrueMoney">
                                                            </p>
                                                            <small class="d-block mt-minus-creditfee" style="margin-top: -5px;">
                                                                Processing fee
                                                                <span class="cc-fee">183.81</span>฿
                                                            </small>
                                                        </div>
                                                    </div>
                                                </label>

                                                <label class="row mb-2 d-none">
                                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                                        <input class="form-check-input form-check-input-primary payment-methods" type="radio" data-type="ctsv" name="payment_method" id="payment-method-4" value="7CARD">
                                                    </div>
                                                    <div class="col-9 col-lg-11 card">
                                                        <div class="card-body p-2">
                                                            <p class="mb-2 d-flex align-items-center flex-wrap">
                                                                <span class="me-3 fw-bold w-m-100">7CARD</span>
                                                                <img src="https://www.tigerlineferry.com/icons/promptpay_icon.svg" class="me-2 w--m-img" width="90" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Prompt Pay" data-bs-original-title="Prompt Pay">
                                                            </p>
                                                            <small class="d-block mt-minus-creditfee" style="margin-top: -5px;">
                                                                Processing fee
                                                                <span class="cc-fee">183.81</span>฿
                                                            </small>
                                                        </div>
                                                    </div>
                                                </label>

                                                <label class="row mb-2">
                                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                                        <input class="form-check-input form-check-input-primary payment-methods" type="radio" data-type="ctsv" name="payment_method" id="payment-method-5" value="TMW">
                                                    </div>
                                                    <div class="col-9 col-lg-11 card">
                                                        <div class="card-body p-2">
                                                            <p class="mb-2 d-flex align-items-center flex-wrap">
                                                                <span class="me-3 fw-bold w-m-100">TrueMoney Wallet</span>
                                                                <img src="https://www.tigerlineferry.com/icons/truemoney_wallet_icon.svg" class="me-2 w--m-img" width="50" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="TrueMoney" data-bs-original-title="TrueMoney">
                                                            </p>
                                                            <small class="d-block mt-minus-creditfee" style="margin-top: -5px;">
                                                                Processing fee
                                                                <span class="cc-fee">183.81</span>฿
                                                            </small>
                                                        </div>
                                                    </div>
                                                </label>

                                                <label class="row mb-2">
                                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                                        <input class="form-check-input form-check-input-primary payment-methods" type="radio" data-type="ctsv" name="payment_method" id="payment-method-6" value="TQR">
                                                    </div>
                                                    <div class="col-9 col-lg-11 card">
                                                        <div class="card-body p-2">
                                                            <p class="mb-2 d-flex align-items-center flex-wrap">
                                                                <span class="me-3 fw-bold w-m-100">Thai QR Payment</span>
                                                                <img src="https://www.tigerlineferry.com/icons/promptpay_icon.svg" class="me-2 w--m-img" width="90" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Prompt Pay" data-bs-original-title="Prompt Pay">
                                                            </p>
                                                            <small class="d-block mt-minus-creditfee" style="margin-top: -5px;">
                                                                Processing fee
                                                                <span class="cc-fee">183.81</span>฿
                                                            </small>
                                                        </div>
                                                    </div>
                                                </label>

                                                <label class="row mb-2 d-none">
                                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                                        <input class="form-check-input form-check-input-primary payment-methods" type="radio" data-type="ctsv" name="payment_method" id="payment-method-7" value="MOB">
                                                    </div>
                                                    <div class="col-9 col-lg-11 card">
                                                        <div class="card-body p-2">
                                                            <p class="mb-2 d-flex align-items-center flex-wrap">
                                                                <span class="me-3 fw-bold w-m-100">Mobile Banking</span>
                                                                <img src="https://www.tigerlineferry.com/icons/promptpay_icon.svg" class="me-2 w--m-img" width="90" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Prompt Pay" data-bs-original-title="Prompt Pay">
                                                            </p>
                                                            <small class="d-block mt-minus-creditfee" style="margin-top: -5px;">
                                                                Processing fee
                                                                <span class="cc-fee">183.81</span>฿
                                                            </small>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-end mt-2">
                                        <input type="hidden" name="payments" value="9fc732f6-8dff-412f-b596-f0540e391b96">
                                    </div>
                                    <input type="hidden" name="passenger_email" value="x@x.x">
                                    <input type="hidden" name="payment_type" value="ctsv">
                                </form>
                            </div>
                            <div class="col-12 col-lg-5 d-none">
                                <div class="card mt-2">
                                    <div class="card-body pt-1">
                                        <div class="row py-3 px-0 rounded" style="background-color: #e6edf5;">
                                            <div class="col-12 col-lg-5 text-end text-lg-start">
                                                <span class="fw-bold">Total Payment</span>
                                            </div>
                                            <div class="col-12 col-lg-7 text-end">
                                                <h3 class="mb-0"><span class="summary-total-payment">3,300</span> THB</h3>
                                                <small>Lorem Ipsum is simply dummy.</small>
                                            </div>
                                            <div class="col-12 mt-3">
                                                Lorem Ipsum is simply dummy text.
                                            </div>
                                        </div>

                                        <div class="row py-4">
                                            <div class="col-12 mb-2">
                                                <div class="row">
                                                    <div class="col-6">
                                                        Lorem Ipsum
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <span class="main-total-payment">3,300</span> THB
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 is-credit-fee d-none">
                                                <div class="row">
                                                    <div class="col-6">
                                                        Processing Fee <span class="is-show-fee"></span>%
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <span class="fee-result"></span> THB
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-12 text-center">
        <button class="btn btn-success btn-lg">Payment</button>
    </div>
</div>
@stop
