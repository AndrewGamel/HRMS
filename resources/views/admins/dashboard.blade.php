@extends('layouts.admin')

@section('title', ' الرئيسية ')

@section('content_header', ' الرئيسية')



@section('content_header_active_link')
    <a href="{{ route('admin.dashboard') }}">الرئيسية</a>
@endsection

@section('content_header_active', 'عرض')


@section('content')
    <div class="main-cover"
        style="background-image: linear-gradient(
      27deg,
      var(--light-green),
      var(--medium-green),
      var(--dark-green)
    ),
    url({{ asset('assets/admin/dist/img/photo1.png') }}); background-size: cover;  height:80vh ;position: relative;";>
        <div class="text-section"
            style=" position: absolute;
  top: 40%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 320px;
  max-width: 100%;
  text-align: center;">
            <span class="big-text"
                style=" display: block;
  font-size: 72px;
  font-weight: bold;
  letter-spacing: 17px;
  text-transform: capitalize;
  color: var(--main-color);
  -webkit-text-stroke: 1px white;
  -webkit-text-fill-color: transparent;">hello
                there</span>
            <span class="sm-txt"
                style=" display: block;
  font-size: 16px;
  font-weight: lighter;
  letter-spacing: 4.7px;
  line-height: 1.7;
  color: white;">we
                are leon,super creartive & minimal agency web devoloper.</span>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#f6f6f6" fill-opacity="1"
                d="M0,224L120,234.7C240,245,480,267,720,261.3C960,256,1200,224,1320,208L1440,192L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z">
            </path>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#f6f6f6" fill-opacity=".8"
                d="M0,128L40,128C80,128,160,128,240,133.3C320,139,400,149,480,181.3C560,213,640,267,720,282.7C800,299,880,277,960,256C1040,235,1120,213,1200,208C1280,203,1360,213,1400,218.7L1440,224L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
            </path>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#f6f6f6" fill-opacity=".7"
                d="M0,224L60,218.7C120,213,240,203,360,208C480,213,600,235,720,229.3C840,224,960,192,1080,154.7C1200,117,1320,75,1380,53.3L1440,32L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
            </path>
        </svg>
    </div>


@endsection
