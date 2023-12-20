<!-- Contact US -->
<section id="stayconnect1" class="bglight position-relative padding noshadow">
    <div class="container ">
        <div class="widget ">
            <div class="row">
                <div class="col-md-12 text-center wow fadeIn mt-n3" data-wow-delay="300ms">
                    <h2 class="heading bottom30 darkcolor font-light2 pt-1">
                            <span class="font-normal">
                                {{ $settings['Home Section']['contact_section_title'] }}
                            </span>
                        <span class="divider-center"></span>
                    </h2>
                    <div class="col-12 bottom35">
                        <p>
                            {{ $settings['Home Section']['contact_section_subtitle'] }}
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 order-sm-2">
                    <div class="imageContainer wow fadeInLeft"
                         style="background-image: url('{{ asset('front-assets/kids/images/pexels-markus-spiske-1300-750.jpg') }}');">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="heading-title  wow fadeInUp" data-wow-delay="300ms">
                        <form class=" wow fadeInUp" data-wow-delay="400ms" id="contact-form-data">
                            <div class="row px-2">
                                <div class="col-md-12 col-sm-12" id="result"></div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="name1" class="d-none"></label>
                                        <input class="form-control" id="name1" type="text"
                                               placeholder="{{ $settings['Translations']['contact_form_name_field'] }}"
                                               required name="userName">
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="email1" class="d-none"></label>
                                        <input class="form-control" type="email" id="email1"
                                               placeholder="{{ $settings['Translations']['contact_form_email_field'] }}"
                                               name="userEmail">
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group  ">
                                        <select class="form-select form-control" required id="gender">
                                            <option
                                                selected>{{ $settings['Translations']['contact_form_communication_type_field'] }}</option>
                                            <option
                                                value="complaints">{{ $settings['Translations']['communication_first_type'] }}</option>
                                            <option
                                                value="suggestions">{{ $settings['Translations']['communication_second_type'] }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="message1" class="d-none"></label>
                                        <textarea class="form-control" id="message1"
                                                  placeholder="{{ $settings['Translations']['contact_form_message_field'] }}"
                                                  required name="userMessage"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <button type="button" id="submit_btn1"
                                            class="contact_btn button gradient-btn w-100">
                                        {{ $settings['Translations']['contact_form_send_button'] }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact US ends -->
