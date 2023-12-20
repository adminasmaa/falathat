@extends('front.layouts.app')

@section('breadcrumbs')
    <li class="breadcrumb-item hover-light text-bold">
        {{ $settings['Translations']['branches'] }}
    </li>
    @if($branch)
        <li class="breadcrumb-item hover-light text-bold">
            {{ $branch->title('ar') }}
        </li>
    @endif
@endsection

@section('content')
    <!--Page Header-->
    @include('front.includes.page-header', ['currentPage' => ($branch ? $branch->title('ar') : $settings['Translations']['branches'])])

    <!-- Services us -->
    <section id="our-services" class="padding bglight">
        <div class="container">
            <div class="col-md-12 text-center heading_space wow fadeIn" data-wow-delay="300ms">
                <h2 class="heading bottom30 darkcolor font-light2"><span class="font-weight-normal"></span>
                    @if($branch)
                        {{ $settings['Translations']['subbranches_page_title'] }}
                        {{ $branch->title('ar') }}
                    @else
                        {{ $settings['Translations']['branches_page_title'] }}
                    @endif
                    <span class="divider-center"></span>
                </h2>
                <div class="col-12">
                    @if($branch)
                        <p class="mb-n3">{{ $settings['Translations']['subbranches_page_subtitle'] }}</p>
                    @else
                        <p class="mb-n3">{{ $settings['Translations']['branches_page_subtitle'] }}</p>
                    @endif
                </div>
            </div>
            <div class="cardCustomDesign">
                <section class="articles">
                    @foreach($branches as $single_branch)
                        <article>
                            <div class="article-wrapper">
                                <figure>
                                    <img src="{{ Storage::url($single_branch->image) }}" alt=""/>
                                </figure>
                                <div class="article-body text-right">
                                    <h2>{{ $single_branch->title }}</h2>
                                    <p>
                                        {{ Str::limit($single_branch->description, 150, ' ...') }}
                                    </p>
                                    <a href="{{ ($branch ? route('front.branches.show', $single_branch) : route('front.branches.index', ['branch' => $single_branch->id])) }}"
                                       class="read-more">
                                        اقرأ المزيد
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20"
                                             fill="currentColor">
                                            <path fill-rule="evenodd"
                                                  d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </section>
            </div>
        </div>
    </section>
    <!-- Services us ends -->

    @include('front.includes.contact-section')
@endsection
