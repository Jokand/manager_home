@extends('layout.layout')

@section('title', 'Create Page')

@section('content')
    <section class="blog-posts">
        <div class="container">
           <h2>Добавление записи</h2>

           <form id="contact" action="{{ route('create') }}" method="post">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <fieldset>
                            <input name="title" type="text" id="title"
                                placeholder="Заголовок" required="">
                        </fieldset>
                            </div>
                                <div class="col-md-12 col-sm-12">
                            <fieldset>
                            <input name="theme" type="text" id="theme"
                                placeholder="Задайте тему" required="">
                            </fieldset>
                            </div>
                            <div class="col-md-12 col-sm-12">
                            </div>
                            <div class="col-lg-12">
                            <fieldset>
                            <button type="submit" id="form-submit" class="main-button">
                                Добавить задачу
                            </button>
                        </fieldset>
                    </div>
                </div>
            </form>


        </div>
    </section>
@endsection
