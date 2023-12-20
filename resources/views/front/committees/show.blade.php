@extends('front.layouts.app')

@section('breadcrumbs')
    <li class="breadcrumb-item hover-light text-bold">
        {{ $settings['Translations']['committee'] }}
    </li>
@endsection

@section('content')
    <!--Page Header-->
    @include('front.includes.page-header', ['currentPage' => $committee->title('ar')])

    <section class="padding pb-0" dir="ltr">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center heading_space  wow fadeIn animated" data-wow-delay="300ms"
                     style="visibility: visible; animation-delay: 300ms; animation-name: fadeIn;">
                    <h2 class="heading bottom30 darkcolor font-light2">{{ $committee->title('ar') }}
                        <span class="divider-center"></span>
                    </h2>
                    <div class="col-md-6 offset-md-3">
                        <p class="mb-0">{{ $committee->brief('ar') }}</p>
                    </div>
                </div>
            </div>
            <div class="row equal-shadow-team">
                @foreach($members as $member)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 pb-4">
                        <div class="team-box wow fadeIn" data-wow-delay="300ms"
                             style="visibility: visible; animation-delay: 300ms; animation-name: fadeIn;">
                            <div class="image">
                                <img src="{{ Storage::url($member->image) }}" alt="">
                            </div>
                            <div class="team-content">
                                <h4 class="darkcolor">{{ $member->name('ar') }}</h4>
                                <p dir="rtl">{{ $settings['Translations']['membership_number'] }} <span
                                        class="darkcolor">#{{ $committee->membership_number }}</span></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('front.includes.contact-section')
@endsection
