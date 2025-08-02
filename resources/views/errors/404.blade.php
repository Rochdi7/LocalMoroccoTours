@extends('front.layouts.app2')

@section('title', 'Page Not Found - Local Morocco Tours')

@php
    $title = 'Page Not Found - Local Morocco Tours';
    $description = 'Sorry, the page you are looking for could not be found. Return to the homepage or explore other Moroccan adventures.';
    $url = url()->current();
    $image = asset('img/404.png'); // Replace with your custom 404 image or brand logo

    SEOMeta::setTitle($title);
    SEOMeta::setDescription($description);
    SEOMeta::setCanonical($url);

    OpenGraph::setTitle($title);
    OpenGraph::setDescription($description);
    OpenGraph::setUrl($url);
    OpenGraph::addImage($image);
    OpenGraph::setType('website');

    JsonLd::setTitle($title);
    JsonLd::setDescription($description);
    JsonLd::setUrl($url);
    JsonLd::setType('WebPage');
    JsonLd::addImage($image);
@endphp

@section('content')

<section class="nopage mt-header">
  <div class="container">
    <div class="row y-gap-30 justify-between items-center">
      <div class="col-xl-6 col-lg-6">
        <img 
          src="{{ asset('assets/img/404/1.svg') }}" 
          alt="404 Error Illustration - Local Morocco Tours" 
          class="img-fluid"
          title="Page Not Found - Local Morocco Tours"
        >

        <p class="visually-hidden">
          Illustration showing a traveler lost in Morocco’s desert.
        </p>
      </div>

      <div class="col-xl-5 col-lg-6">
        <div class="nopage__content pr-30 lg:pr-0">
          <h1>
            40<span class="text-accent-1">4</span>
          </h1>
          <h2 class="text-30 md:text-24 fw-700">
            Oops! It looks like you’re lost.
          </h2>
          <p class="mt-10">
            The page you’re looking for isn’t available on Local Morocco Tours.
            Please check the URL or return to our homepage to discover Morocco’s unforgettable adventures.
          </p>

          <a href="{{ route('home') }}" class="button -md -dark-1 bg-accent-1 text-white mt-25">
            Go back to homepage
            <i class="icon-arrow-top-right ml-10"></i>
          </a>

          <a href="{{ route('front.help-center') }}" class="button -md -outline-dark-1 mt-15">
            Visit Help Center
            <i class="icon-lifebuoy ml-10"></i>
          </a>

        </div>
      </div>
    </div>
  </div>
</section>

<style>
  .visually-hidden {
    position: absolute !important;
    width: 1px !important;
    height: 1px !important;
    padding: 0 !important;
    margin: -1px !important;
    overflow: hidden !important;
    clip: rect(0, 0, 0, 0) !important;
    white-space: nowrap !important;
    border: 0 !important;
  }
</style>

@endsection
