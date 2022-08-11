<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://secure-egypt.paytabs.com/hpp/css/paytabs-paypage.min.css">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

    </style>
</head>

<body>
    <script src="https://secure-egypt.paytabs.com/payment/js/paylib.js"></script>
    <div class="container">
        <form id="payform" class="single" action="{{ route('paytabs') }}" method="post">
            @csrf
            <div id="payment_card" class="card">
                <div class="card-body">
                    <div class="nav" id="pt_payment_card_logos"><img src="{{ asset('Card-Visa.svg') }}" alt="Visa"><img
                            src="{{ asset('Card-MasterCard.svg') }}" alt="MasterCard"></div>
                    <div class="form-group">
                        <label class="label" id="pt-card-number-label" for="number">Card Number</label>
                        <div class="input-group">
                            <input type="text" id="number" class="form-control input-card" data-paylib="number"
                                name="cardnumber" autocomplete="cc-number" placeholder="1234 1234 1234 1234"
                                aria-invalid="true" data-paylib="number" size="20" autocorrect="off" spellcheck="false" aria-label="Card number"
                                pattern="[0-9|#| ]*" inputmode="numeric">
                            <div class="input-group-append">
                                <span class="input-group-text card-type"><i class="pt-credit-card-brand"></i></span>
                            </div>
                            <div id="number-feedback" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div id="payment_card_expiry_cvv" class="form-row">
                        <div class="col">
                            <input type="text" id="expmonth" class="form-control" data-paylib="expmonth" name="ccmonth"
                                autocomplete="cc-exp-month" placeholder="MM" autocorrect="off" spellcheck="false"
                                aria-label="expmonth" data-paylib="expmonth" size="2" aria-invalid="false" maxlength="2" pattern="[0-9]*"
                                inputmode="numeric">
                            <div id="expmonth-feedback" class="invalid-feedback"></div>
                        </div>
                        <div class="col">
                            <input type="text" id="expyear" class="form-control" data-paylib="expyear" name="ccyear"
                                autocomplete="cc-exp-year" placeholder="YYYY" autocorrect="off" spellcheck="false"
                                aria-label="expyear" aria-invalid="false" maxlength="4"
                                inputmode="numeric" data-paylib="expyear" size="4">
                            <div id="expyear-feedback" class="invalid-feedback"></div>

                        </div>
                        <div class="col input-group">
                            <input type="text" class="form-control input-cvc" id="cvv" data-paylib="cvv" name="cvv"
                                placeholder="CVV" autocomplete="off" autocorrect="off" spellcheck="false" aria-label="cvv"
                                aria-invalid="false" pattern="[0-9|#]*" inputmode="numeric" data-paylib="cvv" size="4">

                            <div class="input-group-append">
                                <span class="input-group-text" style="padding-top: 4px;"><i data-toggle="popover"
                                        style="height:24px;" data-content="The 3 digit code on back of the card."
                                        data-trigger="hover" data-original-title="" title=""><svg
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="20" height="20"
                                            fill="currentColor">
                                            <path
                                                d="M256 0C114.6 0 0 114.6 0 256s114.6 256 256 256s256-114.6 256-256S397.4 0 256 0zM256 400c-18 0-32-14-32-32s13.1-32 32-32c17.1 0 32 14 32 32S273.1 400 256 400zM325.1 258L280 286V288c0 13-11 24-24 24S232 301 232 288V272c0-8 4-16 12-21l57-34C308 213 312 206 312 198C312 186 301.1 176 289.1 176h-51.1C225.1 176 216 186 216 198c0 13-11 24-24 24s-24-11-24-24C168 159 199 128 237.1 128h51.1C329 128 360 159 360 198C360 222 347 245 325.1 258z">
                                            </path>
                                        </svg></i></span>
                            </div>
                            <div id="cvv-feedback" class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>

            </div>


            <div class="pt_label_amount text-center mb-4">
                <div id="pt_label_amount" style="text-decoration: none;"><span class="pt_amount_symbol">EGP</span> 1.00
                </div>

                <small id="pt_label_discount" style="display: none; text-decoration: none;"><span
                        class="pt_amount_symbol">EGP</span><span id="pt_label_discount_amount"></span></small>
            </div>





            <div class="text-center">
                <button type="submit" id="payBtn" class="btn btn-primary btn-lg btn-block text-uppercase pt_pay_btn">Pay
                    Now</button>
            </div>

        </form>
    </div>



    {{-- <form action="{{ route('paytabs') }}" id="payform" method="post">
        @csrf
        <span id="paymentErrors"></span>
        <div class="row">
            <label>Card Number</label>
            <input type="text" data-paylib="number" size="20">
        </div>
        <div class="row">
            <label>Expiry Date (MM/YYYY)</label>
            <input type="text" data-paylib="expmonth" size="2">
            <input type="text" data-paylib="expyear" size="4">
        </div>
        <div class="row">
            <label>Security Code</label>
            <input type="text" data-paylib="cvv" size="4">
        </div>
        <input type="submit" value="Place order">
    </form> --}}

    <script type="text/javascript">
        var myform = document.getElementById('payform');
        paylib.inlineForm({
            'key': 'CNKMNH-VGTD6D-9TNG7B-D2RQNQ',
            'form': myform,
            'autoSubmit': true,
            'callback': function (response) {
                document.getElementById('paymentErrors').innerHTML = '';
                if (response.error) {
                    paylib.handleError(document.getElementById('paymentErrors'), response);
                }
            }
        });

    </script>


</body>

</html>
