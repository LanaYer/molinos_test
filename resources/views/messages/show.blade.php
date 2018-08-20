<?php

use Illuminate\Support\Facades\Storage;

?>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="col-md-6">Сообщение</div>
                        <div class="col-md-6 text-right"><a href="{{ route('home') }}">Вернуться обратно</a></div>
                    </div>

                    <div class="panel-body">
                        <p><strong>Имя: </strong>{{$message->name}}</p>
                        <p><strong>Email: </strong>{{$message->email}}</p>
                        <p><strong>Текст письма: </strong></p>
                        <p>{{$message->question}}</p>
                        <p><strong>Прикрепленные файлы: </strong></p>
                        <div class="row">
                            @foreach($message->files as $file)
                                <p>
                                    <a href="http://molinostest.000webhostapp.com/storage/app/{{$file->name}}"
                                       data-lightbox="product-preview-gallery" class="message-image">
                                        <img src="http://molinostest.000webhostapp.com/storage/app/{{$file->name}}" />
                                    </a>
                                </p>
                            @endforeach
                        </div>

                        <p><strong>Написать ответ: </strong></p>
                        <form class="form-horizontal" method="POST" action="{{ route('message-answer',
                              ['message' => $message->id]) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="col-md-12">
                                    <textarea id="answer" class="form-control" name="answer" required>
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-primary">
                                        Отправить
                                    </button>
                                </div>
                            </div>
                        </form>
                        <p><a href="{{ route('message-del', ['message' => $message->id]) }}">Удалить сообщение</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection