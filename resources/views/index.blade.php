@extends('layout.layout')

@section('title', 'Home Page')

@section('content')
    <section class="blog-posts">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="all-blog-posts">
                        <div class="row">

                            @foreach ($tasks as $task)
                                {{-- Post --}}

                                {{-- @dump($task) --}}

                                <div class="col-lg-12">
                                    <div class="blog-post">

                                        <div class="down-content">
                                            <h4>{{ $task['title'] }}</h4>
                                            <ul class="post-info">
                                                <li><a href="#">{{ count($task->comments()) }} Comments</a></li>
                                                <li><a href="#">{{ $task['created_at']->format('d.m.Y') }}</a></li>
                                            </ul>

                                            <p>{{ $task['theme'] }}</p>

                                            <div class="post-options">
                                                <p>red</p>
                                                <p>del</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
