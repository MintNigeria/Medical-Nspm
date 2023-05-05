@extends('layout')

@section('content')
<body>
    <div class="navigation">
      <div class="navigation__header">
        <h3>
          <i class="fa fa-crutches"></i>
          Nspm Medical
        </h3>
      </div>
      <div class="navigation__links">
        <a class="btn btn-lg header" href="/users/login">
          Get Started
        </a>
      </div>
    </div>
    <div class="hero__section">
      <img src="{{ asset('images/welco.jpg') }}" alt="" />
      <div class="central-text">
        Welcome to Nspm's Medical Solution
        <p style="justify-self: center; font-size: 20px;">
            Building a Stronger & Healthier Nspm Together ...
          </p>
      </div>
    </div>

    <div class="about__section">
      <div class="about__section__content">
        <h4>About Nspm's Medical Software</h4>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus
          veniam sapiente reprehenderit, omnis ex veritatis, explicabo odit,
          dolore expedita blanditiis eius facilis laboriosam iusto fugit!
          Maiores, corrupti! Reprehenderit, perspiciatis fugiat?
        </p>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus
          veniam sapiente reprehenderit, omnis ex veritatis, explicabo odit,
          dolore expedita blanditiis eius facilis laboriosam iusto fugit!
          Maiores, corrupti! Reprehenderit, perspiciatis fugiat?
        </p>
        <a href="/users/login" class="btn btn-lg mt-5 font-weight-bold header">
          Get Started
        </a>
      </div>
      <div class="about__section__img">
        <img src="{{ asset('images/doc.jpg') }}" alt="" />
      </div>
    </div>

    <div class="services__section">
      <div class="container-section">
        <h4>Our Services</h4>

        <div class="cards">
          <div class="card">
            <i class="fas fa-crutch"></i>
          </div>
          <div class="card">
            <i class="fas fa-bandage"></i>
          </div>
          <div class="card">
            <i class="fas fa-ambulance"></i>
          </div>
          <div class="card">
            <i class="fas fa-syringe"></i>

          </div>
        </div>
      </div>
    </div>

    <div class="footer">

      <p>Designed & Developed By NSPM (ICT)</p>
    </div>
  </body>

  @endsection
