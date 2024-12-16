@extends('main_template')

@section( section: 'title')
    Form page
@endsection

@section('body_content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
            </ul>
        </div>
    @endif
    <h1 class="mt-4">Please, fill the form below</h1>
    <form method="post" action="/check" class="mt-4">
        @csrf
        
        <div class="container text-center">
            <div class="row">
            <div class="col-sm-4">        
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Your name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Harry Potter">
                    </div>

                    
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Your email address</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="hpotter@hogwarts.edu" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text text-white-50">We'll never share your email with Voldemort.</div>
                    </div>
                </div>
                <div class="col-sm-8">
                <label for="formGroupExampleInput" class="form-label">Message should be at least 15 characters long</label>
                    <div class="input-group">
                        <span class="input-group-text">Your message</span>
                        <textarea class="form-control" name="message" aria-label="With textarea" id="message"></textarea>
                    </div>
                </div>
            </div>
        </div>
        




        <div class="col-12 mt-4">
        <button type="submit" class="btn btn-primary">Send</button>
        </div>

    </form>

    <hr>
    
    <h2 class="mt-4">Earlier messages</h2>
    
    @foreach($feedbacks as $element)
    <div class="border">
        <p>
            <span style="font-size: 0.75rem;">{{$element->created_at}}</span> <br>
            <b>{{$element->name}}</b>(<i>{{$element->email}}</i>): <span>{{$element->message}}</span>
            <br>
        </p>
    </div>
    @endforeach
@endsection