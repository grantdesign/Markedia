@extends('layouts.category_layout')

@section('page-title')
<div class="page-title db">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h2>{{ $title }} <small class="hidden-xs-down hidden-sm-down">Nulla felis eros, varius sit amet volutpat non.</small></h2>
            </div><!-- end col -->
            <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
                </ol>
            </div><!-- end col -->                    
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end page-title -->
@endsection

@section('content')
<div class="page-wrapper">
    <div class="row">
        <div class="col-lg-6">
            <h4>Who we are?</h4>
            <p>Markedia is a personal blog for handcrafted, cameramade photography content, fashion styles from independent creatives around the world.</p>
        </div>

        <div class="col-lg-6">
            <h4>How we help?</h4>
            <p>If you’d like to write for us, <a href="#">advertise with us</a> or just say hello, fill out the form below and we’ll get back to you as soon as possible.</p>
        </div>
    </div><!-- end row -->

    <hr class="invis">

    <div class="row">
        <div class="col-lg-12">
            <h4 class="mb-4">Contact form</h4>

            @if(session()->has('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="form-wrapper" action="{{ route('contacts') }}" method="post">
                @csrf
                <input type="text" class="form-control" name="name" placeholder="Имя" value="{{ old('name') }}">
                <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                <input type="number" class="form-control" name="phone" placeholder="Телефон" value="{{ old('phone') }}">
                <textarea class="form-control" name="messages" placeholder="Сообщение">{{ old('messages') }}</textarea>
                <button type="submit" class="btn btn-primary">Отправить <i class="fa fa-envelope-open-o"></i></button>
            </form>
        </div>
    </div>
</div><!-- end page-wrapper -->
@endsection