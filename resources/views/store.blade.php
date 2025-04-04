@extends('landing_page')

@section('content')
    <section class="page-section cta">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="cta-inner bg-faded text-center rounded">
                        <h2 class="section-heading mb-5">
                            <span class="section-heading-upper">Come On In</span>
                            <span class="section-heading-lower">We're Open</span>
                        </h2>
                        <ul class="list-unstyled list-hours mb-5 text-left mx-auto">
                            <li class="list-unstyled-item list-hours-item d-flex">
                                Sunday
                                <span class="ms-auto">Closed</span>
                            </li>
                            <li class="list-unstyled-item list-hours-item d-flex">
                                Monday
                                <span class="ms-auto">7:00 AM to 8:00 PM</span>
                            </li>
                            <li class="list-unstyled-item list-hours-item d-flex">
                                Tuesday
                                <span class="ms-auto">7:00 AM to 8:00 PM</span>
                            </li>
                            <li class="list-unstyled-item list-hours-item d-flex">
                                Wednesday
                                <span class="ms-auto">7:00 AM to 8:00 PM</span>
                            </li>
                            <li class="list-unstyled-item list-hours-item d-flex">
                                Thursday
                                <span class="ms-auto">7:00 AM to 8:00 PM</span>
                            </li>
                            <li class="list-unstyled-item list-hours-item d-flex">
                                Friday
                                <span class="ms-auto">7:00 AM to 8:00 PM</span>
                            </li>
                            <li class="list-unstyled-item list-hours-item d-flex">
                                Saturday
                                <span class="ms-auto">9:00 AM to 5:00 PM</span>
                            </li>
                        </ul>
                        <p class="address mb-5">
                            <em>
                                <strong>1116 Orchard Street</strong>
                                <br />
                                Golden Valley, Minnesota
                            </em>
                        </p>
                        <p class="mb-0">
                            <small><em>Call Anytime</em></small>
                            <br />
                            (317) 585-8468
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer text-faded text-center py-5">
        <div class="container"><p class="m-0 small">Vincent : c14230135</p></div>
    </footer>
@endsection